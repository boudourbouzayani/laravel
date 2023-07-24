<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Comment extends Model
{
    // app/Models/Post.php
public function getImageForWebAttribute()
{
    return asset('storage/' . $this->image);
}
public function getDateFormattedAttribute()
{
    return $this->date->format('Y-m-d');
}

   // Post.php
public function comments()
{
    return $this->hasMany(Comment::class);
}

    // ...
}

Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title')->unique();
    $table->string('author');
    $table->text('content');
    $table->string('image');
    $table->timestamp('date');
    $table->softDeletes();
    $table->timestamps();
});
