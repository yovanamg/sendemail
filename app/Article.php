<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
  protected $table='articles';

  protected $fillable = ['code', 'description','price', 'costo', 'name'];
}