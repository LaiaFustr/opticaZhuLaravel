@php 
    if (!session()->has('opticaColor') && !auth()->check()){
        session(['opticaColor' => "puertocognac"]);
    }
    if (!session()->has('idOptica')){
        session(['idOptica' => 1]);
    }
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/bootstrap.min.css') }}">
<script language="javascript" type="text/javascript" src="{{asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('Font-Awesome/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('css/color'. session('opticaColor') . '.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}"> 
<link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}"> -->

<style>
@tailwind base;
@tailwind components;
@tailwind utilities;


</style>