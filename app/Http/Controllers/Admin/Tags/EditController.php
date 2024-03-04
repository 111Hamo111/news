<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Models\Tag;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }
}
