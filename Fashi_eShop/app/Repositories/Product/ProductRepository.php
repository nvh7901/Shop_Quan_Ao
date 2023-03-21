<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    // Lấy ra sản phẩm liên quan trang chi tiết sản phẩm
    public function getRelatedProducts($product)
    {
        return $this->model->where('product_category_id', $product->product_category_id)
            ->where('tag', json_decode($product->tag))
            ->limit(4)->get();
    }

    // Sản phẩm nổi bật trang index
    public function getFeaturedProductsByCategory(int $categoryId)
    {
        return $this->model->where('featured', true)->where('product_category_id', $categoryId)->get();
    }

    //Lấy ra tất cả sản phẩm ở trang shop
    public function getProductOnIndex($request)
    {
        // Tìm kiếm sản phẩm
        $search = $request->search ?? '';
        $products = $this->model->where('name', 'like', '%' . $search . '%');
        // Lọc sản phẩm
        $products = $this->filter($products, $request);
        // Phân trang
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    // Lọc sản phẩm theo categories
    public function getProductsByCategory($categoryName, $request)
    {
        // Lọc sản phẩm theo categories
        $products = ProductCategory::where('name', $categoryName)->first()->product->toQuery();
        // Phân trang
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    // Tìm kiếm và phân trang
    private function sortAndPagination($products, Request $request)
    {
        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'latest';

        switch ($sortBy) {
            case 'latest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');
        }

        // Hiện thị sản phẩm theo thanh tìm kiếm
        $products = $products->paginate($perPage);

        $products->append(['sort_by' => $sortBy, 'show' => $perPage]);

        return $products;
    }

    // Lọc sản phẩm
    public function filter($products, Request $request)
    {
        // Price
        $priceMin = $request->price_min;
        $priceMax = $request->price_max;

        $priceMin = str_replace('$', '', $priceMin);
        $priceMax = str_replace('$', '', $priceMax);

        $products = ($priceMin != null && $priceMax != null) ? $products->whereBetween('price', [$priceMin, $priceMax]) : $products;

        // Size
        $size = $request->size;
        $products = $size != null ?
            $products->whereHas('productDetails', function ($query) use ($size) {
                return $query->where('size', $size)->where('qty', '>', 0);
            }) : $products;

        return $products;
    }
}
