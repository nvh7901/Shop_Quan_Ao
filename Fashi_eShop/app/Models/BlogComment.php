<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    use HasFactory;
    protected $table = 'blog_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
