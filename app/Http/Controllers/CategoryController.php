<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
          $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
       // return Category::all();
       return $this->categoryRepository->getAll();
    }
    public function getYourProducts($id)
    {
        return $this->categoryRepository->get($id);
    }


    
}
