@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<p class="text-center">Dashboard</p>
@endsection