@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Email')
@section('nav')
        <x-adminNav/>
    @endsection

    @section('main-content')
        <div class="w-full h-full flex flex-row justify-center">
            <div class="lg:w-3/6 w-full h-full flex flex-col">
                <div class="w-full h-10 border-b border-b-black">
                    <h1 class="text-center font-extrabold pt-1">Envoi des emails</h1>
                </div>
                <div class="flex-1">
                    <form action="{{ url('/sendMail') }}" method="POST" class="flex flex-col gap-y-3">
                        @csrf
                        <div class="w-full flex flex-col">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" placeholder="Nom..." value="" id="nom" class="in-put" autofocus>
                            @error('nom')
                                <span class="text-red-400 mb-3">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="w-full flex flex-col">
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email de l'expéditeur..." id="email" value="" class="in-put">
                            @error('email')
                                <span class="text-red-400 mb-3">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full flex flex-col">
                            <label for="sujet">Sujet</label>
                            <input type="text" name="sujet" placeholder="Sujet..." value="" id="sujet" class="in-put">
                            @error('sujet')
                                <span class="text-red-400 mb-3">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full">
                            <textarea name="message" id="message" cols="60" rows="5" placeholder="Votre message" class="in-put">

                            </textarea>
                        </div>

                        <div class="w-full flex justify-around m-2 mt-3">
                            <button class="rounded-lg  py-2 px-3 shadow" type="submit">Envoyer</button>
                            <button class="rounded-lg  py-2 px-3 shadow" type="reset">Annuler</button>                
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endsection