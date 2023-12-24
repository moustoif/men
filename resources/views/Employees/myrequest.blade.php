@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Mes demandes')
@section('nav')
        <x-employeeNav/>
    @endsection

    @section('main-content')
    <div class="w-full h-full flex flex-col">
        <div class="h-20 w-full flex justify-around items-center font-extrabold">
            <a href="{{ url('personnel/acceuil') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
            <form action="{{ url('/add-new-count') }}" method="POST" class="" title="Ajouter le décompte pour l'année">
                @csrf
                <fieldset class="flex gap-x-3 pt-1">
                    <legend>Renouveller mon congé</legend>
                    <select name="annee" class="in-put" title="Ajouter le décompte pour l'année">
                        <option selected disabled>Choisir l'année</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option> 
                        <option value="2025">2025</option> 
                        <option value="2026">2026</option> 
                        <option value="2027">2027</option> 
                        <option value="2028">2028</option> 
                        <option value="2029">2029</option> 
                        <option value="2030">2030</option>  
                        <option value="2031">2031</option>  
                        <option value="2032">2032</option>  
                        <option value="2033">2033</option>  
                    </select>
                    <button class="rounded-lg py-2 px-3 shadow" type="submit">+</button>
                </fieldset>              
                @error('annee') <span class="text-red-500 text-xs">{{ $message }}</span>@enderror
            </form>
            <h1 class="">Bienvenue {{ $moi->nom }} {{ $moi->prenom }}</h1>
        </div>

        <div class="flex-1 flex justify-center gap-x-5">
            <div class="h-full w-4/6 gap-y-4 flex flex-col justify-around p-1 overflow-auto">
                <div class="w-full h-10">
                    <h3 class="font-extrabold text-center">Mes demandes</h3>
                </div>

                <div class="flex-1">
                    <table class="w-full shadow">
                        <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center text-slate-700">
                            <th class="table-th">Dt demande</th>
                            <th class="table-th">Début</th>
                            <th class="table-th">Fin</th>
                            <th class="table-th">Jours</th>
                            <th class="table-th">Type</th>
                            <th class="table-th">Statut</th>
                        </thead>
                        <tbody>
                            @foreach ($abscence as $abscence)
                                <tr>
                                    <td class="table-td">{{ $abscence->date_demande }}</td>
                                    <td class="table-td">{{ $abscence->debut }}</td>
                                    <td class="table-td">{{ $abscence->fin }}</td>
                                    <td class="table-td">{{ $abscence->nb_jours }}</td>
                                    <td class="table-td">{{ $abscence->type }}</td>
                                    <td class="table-td">{{ $abscence->statut }}</td>
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