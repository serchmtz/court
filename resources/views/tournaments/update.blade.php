@extends('layouts.app')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo Libro</h3>
				</div>
				<div class="panel-body">					
					<div class="table-container">
						<form method="post" action="{{ route('tournament.update',$tournament) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PUT">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="name" class="form-control input-sm" value="{{$tournament->name}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="date" id="date" class="form-control input-sm" value="{{$tournament->date}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="catogory" id="category" class="form-control input-sm" value="{{$tournament->category}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="competition" id="competition" class="form-control input-sm" value="{{$tournament->competition}}">
									</div>
								</div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="number" name="nRounds" id="nRounds" class="form-control input-sm" value="{{$tournament->nRounds}}">
									</div>
								</div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="location" id="location" class="form-control input-sm" value="{{$tournament->location}}">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('tournaments') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>	
 
							</div>
						</form>
					</div>
				</div>
 
			</div>
		</div>
	</section>
	@endsection