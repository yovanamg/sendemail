<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use BD;

class CategoriesController extends Controller {
  public function viewcategory() {
    $articles = Article::all();
    $categories = Category::all();

    return view('article.viewcatart', compact('articles','categories'));
  }
}
