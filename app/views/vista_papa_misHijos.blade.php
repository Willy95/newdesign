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
	Mis Hijos | {{Auth::user()->username}}
@stop


@section('titulo_contenido')
	Mis Hijos
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
			Aquí te mostramos a tus hijos registrados en la plataforma junto con su
			información, como nombre, nombre de usuario y su avatar. Por último aquí podrás
			registrar un nuevo hijo. <hr class="hr" style="background-color:rgb(65,198,239); margin-bottom:0px;">
		  </div>
		</div>
	</div>
</div>
@stop


@section('panel_opcion')
<!-- VENTANA MODAL PARA EL REGISTRO DE UN NUEVO HIJO -->
<div class="row">
  <div class="">
  	<div class="modal fade" id="registro_hijo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center>
			  <h2 class="modal-title" id="myModalLabel"> Registro de un nuevo hijo </h2>
			</center>
			<center>
				<i class="fa fa-female" style="color:#65499d; font-size:2em;"></i>
				<i class="fa fa-male" style="color:#65499d; font-size:2em;"></i>
			</center>
		  </div>
		  <div class="modal-body">
			
		  </div>
		</div>
	  </div>
    </div>
  </div>
</div>

<!-- SECCION DONDE MOSTRAMOS HIJO Y AVATAR -->
<div class="row">
	<div class="col-md-10 col-xs-10 col-sm-10 col-md-offset-1 col-xs-offset-1 col-sm-offset-1" id="misHijos">
	  <h3><i class="fa fa-child"></i> Mis Hijos 
	  <button class="btn pull-right" style="background-color:#94bc3d; color:white;" data-toggle="modal" data-target="#registro_hijo">Registrar nuevo hijo</button></h3>
	  <hr class="hr">
 	  <!-- foreach para recorrer a los hijos y avatar-->
 	 	<div class="col-md-6 col-sm-6 col-xs-12 hijo_avatar">
 	 		<div class="">
 	 			<div class="col-md-6 col-sm-6 col-xs-6 div-image">
 	 			<img src="/packages/images/perfil/perfil-default.jpg" alt="" class="image img-responsive img-rounded" title="foto perfil de tu hijo">
 	 			<!-- nombre del hijo nombre y ambos apellidos -->
 	 			<br><center><p class="nombres">Fernando Canales Rivas</p></center>
 	 			<center><p class="nombres" style="color:black;">fercnls</p></center>
 	 		</div>
 	 		<div class="col-md-6 col-sm-6 col-xs-6 div-image">
 	 			<img src="/packages/images/perfil/perfil-default.jpg" alt="" class="image img-responsive img-rounded" title="avatar de tu hijo">
 	 			<!-- nombre del avatar del hijo -->
 	 			<br><center><p class="nombres">Oblivion</p></center>
 	 		</div>
 	 		</div>
 	 	</div>
	  <!-- end foreach -->
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
{{HTML::script('/packages/js/libs/highcharts/highcharts.js')}}
{{HTML::script('/packages/js/curiosity/alert.js')}}
{{HTML::script('/packages/js/libs/cropper/cropper.min.js')}}
{{HTML::script('/packages/js/curiosity/perfil.js')}}
	@if(Auth::user()->hasRole('padre'))
	  {{HTML::script("/packages/js/curiosity/perfilEstadisticas.js")}}
	@endif
@stop