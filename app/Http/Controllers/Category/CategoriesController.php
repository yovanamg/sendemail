<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\ArticleCategory;
use DB;;

class CategoriesController extends Controller {

  public function viewcategory() {
    $articles = Article::all();
    $categories = Category::all();

    return view('category.viewcatart', compact('articles','categories'));
  }

  public function addcategory() {
    $categories = Category::all();
    return view('category.addcategory', compact('categories'));
  }

  public function savecategory(Request $data) {
    $categories = Category::all();
    $category = new Category();

    $category->name=$data->input('name');
    $category->save();

    return redirect('/viewcategories');
  }

  public function editcategory($id) {
    $category = Category::find($id);
    $categories = Category::all();
    return view('category.editcategory', compact('category', 'categories'));
  }

  public function updatecategory($id, Request $data) {
    $category = Category::find($id);

    $category->name=$data->input('name');
    $category->save();

    return redirect('/viewcategories');
  }

  public function deletecategory($id) {
    $category = Category::find($id);
    $category->delete();

    return redirect('/viewcategories');
  }

  public function pdf() {
    $categories = Category::all();
    $vista = view('category.categoriesPDF',compact('categories'));
    $pdf=\App::make('dompdf.wrapper');
    $pdf->loadHTML($vista);
    $pdf->setPaper('letter');
    return $pdf->stream('ListadoCategorias.pdf');
  }

  public function addarticles($id) {
    $category = Category::find($id);
    $categories = Category::all();

    $list=DB::table('articles_categories')
    ->join('articles','articles.id', '=', 'articles_categories.article_id')
    ->where('articles_categories.category_id','=', $id)
    ->pluck('articles.id');

    $availableItems=DB::table('articles')
    ->whereNotIn('articles.id', $list)
    ->select('articles.*')
    ->get();

    $myItems=DB::table('articles')
    ->whereIn('articles.id', $list)
    ->join('articles_categories','articles.id', '=', 'articles_categories.article_id')
    ->where('articles_categories.category_id', "=", $id)
    ->select('articles.*')
    ->get();

    return view('category.addarticles', compact('category', 'categories', 'myItems', 'availableItems'));
  }

  public function deleteartcat($ida,$idc) {
    DB::table('articles_categories')
    ->where ('articles_categories.article_id','=',$ida)
    ->where('articles_categories.category_id','=',$idc)
    ->delete();

    return redirect('/addarticles/'.$idc);
  }

  public function addartcat($ida,$idc) {
    $articles_categories= new ArticleCategory();
    $articles_categories->article_id=$ida;
    $articles_categories->category_id=$idc;
    $articles_categories->save();

    return redirect('/addarticles/'.$idc);
  }

  public function pdfcatart($id) {
    $category=Category::find($id);
    $list=DB::table('articles_categories')
    ->join('articles','articles.id', '=', 'articles_categories.article_id')
    ->where('articles_categories.category_id','=', $id)
    ->pluck('articles.id');

    $myItems=DB::table('articles')
    ->whereIn('articles.id', $list)
    ->join('articles_categories','articles.id', '=', 'articles_categories.article_id')
    ->where('articles_categories.category_id', "=", $id)
    ->select('articles.*')
    ->get();
    $vista = view('category.articlescategoriesPDF',compact('myItems','category'));
    $pdf=\App::make('dompdf.wrapper');
    $pdf->loadHTML($vista);
    $pdf->setPaper('letter');
    return $pdf->stream('Listadodecategoriasarticulos.pdf');
  }
}













