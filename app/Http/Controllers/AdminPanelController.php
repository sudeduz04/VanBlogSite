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

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }
        $postModel->image = $imagePath;
        $postModel->save();

        return redirect()->route('panel.contentList')->with('success', 'İçerik başarıyla eklendi.');
    }

    public function contentList()
    {
        $posts = Post::with('category')->get();
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
        $categoryModel = Category::find($request->categoryId);
        $categoryModel->name = $request->categoryName;
        $categoryModel->save();

        return redirect()->route('panel.categoryList')->with('success', 'Kategori başarıyla güncellendi.');
    }

    public function deleteCategory($id)
    {
        $categoryModel = Category::find($id);

        if ($categoryModel) {
            $postModels = Post::where('category_id', $categoryModel->id)->get();

            foreach ($postModels as $post) {
                $post->delete();
            }
        }
        $categoryModel->delete();
        return redirect()->route('panel.categoryList')->with('success', 'Kategori başarıyla silindi');
    }

    public function updateContent($id)
    {
        $postModel = Post::find($id);
        $category = Category::all();
        return view('adminPanel.pages.updateContent', compact('postModel', 'category'));
    }

    public function updateContentPost(Request $request)
    {
        $postModel = Post::find($request->postId);
        $postModel->category_id = $request->category_id;
        $postModel->title = $request->contentTitle;
        $postModel->content = $request->contents;
        $postModel->save();

        return redirect()->route('panel.contentList')->with('success', 'İçerik başarıyla güncellendi.');
    }

    public function deleteContent($id)
    {
        $postModel = Post::find($id);
        $postModel->delete();
        return redirect()->route('panel.contentList')->with('success', 'Gönderi başarıyla silindi');
    }

}
