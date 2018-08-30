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
	<div class="row">
		<div class="col-md-12">
			@include('includes.all')
			@if(count($messages) > 0)
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th class="text-center">Recipient</th>
						<th class="text-center">Message</th>
						<th class="text-center">Sent Count</th>
						<th class="text-center">Date &amp; Time</th>
					</tr>
				</thead>
				<tbody>
					@foreach($messages as $m)
					<tr>
						<td class="text-center">{{ strtoupper($m->recipient) }}</td>
						<td class="text-center">{{ $m->message }}</td>
						<td class="text-center">{{ $m->count }}</td>
						<td class="text-center">{{ date('l, F j, Y g:i:s a', strtotime($m->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p class="text-center">No Message Sent!</p>
			@endif
		</div>
	</div>

</section>
@endsection