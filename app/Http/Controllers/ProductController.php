<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPost;
use App\Http\Resources\ProductCollection;
class ProductController extends Controller
{
    public function index()
    {
      return new ProductCollection(CategoryPost::all());
    }
    public function paginate(){
      return new ProductCollection(CategoryPost::paginate(15));
    }
    public function search(Request $request){
      $data = $request->get('data');

      $drivers = CategoryPost::where('name', 'like', "%{$data}%")
                            ->orWhere('ram', 'like', "%{$data}%")
                            ->orWhere('rom', 'like', "%{$data}%")
                            ->orWhere('price_sales', 'like', "%{$data}%")
                            ->orWhere('price', 'like', "%{$data}%")->get();

     return  new ProductCollection($drivers);
    }
}
