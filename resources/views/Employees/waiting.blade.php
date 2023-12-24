@extends('layouts.second-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'En attente')
@section('main')
    <x-header/>
    @section('nav')
        <x-simpleNav/>
    @endsection

    @section('main-content')
        <div class="w-full h-full flex justify-center items-center">
           <h1 class="text-lg font-extrabold text-slate-500">Votre dossier est en cours de consultation....</h1>
        </div>
    @endsection
@endsection