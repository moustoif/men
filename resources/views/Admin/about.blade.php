@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Mes informations')
@section('nav')
        <x-adminNav/>
    @endsection

    @section('main-content')
        <div class="w-full h-full flex flex-col">
            <div class="h-10 w-full flex justify-around items-center font-extrabold">
                <a href="{{ url('admin/mes-demandes') }}" class="border-b-2 border-dotted text-indigo-300 hover:text-indigo-500 hidden lg:block">Mes demandes</a>
                <a href="{{ url('admin/mon-profil/mis-à-jour') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">Mèttre à jour</a>
                <h1 class="">Bienvenue {{ $moi->nom }} {{ $moi->prenom }}</h1>
            </div>

            <div class="flex-1 flex justify-center gap-x-5">
                <div class="h-full lg:w-2/6 w-4/6 gap-y-4 flex flex-col justify-around p-1 overflow-auto">
                    <div class="w-full">
                        <h3 class="font-extrabold text-center">Mes informations</h3>
                    </div>

                    <div class="w-full flex gap-x-3 items-baseline">
                        <h3 class="font-extrabold">Nom: </h3>
                        <h4 class="">{{ $moi->nom }}</h4>
                    </div>

                    <div class="w-full flex gap-x-3 items-baseline">
                        <h3 class="font-extrabold">Prénom: </h3>
                        <h4 class="">{{ $moi->prenom }}</h4>
                    </div>

                    <div class="w-full flex gap-x-3 items-baseline">
                        <h3 class="font-extrabold">Matricule: </h3>
                        <h4 class="">{{ $moi->matricule }}<h4>
                    </div>

                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Carte d'Identité Nationale: </h3>
                        <h4 class="">{{ $moi->cin }}</h4>
                    </div>

                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Adresse: </h3>
                        <h4 class="">{{ $moi->adresse }}</h4>
                    </div>

                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Téléphone: </h3>
                        <h4 class="">{{ $moi->telephone }}</h4>
                    </div>
                    
                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Email: </h3>
                        <h4 class="">{{ $moi->email }}</h4>
                    </div>
                    
                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Poste: </h3>
                        <h4 class="">{{ $moi->poste }}</h4>
                    </div>

                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Service: </h3>
                        <h4 class="">{{ $moi->abrev_service }}</h4>
                    </div>

                    <div class="w-full flex gap-x-3">
                        <h3 class="font-extrabold">Direction: </h3>
                        <h4 class="">{{ $moi->abrev_direction }}</h4>
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endsection