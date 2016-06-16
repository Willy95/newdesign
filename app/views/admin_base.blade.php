<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="/packages/images/Curiosity.png">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    {{ HTML::style('/packages/css/libs/bootstrap/bootstrap.min.css')}}
    {{ HTML::style('/packages/css/libs/awensome/css/font-awesome.min.css')}}
  	{{ HTML::style('/packages/css/libs/animate/animate.min.css')}}
    {{ HTML::style('/packages/css/skins/_all-skins.min.css') }}
    {{ HTML::style('/packages/css/curiosity/userStyle.css') }}
    {{ HTML::style('/packages/css/curiosity/vistaEstandar.css') }}
    {{ HTML::style('/packages/css/libs/tooltipster/tooltipster.css') }}
    {{ HTML::style('/packages/css/libs/sweetalert/sweetalert.css') }}
    {{ HTML::style('/packages/css/libs/colorpicker/colorpicker.css') }}
    @yield('mi_css')
    <title>Curiosity | @yield('title')</title>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <audio src="/packages/notificaciones/music.mp3" id="notyAudio"></audio>
    <div class="wrapper">

      <header class="main-header">
        <div class="logo">
          <span class="logo-mini">
            {{HTML::image('/packages/images/Curiosity-mini.png')}}
          </span>
          <span class="logo-lg">
            {{HTML::image('/packages/images/Curiosity-mini.png')}}
            <b>Curiosity<small>.com.mx</small></b>
          </span>
        </div>

        <!-- Header Navbar -->
        <nav class="navbar navbar-fixed-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title="ocultar/mostrar menu"></a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Menu de cuenta de usuario -->
              <li class="dropdown user user-menu hidden-xs">
                <a id="menu-usuario" href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{HTML::image(User::get_imagen_perfil(Auth::user()->id), 'alt', array('class' => 'user-image img-profile'))}}
                  {{Auth::user()->persona()->first()->nombre}} {{Auth::user()->persona()->first()->apellido_paterno}} <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <!-- Ìmagen de perfil de la parte superior derecha -->
                    <!--{{HTML::image(User::get_imagen_perfil(Auth::user()->id), 'alt', array('class' => 'img-circle img-profile'))}}-->
                    <img src="/packages/images/avatars/lupa.png" alt="" class="img-profile">
                    <p>
                      @if(Auth::user()->hasRole('padre'))
                      	<small><b>¡ Soy curiosity !</b></small>
                      @endif
                      @if(Auth::user()->hasRole('hijo'))
                      	<small><b>¡ Qué tu curiosidad no tenga límites !</b></small>
                      @endif
                    </p>
                  </li>

                  <!-- Footer Menu -->
                  <li class="user-footer">
                    <!--<div class="pull-left">
                      <a href="/perfil" class="btn btn-primary">
                        <span class="fa fa-gear"></span>
                        Editar Perfil
                      </a>
                    </div>-->
                    <div class="">
                      <a href="/logout" class="btn form-control" style="width:70%; margin-left:15%; background-color:#8a489b; color:white;">
                        <span class="fa fa-sign-out"></span>
                        Cerrar Sesión
                      </a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>

      <!-- Barra lateral izquierda con menu y estatus -->
      <aside class="main-sidebar">
        <section class="sidebar">
          
          <div class="user-panel">
              <div class="pull-left image">
				<!-- Imagen de Perfil de la parte del menú -->
				{{HTML::image(User::get_imagen_perfil(Auth::user()->id), 'alt', array('class' => 'img-circle img-profile'))}}
            </div>
            <div class="pull-left info"><br>
              <p>{{Auth::user()->username}}</p>
              <small></small>
            </div>
          </div><hr style="width:80%;">

          <!-- menu en la barra lateral izquierda -->
          
          <ul class="sidebar-menu">

            
            @if(Auth::user()->hasRole('padre'))
            <li id="menuPerfil">
              <a href="/inicioPapa">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
              </a>
            </li>
            <li id="menuMisHijos">
              <a href="/misHijos">
                <i class="fa fa-child"></i>
                <span>Mis hijos</span>
              </a>
            </li>
            <li id="menuPuntajes">
              <a href="/puntajes">
                <i class="fa fa-line-chart"></i>
                <span>Puntajes</span>
              </a>
            </li>
            <li id="menuAlertas">
              <a href="/alertas">
                <i class="fa fa-bullhorn"></i>
                <span>Alertas</span>
              </a>
            </li>
            <li id="menuPremium" class="">
              <button class="btn form-control" id="premium">
              	<i class="fa fa-diamond"></i>
              	<span>Premium</span>
              </button>
            </li>
            @endif
            
            @if(Auth::user()->hasRole('hijo'))
            <li id="menuPerfil">
              <a href="/inicioHijo">
                <i class="fa fa-home"></i>
                <span>Inicio</span>
              </a>
            </li>
        <!--<li id="menuTiendaAvatar">
              <a href="/tienda">
                <i class="fa fa-shopping-bag"></i>
                <span>Tienda avatar</span>
              </a>
            </li>-->
            
            <li id="menuDatos">
              <a href="/datosHijo">
                <i class="fa fa-pencil-square-o"></i>
                <span>Editar mis datos</span>
              </a>
            </li>
            @endif
            
            @if(Entrust::can('realizar_actividades'))
              <li id="menuNivel">
                <a href="/nivel">
                  <i class="fa fa-graduation-cap"></i>
                  <span>Actividades</span>
                </a>
              </li>
            @endif

            @if(Entrust::can('gestionar_niveles'))
              <li id="menuAdminNivel">
                <a href="/adminNivel">
                  <i class="fa fa-gears"></i>
                  <span>Gestión Contenido</span>
                </a>
              </li>
            @endif

            @if(Entrust::can('gestionar_escuelas'))
              <li id="menuAdminEscuela">
                <a href="/adminEscuela">
                  <i class="fa fa-gears"></i>
                  <span>Gestión Escuelas</span>
                </a>
              </li>
            @endif

            @if(Entrust::can('gestionar_profesores'))
              <li id="menuAdminProfesor">
                <a href="/adminProfesor">
                  <i class="fa fa-gears"></i>
                  <span>Gestión Profesores</span>
                </a>
              </li>
            @endif
			       
            <li class="visible-xs">
              <a href="/logout" class="btn" id="logOut">
                <i class="fa fa-sign-out"></i>
                <span>Cerrar sesión</span>
              </a>
            </li>
        </ul>
      </section>
    </aside>

      <!-- Zona de Contenido general -->
      <div class="content-wrapper"><br><br>
        <!-- Encabezado de la pagina -->
        <section class="content-header" id="img-portada">
          <div class="">
            <h1 id="titulo">
              @yield('titulo_contenido')
              <button class="btn btn pull-right" id="portada-btn" data-toggle="tooltip" data-placement="bottom" title="Cambiar imagen"><i class="fa fa-picture-o"></i></button>
            </h1>
            <div class="custom-brands">
             <h4 id="msj_bienvenida">@yield('titulo_small')</h4>
              <ul id="migas">
                @yield('migas')
              </ul>
            </div>
          </div>
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <div class="container-fluid">
              <div class="row" id="make-all">
              <!-- panel para biblioteca de estudio -->
                @yield('panel_opcion')
              </div>
            </div>
        </section>
      </div>

      <!-- Footer principal general -->
      <!--<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <small>
            <b>¡Qué tu curiosidad no tenga límites!</b>
          </small>
        </div>
        <strong>Copyright &copy; 2016 <a href="javascript:void(0)">Curiosity.com.mx</a></strong>
      </footer>-->

  {{HTML::script('/packages/js/libs/jquery/jquery.min.js')}}
  {{HTML::script('/packages/js/libs/bootstrap/bootstrap.min.js')}}
  {{HTML::script('/packages/js/app.min.js')}}
  {{HTML::script('/packages/js/curiosity/desktop-notify.js')}}
  {{HTML::script('/packages/js/libs/sweetalert/sweetalert.min.js')}}
  {{HTML::script('/packages/js/libs/noty/packaged/jquery.noty.packaged.min.js')}}
  {{HTML::script('/packages/js/libs/noty/layouts/bottomRight.js')}}
  {{HTML::script('/packages/js/libs/noty/layouts/topRight.js')}}
  {{HTML::script('/packages/js/curiosity/curiosity.js')}}
  {{HTML::script('/packages/js/libs/tooltipster/jquery.tooltipster.min.js')}}
  {{HTML::script('/packages/js/libs/colorpicker/colorpicker.js')}}

  <script type="text/javascript">
    $(document).ready(function(){
		
		$("body").click(function(){
			if($(".user-menu").hasClass("open")){
				$("#menu-usuario").trigger('click');
			}
		});
		
		$("#menu-usuario").click(function(){
			$('.fa-angle-down').toggleClass('giro');
		});
		
		
		
      $(".tooltipShow").tooltipster({
        position : 'bottom',
        touchDevices: true
      });
      var source;
      if (window.EventSource) {
         var source = new EventSource('/recordatorio');
            source.onopen = function (e) {
              //console.log(e);
            };

            source.onerror = function (e) {
              //console.log(e);
            };

           source.addEventListener('message',function(e){
               var data = JSON.parse(e.data);
               $.each(data,function(i,array){
                   $curiosity.noty(array.mensaje,"message","Papa dice: ","packages/images/perfil/"+array.foto_perfil);
               });
           },false);

      }


    });
  </script>
  @yield('mi_js')
  </body>
</html>
