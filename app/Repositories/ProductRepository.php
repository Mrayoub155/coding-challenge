<?php


namespace App\Repositories;

use App\Models\Product;



class ProductRepository{



     public function create($product)
     {
         Product::create($product);
    
     }
     public function getAll()
     {
        return Product::all();
    
     }
     public function getSortedByNameAndPrice()
     {
         
       return   Product::orderBy("name","desc")->orderBy("price","desc")->get();
     }
     public function getSortedByPrice()
     {
         
       return   Product::orderBy("price","desc")->get();
     }
     public function getSortedByName()
     {
         
       return  Product::orderBy("name","desc")->get();
     }








}