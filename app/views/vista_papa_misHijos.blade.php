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
            <div class="row" style="padding-right:1%; padding-left:1%">
              <form class="form-horizontal" id="frm-reg-hijos">
                <div id="wizard">
                  <h2>Datos generales</h2>
                  <section>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <spna  class="fa fa-user"></spna>
                        </span>
                        <input type="text"  name="nombre" id="nombre" value="" class="form-control form-custom" placeholder="Nombre del niño/a">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <spna class="fa fa-chevron-right"></spna>
                        </span>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" value="" class="form-control form-custom" placeholder="Apellido paterno">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <spna class="fa fa-chevron-right"></spna>
                        </span>
                        <input type="text" name="apellido_materno" id="apellido_materno" value="" class="form-control form-custom" placeholder="Apellido materno">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <spna class="fa fa-calendar"></spna>
                        </span>
                        <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="" class="form-control datepicker_hijo" placeholder="Fecha de nacimiento">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="sexo"><h4 class="title-input"><b>Sexo</b></h4></label>
                        <div class="input-group">
                          <span class="input-group-addon">
                            <span class="fa fa-venus-mars"></span>
                          </span>
                          <select class="form-control form-custom" name="sexo" id="sexo">
                            <option value="m">Masculino</option>
                            <option value="f">Femenino</option>
                          </select>
                        </div>
                     </div>
               </section>
               <h2>Datos escolares</h2>
               <section>
                  <div class="form-group">
                    <label for="sexo"><h4 class="title-input"><b>Nombre de la Escuela</b></h4></label>
                    <div class="input-group">
                      <span  class="input-group-addon tooltipShow">
                        <spna id="return-fa-normal" class="fa fa-chevron-right"></spna>
                        <span title="ver escuelas" style="color:blue; font-weight:bold"  id="return-select-school" class="fa fa-remove hidden"></span>
                      </span>
                      <select name="escuela_id" id="escuela_id"  class="form-control">
                        @foreach(escuela::all()  as $escuela)
                          <option value="{{$escuela->id}}">{{$escuela->nombre}}</option>
                        @endforeach
                        <option value="NULL">Otra</option>
                      </select>
                      <input type="text" nombre="esc_alt" id="esc_alt" placeholder="nombre de la escuela" value="" class="form-control hidden"/>
                    </div>
                 </div>
                 <div class="form-group">
                    <label for="sexo"><h4 class="title-input"><b>Promedio escolar</b></h4></label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <spna class="fa fa-chevron-right"></spna>
                      </span>
                      <input type="text" name="promedio" id="promedio" value="" class="form-control" placeholder="Promedio de su hijo">
                    </div>
                 </div>
               </section>
               <h2>Datos de usuario</h2>
               <section>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <spna  class="fa fa-user"></spna>
                      </span>
                      <input type="text"  name="username_hijo" id="username_hijo" value="" class="form-control form-custom" placeholder="Nombre de Usuario para el niño/a">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <spna class="fa fa-lock"></spna>
                      </span>
                      <input type="password" name="password" id="password" value="" class="form-control form-custom" placeholder="Contraseña">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <spna class="fa fa-lock"></spna>
                      </span>
                      <input type="password" name="cpassword" id="cpassword" value="" class="form-control form-custom" placeholder="Confirmar Contraseña">
                    </div>
                  </div>
               </section>
              </form>
            </div>
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
	<script type="text/javascript">
    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus:true,
        next:"Siguiente",
        finish:"Finalizar",
        previous:"Anterior",
        onFinishing: function (event, currentIndex) {
            if($("#frm-reg-hijos").valid()){
                return true;
            }else{
                return false;
            }
        },
        labels: {
          cancel: "Cancelar",
          //  current: "current step:",
          pagination: "Paginación",
          finish: "Finalizar",
          next: "Siguiente",
          previous: "Anterior",
          loading: "Cargando ..."
        },
        onStepChanging: function (event, currentIndex, newIndex){
          if(newIndex>currentIndex){
           if($(".current input").valid()){
               return true;
           }else return false;
         }else return true;
        },

  });
  @if(!Auth::User()->hasRole('hijo'))
   var dateNow = new Date();
    dateNow.setMonth(dateNow.getMonth()-216);//restar 19 años a la fecha actual
    $('.datepicker').datepicker({
        "language":"es",
        "format" : "yyyy-mm-dd",
        "endDate":dateNow.getFullYear()+"/"+dateNow.getMonth()+"/"+dateNow.getDate(),
       "autoclose": true,
       "todayHighlight" : true
      });
    @else
    var dateNow = new Date();
    dateNow.setMonth(dateNow.getMonth()-48);//restar 19 años a la fecha actual
    $('.datepicker').datepicker({
        "language":"es",
        "format" : "yyyy-mm-dd",
        "endDate":dateNow.getFullYear()+"/"+dateNow.getMonth()+"/"+dateNow.getDate(),
       "autoclose": true,
       "todayHighlight" : true
      });
  @endif

    </script>
@stop