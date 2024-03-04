<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
}
