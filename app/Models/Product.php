<?php

namespace App\Models;
use App\Http\Controllers\ProductController;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // use HasFactory;
   protected $fillable=['name', 'price' , 'info'];
}
