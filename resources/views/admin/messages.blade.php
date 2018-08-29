@extends('layouts.app')

@section('title')
Messages
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
	<p>
		<a href="#" class="btn btn-primary"><i class="fa fa-send"></i> Single Send</a>
		<a href="#" class="btn btn-primary"><i class="fa fa-send"></i> Send By Group</a>
	</p>

	
</section>
@endsection