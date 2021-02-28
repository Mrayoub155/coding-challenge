<?php


namespace App\Repositories;

use App\Models\Category;



class CategoryRepository{



     

public function get($id)
{
    return Category::find($id)->products()->get();
}
public function getAll()
{
    return Category::get();
}






}