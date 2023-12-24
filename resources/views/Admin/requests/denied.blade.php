@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('title', 'Demandes refusées | MEN')
    @section('nav')
    @endsection

    @section('main-content')
        <div class="w-full h-full justify-center p-3 lg:p-5 flex flex-col gap-y-2">
            <div class="w-full h-10 flex items-center justify-around">
                <a href="{{ url('admin/acceuil') }}" class="border-b-2 border-dotted block text-indigo-300 hover:text-indigo-500">&lAarr; Revenir</a>
                <h2 class="text-center font-extrabold mb-1">Refusées</h2>
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
                    </thead>
                    <tbody>
                        @foreach ($refusees as $refusee)
                            <tr>
                                <td class="table-td">{{ $refusee->matricule }}</td>
                                <td class="table-td">{{ $refusee->date_demande }}</td>
                                <td class="table-td">{{ $refusee->debut }}</td>
                                <td class="table-td">{{ $refusee->fin }}</td>
                                <td class="table-td">{{ $refusee->type }}</td>
                                <td class="table-td">{{ $refusee->motif }}</td>
                                <td class="table-td">{{ $refusee->statut }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection