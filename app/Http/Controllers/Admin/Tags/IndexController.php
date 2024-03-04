<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }
}
