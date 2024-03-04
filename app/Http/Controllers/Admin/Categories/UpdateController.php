<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\UpdateRequest;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        return view('admin.categories.show', compact('category'));
    }
}
