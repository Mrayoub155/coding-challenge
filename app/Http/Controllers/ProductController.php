<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
          $this->productService = $productService;
    }
   
    public function index()
    {
      return  $this->productService->get();
    }
    public function create(Request $req)
    {
        
      $this->productService->create($req);
    }
    public function filtred(Request $req)
    {
       
        
    return $this->productService->getSorted($req);
    }
   
}
