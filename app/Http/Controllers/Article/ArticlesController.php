<?php

namespace App\Http\Controllers\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Article;
use App\Category;
use DB;

class ArticlesController extends Controller {

  public function viewmain() {
    $articles = Article::all();
    $categories = Category::all();
    
    return view('article.viewarticles', compact('articles','categories'));
  }

  public function addarticle() {
    $categories = Category::all();
    return view('article.addarticle', compact('categories'));
  }

  public function savearticle(Request $data) {
    $article = new Article();
  
    $name1 = $data->name;
    $name1 = substr($name1, 0, 2);
    $name1 = strtoupper($name1);

    $description1 = $data->description;
    $description1 = substr($description1, 0, 2);
    $description1 = strtoupper($description1);

    $idCode = $data->id;
    $price1 = money_format('%.2n', $data->price);
    $costo1 = $data->price;
    $costo1 = $costo1 / 2;
    $costo1 = $costo1 * 3;


    $article->name=$data->input('name');
    $article->code= $name1 .$idCode .$description1;
    $article->price= $price1;
    $article->costo= $costo1;
    $article->description=$data->input('description');
    $article->save();

    return redirect('/viewarticles');
  }

  public function editarticle($id) {
    $article = Article::find($id);
    $categories = Category::all();
    return view('article.editarticle', compact('article', 'categories'));
  }

  public function updatearticle($id, Request $data){
    $article = Article::find($id);

    $name1 = $data->name;
    $name1 = substr($name1, 0, 2);
    $name1 = strtoupper($name1);

    $description1 = $data->description;
    $description1 = substr($description1, 0, 2);
    $description1 = strtoupper($description1);

    $idCode = $data->id;
    $price1 = money_format('%.2n', $data->price);
    $costo1 = $data->price;
    $costo1 = $costo1 / 2;
    $costo1 = $costo1 * 3;


    $article->name=$data->input('name');
    $article->code= $name1 .$idCode .$description1;
    $article->price= $price1;
    $article->costo= $costo1;
    $article->description=$data->input('description');
    $article->save();

    return redirect('/viewarticles');
  }

  public function deletearticle($id) {
    $article = Article::find($id);
    $article->delete();

    return redirect('/viewarticles');
  }

  public function pdf() {
    $article = Article::all();
    $vista = view('article.articulosPDF',compact('article'));
    $pdf=\App::make('dompdf.wrapper');
    $pdf->loadHTML($vista);
    $pdf->setPaper('letter');
    return $pdf->stream('ListadoArticulos.pdf');
  }

  public function import() {
    $articles = Article::all();
    $categories = Category::all();
    Excel::load('article.csv', function($reader) {

    foreach ($reader->get() as $article) {
      Article::create([
        'code' => $article->code,
        'description' =>$article->description,
        'price' =>$article->price,
        'costo' =>$article->costo,
        'name' =>$article->name
      ]);
    }
  });

  return view('article.viewarticles', compact('articles','categories'));
    
  }
}





