<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'blog_category_id',
        'title',
        'subtitle',
        'image',
        'content',
    ];

    public function BlogComments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }
}
