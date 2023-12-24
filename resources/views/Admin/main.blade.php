@extends('../layouts/first-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'Acceuil')
@section('nav')
        <x-adminNav/>
    @endsection

    @section('main-content')
        <div class="w-full h-full flex justify-center items-center">
            <table class="lg:w-3/6 w-full bg-indigo-200 rounded">
                <caption>A propos</caption>
                <thead class="w-full h-10 p-2 bg-indigo-100 shadow-md text-center text-slate-700">
                    <th class="table-thm">Personnels</th>
                    <th class="table-thm">Requêtes</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-tdm"><a href="{{ url('admin/personnel/listes') }}">Total: <span class="">{{ $tp }}</span></a></td>
                        <td class="table-tdm"><a href="{{ url('admin/demande/listes') }}">Total: <span class="">{{ $td }}</span></a></td>
                    </tr>

                    <tr>
                        <td class="table-tdm"><a href="{{ url('admin/personnel/abscents') }}">Abscents: <span class="">{{ $tpabs }}</span></a></td>
                        <td class="table-tdm"><a href="{{ url('admin/demande/acceptées') }}">Acceptées: <span class="">{{ $da }}</span></a></td>
                    </tr>

                    <tr>
                        <td class="table-tdm"><a href="{{ url('admin/personnel/presents') }}">Presents: <span class="">{{ $tpa }}</span></a></td>
                        <td class="table-tdm"><a href="{{ url('admin/demande/refusées') }}">Refusées: <span class="">{{ $dr }}</span></a></td>
                    </tr>


                    <tr>
                        <td class="table-tdm"><a href="{{ url('admin/personnel/en-congées') }}">En congés: <span class="">{{ $tpen }}</span></a></td>
                        <td class="table-tdm"><a href="{{ url('admin/demandes/en-attente') }}">En attente: <span class="">{{ $dea }}</span></a></td>
                    </tr>
                    <tr>
                        <td class="table-tdm"><a href="{{ url('admin/personnel/inactifs') }}">Inactifs: <span class="">{{ $tpi }}</span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection