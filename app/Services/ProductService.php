<?php


namespace App\Services;

use App\Repositories\ProductRepository;



class ProductService{

    protected  $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


     public function create($req)
     { 
        $req->validate([
             "name"=>"required",
             "description"=>"required",
             "price"=>"required",
             "image"=>"required|image"
         ]
            
        );
     
        $product = [
            "name"=>$req->name,
            "description"=>$req->description,
            "price"=>$req->price,
            "image"=> $req->image->store("uploads","public"),
        ];
        $this->productRepository->create($product);
        
     }
     public function get()
     {
        return $this->productRepository->getAll();
     }
     public function getSorted($req)
     {
         
         $byname = $req->byname;
         $byprice = $req->byprice;
         if($byname==='true' && $byprice ==='true')
         {
             
            return  $this->productRepository->getSortedByNameAndPrice();
         }
          if ($byprice==='true')
         {
            return   $this->productRepository->getSortedByPrice();
         }
          if ($byname==='true')
         {
            return  $this->productRepository->getSortedByName();
         }
        
          return  $this->productRepository->getAll();
          
         

        
     }







}