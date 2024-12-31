<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('adminPanel.pages.index');
    }

    public function addCategory()
    {
        return view('adminPanel.pages.addCategory');
    }

    public function addCategoryPost(Request $request)
    {

        $categoryModel = new Category();
        $categoryModel->name = $request->category;
        $categoryModel->save();

        return redirect()->route('panel.categoryList')->with('success', 'Kategori başarıyla eklendi.');
    }

    public function categoryList()
    {
        $categories = Category::get();
        //dd($categories);
        return view('adminPanel.pages.categoryList',compact('categories'));
    }

    public function addContent()
    {

        $categories = Category::all();
        return view('adminPanel.pages.addContent', compact('categories'));
    }

    public function addContentPost(Request $request)
    {
        $user = Auth::user();

        $postModel = new Post();
        $postModel->title = $request->title;
        $postModel->content = $request->contents;
        $postModel->user_id = $user->id;
        $postModel->category_id = $request->category_id;

        $postModel->save();

        return redirect()->route('panel.contentList')->with('success', 'İçerik başarıyla eklendi.');
    }

    public function contentList()
    {
        $posts = Post::all();
        return view('adminPanel.pages.contentList', compact('posts'));
    }

    public function updateCategory($id)
    {
        //where('sütun adı', 'ne aranıyor')
        $categoryModel = Category::find($id);
        return view('adminPanel.pages.updateCategory', compact('categoryModel'));
    }

    public function updateCategoryPost(Request $request)
    {

    }
}


