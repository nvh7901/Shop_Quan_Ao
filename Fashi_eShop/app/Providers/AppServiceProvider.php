<?php

namespace App\Providers;
// Product
use App\Service\Blog\BlogService;
use App\Service\User\UserService;
use App\Service\Order\OrderService;
// ProductComment
use App\Service\Product\ProductService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\User\UserRepository;
// Blog
use App\Service\Blog\BlogServiceInterface;
use App\Service\User\UserServiceInterface;
use App\Repositories\Order\OrderRepository;
use App\Service\Order\OrderServiceInterface;
use App\Repositories\Product\ProductRepository;
use App\Service\OrderDetail\OrderDetailService;
use App\Service\Product\ProductServiceInterface;
use App\Service\BlogCategory\BlogCategoryService;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\ProductComment\ProductCommentService;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Service\ProductCategory\ProductCategoryService;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Repositories\BlogCategory\BlogCategoryRepository;
use App\Service\BlogCategory\BlogCategoryServiceInterface;
use App\Repositories\ProductComment\ProductCommentRepository;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Repositories\BlogCategory\BlogCategoryRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );
        // ProductComment
        $this->app->singleton(
            ProductCommentRepositoryInterface::class,
            ProductCommentRepository::class
        );
        $this->app->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );
        // Blog
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );
        $this->app->singleton(
            BlogServiceInterface::class,
            BlogService::class
        );
        // ProductCategory
        $this->app->singleton( 
            ProductCategoryRepositoryInterface::class,
            ProductCategoryRepository::class,
        );
        $this->app->singleton( 
            ProductCategoryServiceInterface::class,
            ProductCategoryService::class,
        );
        // Order
        $this->app->singleton( 
            OrderRepositoryInterface::class,
            OrderRepository::class,
        );
        $this->app->singleton( 
            OrderServiceInterface::class,
            OrderService::class,
        );
        // OrderDetail
        $this->app->singleton( 
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class,
        );
        $this->app->singleton( 
            OrderDetailServiceInterface::class,
            OrderDetailService::class,
        );
        // User
        $this->app->singleton( 
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->singleton( 
            UserServiceInterface::class,
            UserService::class,
        );
        // BlogCategory
        $this->app->singleton( 
            BlogCategoryRepositoryInterface::class,
            BlogCategoryRepository::class,
        );
        $this->app->singleton( 
            BlogCategoryServiceInterface::class,
            BlogCategoryService::class,
        );
        // ProductDetail
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
