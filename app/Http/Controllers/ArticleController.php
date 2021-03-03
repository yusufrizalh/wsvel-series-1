<?php
namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public function index() {
        $articles = Article::latest()->paginate(5);
        return view("index", compact('articles'));
    }

    public function create() {
        return view('create-article');
    }

    public function store(Request $request) {
        $request->validate([
            "title" => "required",
            "description" => "required"
        ]);

        $article = Article::create($request->all());
        if(!is_null($article)) {
            return back()->with("success", "Success, Article is created!");
        } else {
            return back()->with("failed", "Failed, Article is not created!");
        }
    }

    public function show(Article $article) {
        return view('show-article', compact('article'));
    }

    public function edit(Article $article) {
        return view('edit-article', compact('article'));
    }

    public function update(Request $request, Article $article) {
        $request->validate([
            "title" => "required",
            "description" => "required"
        ]);

        $article = $article->update($request->all());
        if (!is_null($article)) {
            return back()->with("success", "Success, Article is updated!");
        } else {
            return back()->with("failed", "Failed, Article is not updated!");
        }
    }

    public function destroy(Article $article) {
        $article = $article->delete();
        if (!is_null($article)) {
            return back()->with("success", "Success, Article is deleted!");
        } else {
            return back()->with("failed", "Failed, Article is not deleted!");
        }
    }
}
