@extends('layouts.app')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Torneos</h3></div>
          <div class="pull-right">
            <div class="btn-group">
            <a href="{{ route('tournament.create') }}" class="btn btn-info" >Añadir Torneo</a>
            <a href="{{ route('inscriptions.inscription') }}" class="btn btn-primary">Inscription</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Categoría</th>
               <th>No. de Rounds</th>
               <th>Competencia</th>
               <th>Locación</th>
               <th>Fecha</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($tournaments->count())  
              @foreach($tournaments as $tournament)  
              <tr>
                <td>{{$tournament->name}}</td>
                <td>{{$tournament->category}}</td>
                <td>{{$tournament->nRounds}}</td>
                <td>{{$tournament->competition}}</td>
                <td>{{$tournament->location}}</td>
                <td>{{$tournament->date}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('TournamentController@edit', $tournament)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TournamentController@destroy', $tournament)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td> 
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">¡No hay ningún torneo!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection