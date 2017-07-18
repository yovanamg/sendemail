@extends('admin.layouts')

@section('content')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="https://i.ytimg.com/vi/1tr6lqO4pzo/maxresdefault.jpg" alt="..." style="width: 1200px; height: 500px">
      <div class="carousel-caption">
        ...
      </div>
    </div>

    <div class="item">
      <img src="https://i.ytimg.com/vi/UxsobTR7EX0/maxresdefault.jpg" alt="..." style="width: 1200px; height: 500px">
      <div class="carousel-caption">
        ...
      </div>
    </div>

    <div class="item">
      <img src="https://i.ytimg.com/vi/1vPRNz2Hblk/maxresdefault.jpg" alt="..." style="width: 1200px; height: 500px">
      <div class="carousel-caption">
        ...
      </div>
    </div>
  </div>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection