@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('title', 'Personnels actifs | MEN')
    @section('nav')
    @endsection

    @section('main-content')
        <div class="w-full h-full justify-center p-3 lg:p-5 flex flex-col gap-y-2">
            <div class="w-full h-10 flex items-center justify-around">
                <a href="{{ url('admin/acceuil') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
                <h2 class="text-center font-extrabold mb-1">Actifs</h2>
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
                    </thead>
                    <tbody>
                        @foreach ($pActif as $actif)
                            <tr>
                                <td class="table-td">{{ $actif->matricule }}</td>
                                <td class="table-td">{{ $actif->nom }}</td>
                                <td class="table-td">{{ $actif->prenom }}</td>
                                <td class="table-td">{{ $actif->email }}</td>
                                <td class="table-td">{{ $actif->telephone }}</td>
                                <td class="table-td">{{ $actif->adresse }}</td>
                                <td class="table-td">{{ $actif->poste }}</td>
                                <td class="table-td">{{ $actif->abrev_service }}</td>
                                <td class="table-td">{{ $actif->abrev_direction }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection