<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function posts() {
        return $this->belongsToMany(Post::class, "menu_post", "menu_id", "post_id")->orderBy('order','ASC')->withPivot(["id", 
        "order", "name"]);
    }

}
