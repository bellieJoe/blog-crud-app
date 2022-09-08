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

    public function getLikesCountAttribute(){
        return Like::where([
            'blog_id' => $this->blog_id
        ])
        ->count();
    }

    public function getLikesAttribute(){
        return Like::where([
            'blog_id' => $this->blog_id
        ])
        ->get(['blog_id', 'user_id']);
    }
}
