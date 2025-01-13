<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function show()
    {
        $categoryModel = Category::with('posts')->get();
        return view('front.pages.index', compact('categoryModel'));
    }

    public function postDetail($id)
    {
        $post = Post::with(['comments.user', 'likes'])
            ->find($id);
        $categoryModel = Category::with('posts')->get();
        return view('front.pages.postDetail', compact('post','categoryModel'));
    }

    public function postLike($id)
    {
        $user = Auth::user();
        $existingLike = Like::where('user_id', $user->id)
            ->where('post_id', $id)
            ->first();

        if (!$existingLike) {
            // Eğer beğenmemişse, yeni bir like oluştur
            $like = new Like();
            $like->user_id = $user->id;
            $like->post_id = $id;
            $like->save();
        } else {
            // Eğer zaten beğenmişse, like'ı sil
            $existingLike->delete();
        }

        return back(); // Yönlendirme işlemi
    }

    public function postComment($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Lütfen önce giriş yapın.');
        }

            $user = Auth::user();

            $comment = new Comment();
            $comment->user_id = $user->id;
            $comment->post_id = $id;
            $comment->content = request('content');
            $comment->save();

            return back()->with('success', 'Yorumunuz başarıyla eklendi!');
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return back()->with('success', 'Yorumunuz başarıyla silindi!');
    }

}
