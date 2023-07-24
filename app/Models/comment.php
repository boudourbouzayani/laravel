<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Comment extends Model
{
// Comment.php
public function post()
{
    return $this->belongsTo(Post::class);
}

    // ...
}

// ...

Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
    $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
    $table->text('comment');
    $table->timestamp('date');
    $table->softDeletes();
    $table->timestamps();
});







    
    
    
    
    
