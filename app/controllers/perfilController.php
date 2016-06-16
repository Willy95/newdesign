<?php
class perfilController extends BaseController{

    public function update(){
        $datos  =	 Input::get('data');
        $dateNow = date("Y-m-d");
        if(!Auth::User()->hasRole('hijo')){
            $date_min =strtotime("-18 year",strtotime($dateNow));
        }else{
             $date_min =strtotime("-4 year",strtotime($dateNow));
        }
        $date_min=date("Y-m-d",$date_min);
        $rules= [
            "username_persona"          =>"required|user_check|max:50",
            "telefono"                  =>"telephone",
            "password_new"              =>"min:8|max:100",
            "cpassword_new"             =>"same:password_new",
            "nombre_persona"            =>"required|letter|max:50",
            "apellido_paterno_persona"  =>"required|letter|max:30",
            "apellido_materno_persona"  =>"required|letter|max:30",
            "sexo_persona"              =>"required|string|size:1",
            "fecha_nacimiento_persona"  =>"required|date_format:Y-m-d|before:$date_min",
            "ciudad_id"                 =>"integer|exists:ciudades,id",
            "colonia"                   =>"alpha_spaces",
            "calle"                     =>"alpha_spaces",
            "numero"                    =>"numero_casa",
            "codigo_postal"             =>"numeric"
        ];
        $messages = [
               "required"    =>  "Este campo :attribute es requerido",
               "alpha"       =>  "Solo puedes ingresar letras",
               "before"      =>  "La fecha que ingresaste tiene que ser menor al $date_min",
               "date"        =>  "Formato de fecha invalido",
               "numeric"     =>  "Solo se permiten digitos",
               "email"       =>  "Ingresa un formato de correo valido",
               "unique"      =>  "Este usuario ya existe",
               "integer"     =>  "Solo se permiten numeros enteros",
               "exists"      =>  "El campo :attribute no existe en el sistema",
               "unique"      =>  "El campo :attribute no esta disponible intente con otro valor",
               "integer"     =>  "Solo puedes ingresar numeros enteros",
               "same"        =>  "Las contraseñas no coinciden",
               "after"       =>  "La fecha de expiracion es incorrecta, no puedes ingresar fechas inferiores al día de hoy",
         ];
        if(!Hash::check($datos["password_persona"],Auth::user()->password)){
            return "contraseña incorrecta";
        }
        $valid = Validator::make($datos,$rules,$messages);
        if($valid->fails()){
            return $valid->messages();
        }else{
            $datos["password"]=Hash::make($datos["password_new"]);
            $datos["username"]=$datos["username_persona"];
            $user =User::find(Auth::user()->id);
            $user->update($datos);
            $persona= $user->persona();
            if(!Auth::User()->hasRole('hijo')){
                $datos_persona = [
                    "nombre"            =>  $datos["nombre_persona"],
                    "apellido_paterno"  =>  $datos["apellido_paterno_persona"],
                    "apellido_materno"  =>  $datos["apellido_materno_persona"],
                    "sexo"              =>  $datos["sexo_persona"],
                    "telefono"          =>  $datos["telefono"],
                    "fecha_nacimiento"  =>  $datos["fecha_nacimiento_persona"]
                ];
            }else{
                 $datos_persona = [
                    "nombre"            =>  $datos["nombre_persona"],
                    "apellido_paterno"  =>  $datos["apellido_paterno_persona"],
                    "apellido_materno"  =>  $datos["apellido_materno_persona"],
                    "sexo"              =>  $datos["sexo_persona"],
                    "fecha_nacimiento"  =>  $datos["fecha_nacimiento_persona"]
                ];
            }
            $persona->update($datos_persona);
            if(Auth::User()->hasRole('padre')){
                $direccion = $persona->first()->padre()->first()->direccion();
                $direccion->update($datos);
            }
        }
        //$user =   	 User::find(Auth::user()->id);
        //$user->update($datos);
        return "bien";
    }
    public function updateUser(){
        $datos  =    Input::get('data');
        $dateNow = date("Y-m-d");
        if(!Auth::User()->hasRole('hijo')){
            $date_min =strtotime("-18 year",strtotime($dateNow));
        }else{
             $date_min =strtotime("-4 year",strtotime($dateNow));
        }
        $date_min=date("Y-m-d",$date_min);
        $rules= [
            "username_persona"          =>"required|user_check|max:50",
            "telefono"                  =>"telephone",
            "nombre_persona"            =>"required|letter|max:50",
            "apellido_paterno_persona"  =>"required|letter|max:30",
            "apellido_materno_persona"  =>"required|letter|max:30",
            "sexo_persona"              =>"required|string|size:1",
            "fecha_nacimiento_persona"  =>"required|date_format:Y-m-d|before:$date_min",
            "ciudad_id"                 =>"integer|exists:ciudades,id",
            "colonia"                   =>"alpha_spaces",
            "calle"                     =>"alpha_spaces",
            "numero"                    =>"numero_casa",
            "codigo_postal"             =>"numeric"
        ];
        $messages = [
               "required"    =>  "Este campo :attribute es requerido",
               "alpha"       =>  "Solo puedes ingresar letras",
               "before"      =>  "La fecha que ingresaste tiene que ser menor al $date_min",
               "date"        =>  "Formato de fecha invalido",
               "numeric"     =>  "Solo se permiten digitos",
               "email"       =>  "Ingresa un formato de correo valido",
               "unique"      =>  "Este usuario ya existe",
               "integer"     =>  "Solo se permiten numeros enteros",
               "exists"      =>  "El campo :attribute no existe en el sistema",
               "unique"      =>  "El campo :attribute no esta disponible intente con otro valor",
               "integer"     =>  "Solo puedes ingresar numeros enteros",
               "same"        =>  "Las contraseñas no coinciden",
               "after"       =>  "La fecha de expiracion es incorrecta, no puedes ingresar fechas inferiores al día de hoy",
         ];
        $valid = Validator::make($datos,$rules,$messages);
        if($valid->fails()){
            return $valid->messages();
        }else{

            $user =User::find(Auth::user()->id);
            $datos["username"]=$datos["username_persona"];
            $user->update($datos);
            $persona= $user->persona();
            if(!Auth::User()->hasRole('hijo')){
                $datos_persona = [
                    "nombre"            =>  $datos["nombre_persona"],
                    "apellido_paterno"  =>  $datos["apellido_paterno_persona"],
                    "apellido_materno"  =>  $datos["apellido_materno_persona"],
                    "sexo"              =>  $datos["sexo_persona"],
                    "telefono"          =>  $datos["telefono"],
                    "fecha_nacimiento"  =>  $datos["fecha_nacimiento_persona"]
                ];
            }else{
                 $datos_persona = [
                    "nombre"            =>  $datos["nombre_persona"],
                    "apellido_paterno"  =>  $datos["apellido_paterno_persona"],
                    "apellido_materno"  =>  $datos["apellido_materno_persona"],
                    "sexo"              =>  $datos["sexo_persona"],
                    "fecha_nacimiento"  =>  $datos["fecha_nacimiento_persona"]
                ];
            }
            $persona->update($datos_persona);
            if(Auth::User()->hasRole('padre')){
                $direccion = $persona->first()->padre()->first()->direccion();
                $direccion->update($datos);
            }
            return "bien";
        }
    }
    public function cutImage(){
        $x =   (integer)Input::get("x");
        $y = (integer)Input::get("y");
        $width = (integer)Input::get("width");
        $height = (integer)Input::get("height");

         if(Input::hasFile('image')){// si se establecio una imagen para recortar
            $image = Input::file('image');
            $imagen = Image::make($image->getRealPath());

            $alto = $imagen->height;
            $ancho = $imagen->width;

            if($ancho > 3000){
                $max = 3000;
                $extra = ($ancho - $max);
                $porcent = (integer)(($extra * 100) / $max);
                $imagen->width = $max;

                $dif = (($porcent * $alto) / 100);
                $alturaNew = $alto - $dif;
                $imagen->height = $alturaNew;
                $imagen->resize($imagen->width, $imagen->height);
            }

            if($alto > 2000){
                $max = 2000;
                $extra = ($alto - $max);
                $porcent = (integer)(($extra * 100) / $max);
                $imagen->height = $max;

                $dif = (($porcent * $ancho) / 100);
                $anchoNew = $ancho - $dif;
                $imagen->width = $anchoNew;
                $imagen->resize($imagen->width, $imagen->height);
            }

            //guardar imagen original
            $imagen->save(public_path()."/packages/images/perfil/original/".Auth::user()->username.".".$image->getClientOriginalExtension());
            $imagen->crop($width,$height,$x,$y);
            $imageSave =public_path()."/packages/images/perfil/".Auth::user()->username.".".$image->getClientOriginalExtension();

            $imagen->save($imageSave);

            $perfil =Auth::user()->perfil()->first();
            $perfil->foto_perfil=Auth::user()->username.".".$image->getClientOriginalExtension();
            $perfil->save();
            return asset(str_replace(public_path(),"",$imageSave).'?'.$v=rand());
         }else{
            $imagen = Image::make(public_path().'/packages/images/perfil/original/'.Auth::user()->perfil()->first()->foto_perfil);
            $imagen->crop($width,$height,$x,$y);
            $path= public_path().'/packages/images/perfil/'.Auth::user()->perfil()->first()->foto_perfil;
            $imagen->save($path);
            return asset(str_replace(public_path(),"",$path).'?'.$v=rand());
         }
    }
	
