@extends('admin.layouts')

@section('content')
<script>

    $(document).ready(function(){
      $("#miId").click(function(){
        console.log('tutu')
      });  

    });
    $("#output").pivot(
        [
            {color: "blue", shape: "circle"},
            {color: "red", shape: "triangle"}
        ],
        {
            rows: ["color"],
            cols: ["shape"]
        }
      );

  </script>

  <a id="miId">
    HOlAAAAAAAAAA
  </a>
  <div id="output">
  </div>

@endsection