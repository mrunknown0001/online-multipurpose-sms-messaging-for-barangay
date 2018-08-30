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
		<a href="{{ route('admin.send.group.message') }}" class="btn btn-primary"><i class="fa fa-send"></i> Send Group Message</a>
	</p>

</section>
@endsection