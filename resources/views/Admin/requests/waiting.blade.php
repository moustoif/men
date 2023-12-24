@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('title', 'Demande en attente | MEN')
    @section('nav')
    @endsection

    @section('main-content')
        <div class="w-full h-full justify-center p-3 lg:p-5 flex flex-col gap-y-2">
            <div class="w-full h-10 flex items-center justify-around">
                <a href="{{ url('admin/acceuil') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
                <h2 class="text-center font-extrabold mb-1">En attente</h2>
            </div>
            <div class="flex-1 overflow-x-auto shadow-md">
                <table class="w-full">
                    <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center text-slate-700">
                        <th class="table-th">Matricule</th>
                        <th class="table-th">Dt demande</th>
                        <th class="table-th">Début</th>
                        <th class="table-th">Fin</th>
                        <th class="table-th">Type</th>
                        <th class="table-th">Motif</th>
                        <th class="table-th">Statut</th>
                        <th class="table-th"></th>
                        <th class="table-th"></th>
                    </thead>
                    <tbody>
                        @foreach ($enAttente as $enAttente)
                            <tr>
                                <td class="table-td">{{ $enAttente->matricule }}</td>
                                <td class="table-td">{{ $enAttente->date_demande }}</td>
                                <td class="table-td">{{ $enAttente->debut }}</td>
                                <td class="table-td">{{ $enAttente->fin }}</td>
                                <td class="table-td">{{ $enAttente->type }}</td>
                                <td class="table-td">{{ $enAttente->motif }}</td>
                                <td class="table-td">{{ $enAttente->statut }}</td>
                                <td class="table-td text-center">
                                    <button title="Accepter" class="">
                                        <a href="{{ url("/$enAttente->matricule/Approuvez/$enAttente->id_conge/$enAttente->annee_abs") }}">
                                            <svg class="h-5 w-5 hover:stroke-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                        </a>
                                    </button>
                                </td>

                                <td class="table-td text-center">
                                    <button title="Refuser" class="">
                                        <a href="{{ url("rejetez/$enAttente->id_conge") }}">
                                            <svg class="h-5 w-5 hover:stroke-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
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