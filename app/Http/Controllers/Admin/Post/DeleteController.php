<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        try{
            Storage::disk('public')->delete($post->preview_image);
            Storage::disk('public')->delete($post->main_image);
            $post->delete();
            $post->tags()->detach();
            return redirect(route('admin.post.index'));
        }catch(\Exception $exception){
            abort(404);
        }
    }
}
