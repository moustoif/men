@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('title', 'Ses demandes')
    @section('nav')
    @endsection

    @section('main-content')
        <div class="w-full h-full justify-center p-3 lg:p-5 flex flex-col gap-y-2">
            <div class="w-full h-10 flex items-center justify-center">
                <a href="{{ url("admin/personnel/listes") }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Acceuil</a>
            </div>
            <div class="flex-1 overflow-x-auto shadow-md">
                <table class="w-full">
                    <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center text-slate-700">
                        <th class="table-th">Dt demande</th>
                        <th class="table-th">Début</th>
                        <th class="table-th">Fin</th>
                        <th class="table-th">Type</th>
                        <th class="table-th">Motif</th>
                        <th class="table-th">Statut</th>
                    </thead>
                    <tbody>
                        @foreach ($mesDemandes as $demande)
                            <tr>
                                <td class="table-td">{{ $demande->date_demande }}</td>
                                <td class="table-td">{{ $demande->debut }}</td>
                                <td class="table-td">{{ $demande->fin }}</td>
                                <td class="table-td">{{ $demande->type }}</td>
                                <td class="table-td">{{ $demande->motif }}</td>
                                <td class="table-td">{{ $demande->statut }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection