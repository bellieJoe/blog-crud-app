<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $appends = [
        'likes',
        'likes_count'
    ];

    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'blog_title',
        'blog_content',
        'owner_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'owner_id', 'user_id');
    }

    public function likes(){
        return $this->hasMany(Like::class, 'blog_id', 'blog_id');
    }
}
