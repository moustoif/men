@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('title', 'Total personnels | MEN')
    @section('nav')
    @endsection

    @section('main-content')
        <div class="w-full h-full justify-center p-3 lg:p-5 flex flex-col gap-y-2">
            <div class="w-full h-10 flex items-center justify-around">
                <a href="{{ url('admin/acceuil') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
                
                <h2 class="text-center font-extrabold mb-1">Liste</h2>
            </div>
            <div class="flex-1 overflow-x-auto shadow-md">
                <table class="w-full">
                    <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center">
                        <th class="table-th">Matricule</th>
                        <th class="table-th">CIN</th>
                        <th class="table-th">Nom</th>
                        <th class="table-th">Prénom</th>
                        <th class="table-th">Email</th>
                        <th class="table-th">Adresse</th>
                        <th class="table-th">Téléphone</th>
                        <th class="table-th">Poste</th>
                        <th class="table-th">Service</th>
                        <th class="table-th">Direction</th>
                        <th class="table-th">Etat</th>
                        <th class="table-th"></th>
                    </thead>
                    <tbody>
                        @foreach ($personnels as $personnel)
                                <tr class="hover:bg-indigo-300">
                                    <td class="">{{ $personnel->matricule }}</td>
                                    <td class="table-td">{{ $personnel->cin }}</td>
                                    <td class="table-td">{{ $personnel->nom }}</td>
                                    <td class="table-td">{{ $personnel->prenom }}</td>
                                    <td class="table-td">{{ $personnel->email }}</td>
                                    <td class="table-td">{{ $personnel->adresse }}</td>
                                    <td class="table-td">{{ $personnel->telephone }}</td>
                                    <td class="table-td">{{ $personnel->poste }}</td>
                                    <td class="table-td">{{ $personnel->abrev_direction }}</td>
                                    <td class="table-td">{{ $personnel->abrev_service }}</td>
                                    <td class="table-td">{{ $personnel->etat }}</td>
                                    <td class="table-td text-center">
                                        <button title="Plus d'nformation">
                                            <a href="{{ url("/personnel/matricule={$personnel->matricule}/a-propos") }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hover:stroke-indigo-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
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