<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table ="category_posts";
    protected $fillable = ['name', 'ram','rom','price','price_sales','gift'];
}
