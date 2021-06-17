@extends('template/docs')

@section('title', 'API | Documentation')

@section('content')
    <h2>Docs</h2>
    <ul>
        <li><a href="{{ url('/docs/login-logout') }}">Login/Logout</a></li>
        <li><a href="{{ url('/docs/store-data') }}">Store Data</a></li>
        <li><a href="{{ url('/docs/admin-data') }}">Admin Data</a></li>
        <li><a href="{{ url('/docs/category-data') }}">Category Data</a></li>
        <li><a href="{{ url('/docs/product-data') }}">Product Data</a></li>
    </ul>
@endsection