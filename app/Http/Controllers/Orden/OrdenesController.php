<?php

namespace App\Http\Controllers\Orden;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use DB;

class OrdenesController extends Controller {

  public function orden($id) {
    $categories = Category::all();
    $article = Article::find($id);

    return view('category.orden', compact('categories', 'article'));
  }
}
