<?php

namespace App\Http\Controllers\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Category;
use App\Article;

class ImageController extends Controller {

	public function viewimgart () {
		$categories = Category::all();
		$articles = Article::all();

		return view('image.viewimgart', compact('categories', 'articles'));
	}

	public function save(Request $request) {

   //obtenemos el campo file definido en el formulario
   $file = $request->file('file');

   //obtenemos el nombre del archivo
   $nombre = $file->getClientOriginalName();

   //indicamos que queremos guardar un nuevo archivo en el disco local
   \Storage::disk('local')->put($nombre,  \File::get($file));

   return "archivo guardado";
	}
}
