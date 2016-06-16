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
	Perfil | {{Auth::user()->username}}
@stop


@section('titulo_contenido')
	Inicio
@stop

@section('titulo_small')
@stop


@section('panel_opcion')

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
  $(document).ready(function(){
    // $curiosity.call.getEstandarte(1, 1);
  });
</script>

<script>
  $(function ()
  {
    @if(!Auth::user()->hasRole('padre') && !Auth::user()->hasRole('root'))
      $("a[href='#reg-admins']").trigger("click");

    @endif
    $("#wizard-admin").steps({
      headerTag: "h4",
      bodyTag: "section",
      transitionEffect:"slideLeft",
      autoFocus:true,
      cancel:true,
      onFinishing: function (event, currentIndex) {
            if($("#frm-reg-admins").valid()){
                return true;
            }else{
                return false;
            }
        },
        onStepChanging: function (event, currentIndex, newIndex){
          if(newIndex>currentIndex){
           if($(".current input,.current select").valid()){
               return true;
           }else return false;
         }else return true;
        },
        labels: {
          cancel: "Cancelar",
          //  current: "current step:",
          pagination: "Paginación",
          finish: "Registar",
          next: "Siguiente",
          previous: "Anterior",
          loading: "Registrando ..."
        },
    });
    $("#wizard1").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus:true,
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
          finish: "Actualizar",
          next: "Siguiente",
          previous: "Anterior",
          loading: "Actualizando ..."
        },
        onStepChanging: function (event, currentIndex, newIndex){
          if(newIndex>currentIndex){
           if($(".current input").valid()){
               return true;
           }else return false;
         }else return true;
        },

  });

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
   var dateNow = new Date();
    dateNow.setMonth(dateNow.getMonth()-48);//restar 19 años a la fecha actual
    $('.datepicker_hijo').datepicker({
        "language":"es",
        "format" : "yyyy-mm-dd",
        "endDate":dateNow.getFullYear()+"/"+dateNow.getMonth()+"/"+dateNow.getDate(),
       "autoclose": true,
       "todayHighlight" : true
      });
  $("#telefono").mask('(000) 000-0000',{placeholder:"(999) 999-9999"});
    $("#codigo_postal").mask("00000");
    $("#numero").mask("ABCDE",{translation:{
                                                    A:{pattern:/^[0-9]/},
                                                    B:{pattern:/([0-9])?/},
                                                    C:{pattern:/([0-9])?/},
                                                    D:{pattern:/([0-9])?/},
                                                    E:{pattern:/([A-Za-z]{1})?$/}
    }});
    $("#frm_user").validate({
        rules:{
            telefono:{required:true,telephone:true,maxlength:14,minlength:14},
            username_persona:{maxlength:50,required:true,remote:{
                url:"/remote-username-update",
                type:"post",
                username:function(){
                    return $("input[name='username']").val();
                }
            }},
            password_new:{maxlength:100,minlength:8},
            cpassword_new:{equalTo:function(){
                return $("input[name='password_new']");
            }},
            nombre_persona:{required:true,maxlength:50,alpha:true},
            apellido_paterno_persona:{required:true,maxlength:30,alpha:true},
            apellido_materno_persona:{required:true,maxlength:30,alpha:true},
            sexo_persona:{required:true,maxlength:1},
            fecha_nacimiento_persona:{required:true,date:true},
            @if(Auth::User()->hasRole('padre'))
            colonia:{maxlength:50},
            calle:{maxlength:50},
            numero:{maxlength:5,numero_casa:true},
            codigo_postal:{number:true,minlength:5,maxlength:5}
            @endif

        },
        messages:{
            cpassword_new:{equalTo:"La contraseña no coincide"},
            username_persona:{
                        required:"No puedes dejaar en blanco este campo",
                        remote:"Este nombre de usuario se encuentra en uso"
            },
            telefono:{required:"No puedes dejar en blanco este campo"},
            password_now:{remote:"La contraseña es incorrecta"}

        },
         errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent());
         }
    });
   $("#frm_user").on("click","a[href='#finish']",function(){
        if($("#frm_user input").valid()){
            $btn =$(this)
            var text_temp = $(this).text();
            $(this).addClass("striped-alert");
            $(this).text("Actualizando...");
            $(this).prop("disabled",true);
            if($("input[name='password_new']").val()!==""){
                var datos={
                    username_persona:$("input[name='username_persona']").val(),
                    password_persona:$("input[name='password_persona']").val(),
                    password_new:$("input[name='password_new']").val(),
                    cpassword_new:$("input[name='cpassword_new']").val(),
                    @if(!Auth::User()->hasRole('hijo'))
                    telefono:$("input[name='telefono']").val(),
                    @endif
                    @if(Auth::User()->hasRole('padre'))
                    ciudad_id:$("select[name='ciudad_id']").val(),
                    colonia:$("input[name='colonia']").val(),
                    calle:$("input[name='calle']").val(),
                    numero:$("input[name='numero']").val(),
                    codigo_postal:$("input[name='codigo_postal']").val(),
                    @endif
                    nombre_persona:$("input[name='nombre_persona']").val(),
                    apellido_paterno_persona:$("input[name='apellido_paterno_persona']").val(),
                    apellido_materno_persona:$("input[name='apellido_materno_persona']").val(),
                    sexo_persona:$("select[name='sexo_persona']").val(),
                    fecha_nacimiento_persona:$("input[name='fecha_nacimiento_persona']").val()

                }
                $.ajax({
                    url:"/updatePerfil",
                    type:"post",
                    data:{data:datos},
                    beforeSend: function(){
                    message = "Espera.. Los datos se estan Actualizando... Verificando información";
                    after = noty({
                                layout: 'bottomRight',
                                theme: 'defaultTheme', // or 'relax'
                                type: 'information',
                                text: message,
                                animation: {
                                    open: {height: 'toggle'}, // jQuery animate function property object
                                    close: {height: 'toggle'}, // jQuery animate function property object
                                    easing: 'swing', // easing
                                    speed: 300 // opening & closing animation speed
                                }
                            });
                    }
                })
                .done(function(r){
                    console.log(r);
                    if($.isPlainObject(r)){
                        alerta.errorOnInputs(r);
                        $curiosity.noty("Algunos campos no fueron obtenidos... Favor de verificar la información  e intentar nuevamente ","warning");
                    }else if(r == "contraseña incorrecta"){
                        //alerta.show("Contraseña incorreca","","warning-alert striped");
                        $curiosity.noty("Contraseña incorreca","warning");
                    }
                    else if(r =="bien"){
                        $("input[name='password_persona']").val('');
                        $("input[name='password_new']").val('');
                        $("input[name='cpassword_new']").val('');
                        $curiosity.noty("Los datos se han actualizado correctamente, su contraseña ha sido cambiada con exito!!","success");
                        $("span#name-complete").text(datos.nombre_persona+" "+datos.apellido_paterno_persona+" "+datos.apellido_materno_persona);
                        $("span#username-profile").text(datos.username_persona);
                        $("label.error").remove();
                        $("#wizard1-t-0").trigger("click");
                    }
                }).always(function(){
                    $btn.text(text_temp);
                    $btn.removeClass("striped-alert");
                    $btn.prop("disabled",false);
                    after.close();
                });
            }else{
                var datos = {
                     username_persona:$("input[name='username_persona']").val(),
                     @if(!Auth::User()->hasRole('hijo'))
                     telefono:$("input[name='telefono']").val(),
                     @endif
                     @if(Auth::User()->hasRole('padre'))
                     ciudad_id:$("select[name='ciudad_id']").val(),
                     colonia:$("input[name='colonia']").val(),
                     calle:$("input[name='calle']").val(),
                     numero:$("input[name='numero']").val(),
                     codigo_postal:$("input[name='codigo_postal']").val(),
                     @endif
                     nombre_persona:$("input[name='nombre_persona']").val(),
                     apellido_paterno_persona:$("input[name='apellido_paterno_persona']").val(),
                     apellido_materno_persona:$("input[name='apellido_materno_persona']").val(),
                     sexo_persona:$("select[name='sexo_persona']").val(),
                     fecha_nacimiento_persona:$("input[name='fecha_nacimiento_persona']").val()
                }
                $.ajax({
                    url:"/updatePerfilUser",
                    type:"post",
                    data:{data:datos},
                    beforeSend: function(){
                    message = "Espera.. Los datos se estan Actualizando... Verificando información";
                    after = noty({
                                layout: 'bottomRight',
                                theme: 'defaultTheme', // or 'relax'
                                type: 'information',
                                text: message,
                                animation: {
                                    open: {height: 'toggle'}, // jQuery animate function property object
                                    close: {height: 'toggle'}, // jQuery animate function property object
                                    easing: 'swing', // easing
                                    speed: 300 // opening & closing animation speed
                                }
                            });
                    }
                }).done(function(r){
                    console.log(r);
                    if($.isPlainObject(r)){
                        alerta.errorOnInputs(r);
                        $curiosity.noty("Algunos campos no fueron obtenidos... Favor de verificar la información  e intentar nuevamente ","warning");
                    }else if(r == "bien"){
                        $curiosity.noty("Los datos se han actualizado correctamente","success");
                        $("label.error").remove();
                        $("span#name-complete").text(datos.nombre_persona+" "+datos.apellido_paterno_persona+" "+datos.apellido_materno_persona);
                        $("span#username-profile").text(datos.username_persona);
                        $("#wizard1-t-0").trigger("click");
                    }
                }).always(function(r){
                    $btn.text(text_temp);
                    $btn.removeClass("striped-alert");
                    $btn.prop("disabled",false);
                    after.close();
                });
            }
        }else {

        }
       /* $.ajax({
            url:"/updatePerfil",
            type:"post",
            data:{
                data:datos
            }
        }).done(function(r){
            console.log(r);
        });*/
    });
    $('#image').cropper({
    aspectRatio: 1/1,
    responsive: true,
    autoCropArea:1,
    preview:".preview",
    dragMode:'move',
    crop: function(e) {
      // Output the result data for cropping image.
      $("input[name='x']").val(e.x);
      $("input[name='y']").val(e.y);
      $("input[name='width']").val(e.width);
      $("input[name='height']").val(e.height);

    }
    });
    $("img[data-target='#modalPrueba']").click(function(){


    });
     $(".btnRecortar").click(function(){
         var formData = new FormData(document.getElementById('frm-change-image'));
          $.ajax({
            url:$("#frm-change-image").attr("action"),
            type:$("#frm-change-image").attr("method"),
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            beforeSend: function(){
                message = "Espera.. La imagen se esta recortando...";
                after = noty({
                            layout: 'topRight',
                            theme: 'defaultTheme', // or 'relax'
                            type: 'information',
                            text: message,
                            animation: {
                                open: {height: 'toggle'}, // jQuery animate function property object
                                close: {height: 'toggle'}, // jQuery animate function property object
                                easing: 'swing', // easing
                                speed: 300 // opening & closing animation speed
                            }
                        });
                }

         }).done(function(r){
            console.log(r);
            $(".img-profile").attr("src",r);
            $curiosity.noty("La imagen fue guardada y/o recortada exitosamente","success");
            $("button[data-dismiss='modal']").trigger("click");
         }).fail(function(){

         }).always(function(){
          after.close();
       });
     });
        var $inputImage = $('#inImage');
        var URL = window.URL || window.webkitURL;
        var blobURL;
        var $image = $('#image');

            $inputImage.change(function () {
              var files = this.files;
              var file;

              if (!$image.data('cropper')) {
                return;
              }

              if (files && files.length) {
                file = files[0];
                if (/^image\/\w+$/.test(file.type)) {
                    blobURL = URL.createObjectURL(file);
                    $image.one('built.cropper', function () {


                    URL.revokeObjectURL(blobURL);
                  }).cropper('reset').cropper('replace', blobURL);

                } else {
                  window.alert('Please choose an image file.');
                }
              }
      });
});
</script>
@stop