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
	Tienda | {{Auth::user()->username}}
@stop


@section('titulo_contenido')
	Tienda Avatar Curiosity
@stop

@section('titulo_small')
@stop


@section('panel_opcion')

@stop


@section('mi_js')

@stop