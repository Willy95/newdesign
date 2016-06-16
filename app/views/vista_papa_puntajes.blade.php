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
	Puntajes | {{Auth::user()->username}}
@stop


@section('titulo_contenido')
	Puntajes
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
			Aquí te mostramos los puntajes de tus hijos en gráficas donde de forma mas
			entendible te especificamos los datos. <hr class="hr" style="background-color:rgb(65,198,239); margin-bottom:0px;">
		  </div>
		</div>
	</div>
</div>
@stop


@section('panel_opcion')
<div class="col-md-12 col-xs-12 col-sm-12" id="misHijos">
	<div class="col-md-6 col-sm-6 col-xs-12" id="" style="padding-top:10px;">
  		<center><h4><i class="fa fa-pie-chart"></i> Experiencia</h4><hr class="hr"></center>
	  	<canvas width="100%" height="70%" id="puntaje_exp"></canvas>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12" id="" style="padding-top:10px;">
  		<center><h4><i class="fa fa-line-chart"></i> Puntos</h4><hr class="hr"></center>
	  	<canvas width="100%" height="70%" id="puntaje_pts"></canvas>
	</div>
</div>
@stop


@section('mi_js')
{{HTML::script("/packages/js/libs/validation/jquery.validate.min.js")}}
{{HTML::script("/packages/js/libs/validation/localization/messages_es.min.js")}}
{{HTML::script('/packages/js/libs/validation/additional-methods.min.js')}}
{{HTML::script('/packages/js/libs/steps/jquery.steps.min.js')}}
{{HTML::script('/packages/js/libs/noty/packaged/jquery.noty.packaged.min.js')}}
{{HTML::script('/packages/js/libs/noty/layouts/bottomRight.js')}}
{{HTML::script('/packages/js/libs/noty/layouts/topRight.js')}}
{{HTML::script('/packages/js/libs/mask/jquery-mask/jquery.mask.js')}}
{{HTML::script('/packages/js/libs/date-picker/bootstrap-datepicker.min.js')}}
{{HTML::script('/packages/js/libs/chart/Chart.bundle.min.js')}}
{{HTML::script('/packages/js/curiosity/alert.js')}}
{{HTML::script('/packages/js/libs/cropper/cropper.min.js')}}
{{HTML::script('/packages/js/curiosity/perfil.js')}}
	@if(Auth::user()->hasRole('padre'))
	  {{HTML::script("/packages/js/curiosity/perfilEstadisticas.js")}}
	@endif
<script type="text/javascript">
  $(document).ready(function(){
    
  });
</script>
@stop