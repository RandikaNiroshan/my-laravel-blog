<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['content', 'blog_post_id', 'user_id'];

    public function blogPost(){
        return $this-> belongsTo('App\Models\BlogPost');
    }

    public function user(){
        return $this-> belongsTo('App\Models\User');
    }
}
