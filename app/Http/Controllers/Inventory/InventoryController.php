<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use App\Inventory;
use DB;
use Carbon\Carbon;
use App\ArticleUnits;

class InventoryController extends Controller {

  public function viewinventory() {
    $categories = Category::all();
    $inventory = Inventory::all();
    $inventory=DB::table('inventory')
          ->join('articles','inventory.article_id','=','articles.id')
          ->select('inventory.*','articles.name')
          ->get();

    return view('inventory.viewinventory', compact('categories', 'inventory'));
  }

  public function addinventory() {
    $categories = Category::all();
    $articles = Article::all();
    $date = Carbon::now();
    $date = $date->format('d-m-Y');

    return view('inventory.addinventory', compact('categories', 'articles', 'date'));
  }

  public function saveinventory(Request $data) {
    $categories = Category::all();
    $date = Carbon::now();
    $date = $date->format('d-m-Y');
    $inventory = new Inventory();
    $inventory->article_id=$data->input('article_id');
    $inventory->date_of_admission=$date;
    $inventory->units=$data->input('units');
    $inventory->save();

    $idArticle = $data->article_id;
    $addUnits = $data->units;
    $idArticleUnits = DB::table('article_units')->where('article_id', $idArticle)->value('id');
    
      if($idArticleUnits === null) {
        $article_units = new ArticleUnits();
        $article_units->article_id=$idArticle;
        $article_units->units=$addUnits;
        $article_units->save();
      } else {
        $article_units = ArticleUnits::find($idArticleUnits);
        $currentUnits = $article_units->units;
        $article_units->article_id=$idArticle;
        $article_units->units= $currentUnits + $addUnits;
        $article_units->save();
      }
    
     return redirect('/viewinventory');
  }

  public function pdf() {
    $inventory = Inventory::all();
    $inventory=DB::table('inventory')
          ->join('articles','inventory.article_id','=','articles.id')
          ->select('inventory.*','articles.name')
          ->get();
    $vista = view('inventory.inventoryPDF',compact('inventory'));
    $pdf=\App::make('dompdf.wrapper');
    $pdf->loadHTML($vista);
    $pdf->setPaper('letter');
    return $pdf->stream('ListadInventario.pdf');
  }

  public function totalarticles() {
    $article_units = ArticleUnits::all();
    $articles = Article::all();
    $categories = Category::all();

    return view('inventory.totalarticles', compact('articles', 'article_units', 'categories'));
  }

}