	public function inicioPapa(){
		if(Request::method() == "GET"){
            $perfil = Auth::User()->perfil()->first();
            $persona = Auth::User()->persona()->first();
            $padre=$persona->padre()->first();
            $estados = estado::all();
            $escuelas = escuela::where('active', '=', '1')->get();
            $idAuth = Auth::user()->id;
            $rol = User::join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')
            ->join('roles', 'assigned_roles.role_id', '=', 'roles.id')
            ->where('users.id', '=', Auth::user()->id)
            ->pluck('name');
            if(Auth::user()->hasRole('padre') || Auth::user()->hasRole('root') || Auth::user()->hasRole('demo_padre')){
                $idPadre = Auth::user()->persona()->first()->padre()->pluck('id');
                $datosHijos = Padre::join('hijos', 'hijos.padre_id', '=', 'padres.id')
                ->join('personas', 'personas.id', '=', 'hijos.persona_id')
                ->join('users', 'users.id', '=', 'personas.user_id')
                ->join('perfiles', 'perfiles.users_id','=', 'users.id')
                ->where('users.active', '=', '1')
                ->where('hijos.padre_id', '=', $idPadre)
                ->select('hijos.*', 'personas.*', 'users.*', 'perfiles.*')->get();                
                return View::make('vista_papa_inicio')
                ->with(array('perfil' => $perfil, 'persona' => $persona, 'datosHijos' => $datosHijos, 'escuelas'=>$escuelas,"padre"=>$padre,"estados"=>$estados, 'rol'=>$rol));
            }
            else{
                return View::make('vista_papa_inicio')->with(array('perfil' => $perfil, 'persona' => $persona, 'escuelas'=>$escuelas,"padre"=>$padre,"estados"=>$estados, 'rol'=>$rol));
            }
        }
	}
	
	public function misHijos(){
		return View::make('vista_papa_misHijos');
	}
	
	public function puntajes(){
		return View::make('vista_papa_puntajes');
	}
	
	public function alertas(){
		return View::make('vista_papa_alertas');
	}
	
	public function inicioHijo(){
		return View::make('vista_hijo_inicio');
	}
	
	public function tienda(){
		return View::make('vista_hijo_tiendaAvatar');
	}

}
