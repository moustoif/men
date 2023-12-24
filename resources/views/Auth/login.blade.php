@extends('layouts.second-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Acceuil')
@section('main')

    <x-header/>

    @section('nav')

        <x-simpleNav/>

    @endsection

    @section('main-content')
        <div class="flex h-full justify-center items-center">
            <div class="lg:w-2/5 w-4/5 h-2/5 rounded shadow-lg flex flex-col gap-y-3">
                <div class="h-10 w-full">
                    <h1 class="text-center pt-1">Bienvenue</h1>
                </div>
                <form action="{{ url('/loginToAccount') }}" method="POST" class="flex-1 flex flex-col gap-y-2 justify-center px-2">
                    @csrf
                    <input type="text" name="email" placeholder="Saisir votre email..." class="in-put">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    <input type="password" name="password" placeholder="Saisir votre mot de passe..." class="in-put">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    <div class="w-full flex justify-evenly">
                        <button class="rounded-lg  py-2 px-4 shadow">Se connecter</button>
                    </div>

                </form>
            </div>
        </div>
    @endsection
@endsection