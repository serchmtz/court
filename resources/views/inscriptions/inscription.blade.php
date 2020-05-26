@extends('layouts.app')

@section('head')
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('dropzone-master/dist/min/dropzone.min.css')}}">

<!-- JS -->
<script src="{{asset('dropzone-master/dist/min/dropzone.min.js')}}" type="text/javascript"></script>
@endsection

@section('content')
<div class = "container">
<h4>Add file</h4>
<form method="POST" action="{{route('subir')}}" accept-charset="UTF-8" enctype="multipart/form-data">
  {{ csrf_field() }}
  <label for="file"><b>Select file: </b></label><br>
  <br>
  <input type="file" name="file" accept=".xls,.xlsx" required>
  <br>
  <input class="btn btn-success" type="submit" value="Inscript" >
</form>
</div>
<br>
<br>
<div class='container'>
<label><b>Drag a file:</b></label>
</div>
<div class='container' style="border: black 2px solid; padding: 60px;">
      <!-- Dropzone -->
      <form action="{{route('inscriptions.addparticipants')}}" class='dropzone' >
      </form> 
</div> 

    <!-- Script -->
    <script>
    var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone(".dropzone",{ 
        maxFilesize: 3,  // 3 mb
        acceptedFiles: ".xls,.xlsx",
    });
    myDropzone.on("sending", function(file, xhr, formData) {
       formData.append("_token", CSRF_TOKEN);
    }); 
    </script>
@endsection