<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(2);

        return $categories;
    }

    public function show($id)
    {
        $category = Category::find($id);

        return $category;
    }
}
