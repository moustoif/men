@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Faire des requêtes')
@section('nav')
        <x-adminNav/>
    @endsection

    @section('main-content')
        <div class="w-full h-full flex flex-col">
            <div class="h-10 w-full flex justify-around items-center font-extrabold">
                <h1 class="">Bienvenue {{ $moi->nom }} {{ $moi->prenom }}</h1>
            </div>

            <div class="flex-1 flex flex-row justify-center gap-x-5">
                <div class="h-full w-3/6 gap-y-4 flex flex-col justify-around p-1 overflow-auto">
                    <div class="border-b border-slate-700 h-10">
                        <h1 class="text-xl font-extrabold text-center">Congé et absence</h1>
                    </div>
        
                    <form action="{{ url('/new-request') }}" method="POST" class="flex-1 pt-1 flex flex-col justify-center items-center gap-y-4">
                        @csrf
                        <div class="w-full">
                            @if (session()->has('p_depasse'))
                                <p class="text-center text-xs text-slate-300">{{ session('p_depasse') }}</p>   

                            @elseif (session()->has('zero'))
                                <p class="text-center text-xs text-slate-300">{{ session('zero') }}</p>   

                            @elseif (session()->has('p_success'))   
                                <p class="text-center text-xs text-slate-300">{{ session('p_success') }}</p> 

                            @elseif (session()->has('p_echec')) 
                                <p class="text-center text-xs text-slate-300">{{ session('p_echec') }}</p>

                            @elseif (session()->has('ca_depasse'))  
                                <p class="text-center text-xs text-slate-300">{{ session('ca_depasse') }}</p> 

                            @elseif (session()->has('ca_success')) 
                                <p class="text-center text-xs text-slate-300">{{ session('ca_success') }}</p> 

                            @elseif (session()->has('ca_echec'))   
                                <p class="text-center text-xs text-slate-300">{{ session('ca_echec') }}</p> 

                            @elseif (session()->has('cm_success')) 
                                <p class="text-center text-xs text-slate-300">{{ session('cm_success') }}</p>

                            @elseif (session()->has('cp_depasse')) 
                                <p class="text-center text-xs text-slate-300">{{ session('cp_depasse') }}</p>

                            @elseif (session()->has('cp_success')) 
                                <p class="text-center text-xs text-slate-300">{{ session('cp_success') }}</p>   

                            @elseif (session()->has('cp_echec')) 
                                <p class="text-center text-xs text-slate-300">{{ session('cp_echec') }}</p>
                            
                            @elseif (session()->has('depasse')) 
                                <p class="text-center text-xs text-slate-300">{{ session('depasse') }}</p>

                            @elseif (session()->has('success')) 
                                <p class="text-center text-xs text-slate-300">{{ session('success') }}</p>

                            @elseif (session()->has('echec')) 
                                <p class="text-center text-xs text-slate-300">{{ session('echec') }}</p>

                            @endif
                        </div>
                        <div class="w-full">
                            <label for="debut">Début demande</label>
                            <input type="date" name="debut" autofocus placeholder="Début..." value="" id="debut" class="in-put">
                            @error('debut') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="w-full">
                            <label for="fin" class="">Fin demande</label>
                            <input type="date" name="fin" placeholder="Fin..." id="fin" value="" class="in-put">
                            @error('fin')<span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <label for="type" class="">Fin demande</label>
                            <select name="type" id="" class="in-put" id="type" placeholder="Direction...">
                                <option selected disabled>Type d'abscence</option>
                                <option value="Persmission">Persmission</option>
                                <option value="Congé annuel">Congé annuel</option>
                                <option value="Congé de maternité">Congé de maternité</option>
                                <option value="Autorisation d'abscence">Autorisation d'abscence</option>
                                <option value="Congé de paternité">Congé de paternité</option>
                            </select>
                            @error('type') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <label for="annee" class="">Fin demande</label>
                            <select name="annee" id="annee" class="in-put" title="Ajouter le décompte pour l'année">
                                <option selected disabled>Choisir l'année</option>
                                @foreach ($annee as $annee)
                                    <option value="{{ $annee->annee }}">{{ $annee->annee }}</option>  
                                @endforeach
                            </select>
                            @error('annee') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="w-full">
                            <label for="motif">Motif</label>
                            <input type="text" name="motif" class="in-put" id="motif" placeholder="Motif...">
                            @error('motif') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="w-full flex justify-around m-2">
                            <button class="rounded-lg  py-2 px-3 shadow" type="submit">Ajouter</button>
                            <button class="rounded-lg  py-2 px-3 shadow" type="reset">Annuler</button>                
                        </div>
                    </form>
                </div>

                <div class="h-full w-3/6 gap-y-4 flex flex-col justify-around p-1 overflow-auto">
                    <div class="border-b border-slate-700 h-10">
                        <h1 class="text-xl font-extrabold text-center">Mes decomptes congés</h1>
                    </div>

                    <div class="flex-1">
                        <table class="w-full">
                            <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center text-slate-700">
                                <th class="table-th">Année</th>
                                <th class="table-th">Reste</th>
                                <th class="table-th"></th>
                            </thead>
                            <tbody>
                                @foreach ($mesDecompte as $decompte)
                                    <tr>
                                        <td class="table-td">{{ $decompte->annee }}</td>
                                        <td class="table-td">{{ $decompte->nb_jours }}</td>
                                        <td class="table-td">
                                            <a href="">
                                                <svg class="hover:fill-indigo-400 h-5 w-5 hover:cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.552c.377.046.752.097 1.126.153A2.212 2.212 0 0118 8.653v4.097A2.25 2.25 0 0115.75 15h-.241l.305 1.984A1.75 1.75 0 0114.084 19H5.915a1.75 1.75 0 01-1.73-2.016L4.492 15H4.25A2.25 2.25 0 012 12.75V8.653c0-1.082.775-2.034 1.874-2.198.374-.056.75-.107 1.127-.153L5 6.25v-3.5zm8.5 3.397a41.533 41.533 0 00-7 0V2.75a.25.25 0 01.25-.25h6.5a.25.25 0 01.25.25v3.397zM6.608 12.5a.25.25 0 00-.247.212l-.693 4.5a.25.25 0 00.247.288h8.17a.25.25 0 00.246-.288l-.692-4.5a.25.25 0 00-.247-.212H6.608z"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endsection