@extends('../layouts/pdf-layout')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" async></script>
@section('title', 'PDF')
    @section('main-content')
        <x-pdfPage/>
    @endsection