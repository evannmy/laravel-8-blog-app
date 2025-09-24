<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];

    protected $fillable = ['title', 'slug', 'category_id', 'user_id', 'excerpt', 'body', 'image'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilters($query, array $request) {
        // if ($request['search'] ?? false) {
        //     $query->where('title', 'like', '%' . $request['search'] . '%')
        //           ->orWhere('body', 'like', '%' . $request['search'] . '%');
        // }

        $query->when($request['search'] ?? false, function($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($request['category'] ?? false, function($query, $category) {
            $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($request['author'] ?? false, function($query, $author) {
            $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });

        return $query;
    }
}