@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('title', 'Personnels non actifs | MEN')
    @section('nav')
    @endsection

    @section('main-content')
        <div class="w-full h-full justify-center p-3 lg:p-5 flex flex-col gap-y-2">
            <div class="w-full h-10 flex items-center justify-around">
                <a href="{{ url('admin/acceuil') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
                <h2 class="text-center font-extrabold mb-1">Non actifs</h2>
            </div>
            <div class="flex-1 overflow-x-auto shadow-md">
                <table class="w-full">
                    <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center text-slate-700">
                        <th class="table-th">Matricule</th>
                        <th class="table-th">Nom</th>
                        <th class="table-th">Prénom</th>
                        <th class="table-th">Email</th>
                        <th class="table-th">Adresse</th>
                        <th class="table-th">Téléphone</th>
                        <th class="table-th">Poste</th>
                        <th class="table-th">Service</th>
                        <th class="table-th">Direction</th>
                        <th class="tbale-th"></th>
                    </thead>
                    <tbody>
                        @foreach ($pEnAttente as $enAttente)
                            <tr>
                                <td class="table-td">{{ $enAttente->matricule }}</td>
                                <td class="table-td">{{ $enAttente->nom }}</td>
                                <td class="table-td">{{ $enAttente->prenom }}</td>
                                <td class="table-td">{{ $enAttente->email }}</td>
                                <td class="table-td">{{ $enAttente->adresse }}</td>
                                <td class="table-td">{{ $enAttente->telephone }}</td>
                                <td class="table-td">{{ $enAttente->poste }}</td>
                                <td class="table-td">{{ $enAttente->abrev_service }}</td>
                                <td class="table-td">{{ $enAttente->abrev_direction }}</td>
                                <td class="table-td">
                                    <button title="Accepter" class="">
                                        <a href="{{ url('valider/'.$enAttente->matricule) }}">
                                            <svg class="h-5 w-5 hover:stroke-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </a>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection