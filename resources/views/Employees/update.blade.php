@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Mis à jour')
@section('nav')
        <x-employeeNav/>
    @endsection

    @section('main-content')
        <div class="w-full h-full flex flex-col p-5">
            <div class="border-b border-slate-700 h-10 flex justify-around">
                <a href="{{ url('personnel/acceuil') }}" class="inline-block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
                <h1 class="text-xl font-extrabold text-center hidden lg:block">Mèttre à jour mon profil</h1>
            </div>

            <form action="{{ url('/updateMyProfile') }}" method="POST" class="flex-1 pt-1 flex flex-col items-center justify-around">
                @csrf
                <input type="hidden" name="default_matricule" class="in-put" value="{{ $moi->matricule }}">
                <input type="text" name="nom" placeholder="Nom..." class="in-put" value="{{ $moi->nom }}">
                <input type="text" name="prenom" placeholder="Prénom..." class="in-put" value="{{ $moi->prenom }}">
                <input type="text" name="cin" placeholder="Carte d'identité nationale..." class="in-put" value="{{ $moi->cin }}">
                <input type="text" name="telephone" placeholder="Téléphone..." class="in-put" value="{{ $moi->telephone }}">
                <input type="text" name="adresse" placeholder="Adresse..." class="in-put" value="{{ $moi->adresse }}">
                <input type="text" name="poste" placeholder="Poste occupé..." class="in-put" value="{{ $moi->poste }}">
                <select name="direction" class="in-put">
                    <option selected value="{{ $moi->code_direction }}">{{ $moi->abrev_direction }}</option>
                    @foreach ($direction as $direction)
                        <option value="{{ $direction->code_direction }}">{{ $direction->abrev_direction }}</option>
                    @endforeach
                </select>
                
                <select name="service" class="in-put">
                    <option selected value="{{ $moi->code_service }}">{{ $moi->abrev_service }}</option>
                    @foreach ($service as $service)
                        <option value="{{ $service->code_service }}">{{ $service->abrev_service }}</option>
                    @endforeach
                </select>

                <input type="email" name="email" placeholder="Email..." class="in-put" value="{{ $moi->email }}">
                <div class="w-2/4 flex justify-around m-2">
                    <button class="rounded-lg  py-2 px-3 shadow" type="submit">OK</button>
                    <button class="rounded-lg  py-2 px-3 shadow" type="reset">Annuler</button>                
                </div>
            </form>
        </div>
    @endsection