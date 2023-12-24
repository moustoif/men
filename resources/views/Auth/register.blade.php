@extends('layouts.second-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'S\'enregister')
@section('main')
    <x-header/>
    @section('nav')
        <x-simpleNav/>
    @endsection

    @section('main-content')
        <div class="flex flex-col h-full justify-center items-center">
            <div class="w-full lg:w-4/6 h-5">
                @if (session()->has('success'))
                    <span class="text-green-400 text-sm">{{ session('success') }}</span>
                @endif
            </div>
            <div class="lg:w-4/6 w-full h-4/5 shadow-2xl flex flex-col gap-y-1 overflow-auto">
                <div class="h-10 w-full">
                    <h1 class="text-center pt-1">Bienvenue</h1>
                </div>
                <form action="{{ url('/createAccount') }}" method="POST" class="register-form">
                    @csrf
                <div class="div-register-form">
                    <div class="flex flex-col w-full">
                        <input type="text" name="matricule" autofocus placeholder="Matricule..." class="in-put"><br>
                        @error('matricule') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                     
                    <div class="flex flex-col w-full">
                        <input type="text" name="nom" placeholder="Nom..." class="in-put">
                        @error('nom') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                    
                </div>
                
                <div class="div-register-form">
                    <div class="flex flex-col w-full">
                        <input type="text" name="prenom" placeholder="Prénom..." class="in-put">
                        @error('prenom') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <input type="text" name="cin" placeholder="Carte d'identité nationale..." class="in-put">
                        @error('cin') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="div-register-form">
                    <div class="flex flex-col w-full">
                        <input type="text" name="telephone" placeholder="Téléphone..." class="in-put">
                        @error('telephone') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex flex-col w-full">
                        <input type="text" name="adresse" placeholder="Adresse..." class="in-put">
                        @error('adresse') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="div-register-form">
                    <div class="flex flex-col w-full">
                        <input type="text" name="poste" placeholder="Poste occupé..." class="in-put">
                        @error('poste') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="flex flex-col w-full">
                        <select name="direction" class="in-put">
                            <option selected disabled>Choisir votre direction</option>
                            @foreach ($direction as $direction)
                                <option value="{{ $direction->code_direction }}">{{ $direction->abrev_direction }}</option>
                            @endforeach
                        </select>
                        @error('direction') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                    
                </div>

                <div class="div-register-form">
                    <div class="flex flex-col w-full">
                        <select name="service" class="in-put">
                            <option selected disabled value="">Choisir votre service</option>
                            @foreach ($service as $service)
                                <option value="{{ $service->code_service }}">{{ $service->abrev_service }}</option>
                            @endforeach
                        </select>
                        @error('service') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                    
                    <div class="w-full flex flex-col">
                        <input type="email" name="email" placeholder="Email..." class="in-put">
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="div-register-form">
                    <div class="w-full flex flex-col">
                        <input type="password" name="password" placeholder="Mot de passe..." class="in-put">
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="w-full flex justify-around m-2">
                    <button class="rounded-lg  py-2 px-3 shadow" type="submit">Postuler</button>
                    <button class="rounded-lg  py-2 px-3 shadow" type="reset">Annuler</button>                
                </div>

                </form>
            </div>
        </div>
    @endsection
@endsection