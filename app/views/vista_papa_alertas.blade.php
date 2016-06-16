@extends('admin_base')
@section('mi_css')
 {{HTML::style('/packages/css/curiosity/alert.css')}}
 {{HTML::style('/packages/css/libs/steps/jquery.steps.css')}}
 {{HTML::style('/packages/css/libs/date-picker/datepicker.min.css')}}
 {{HTML::style("/packages/css/libs/cropper/cropper.min.css")}}
 {{HTML::style('/packages/css/curiosity/alert.css')}}
 {{HTML::style('/packages/css/curiosity/perfil.css')}}
@stop

@section('title')
	Alertas | {{Auth::user()->username}}
@stop


@section('titulo_contenido')
	Alertas
@stop

@section('titulo_small')
<div class="row">
	<div class="col-md-10 col-xs-12 col-sm-10">
		<button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
	  	style="background-color:rgb(54,142,184); color:white;">
		  <i class="fa fa-info-circle"></i> Información sobre esta sección
		</button>
		<div class="collapse" id="collapseExample" style="margin-top:5px;">
		  <div class="well" style="color:black; z-index:1; position:absolute; 
		  background-color:white; border:2px solid #e3e3e3;">
			Aquí te mostramos los mensajes que tenemos para ti donde te informamos el avance de
			tus hijos y si todo va bien o existe algún problema. <hr class="hr" style="background-color:rgb(65,198,239); margin-bottom:0px;">
		  </div>
		</div>
	</div>
</div>
@stop


@section('panel_opcion')
<div class="col-md-12 col-sm-12 col-xs-12">
	col-
</div>
@stop


@section('mi_js')

@stop