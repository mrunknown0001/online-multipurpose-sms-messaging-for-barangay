@extends('layouts.app')

@section('title')
Activity Logs
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
	<div class="row">
		<div class="col-md-12">
			@if(count($logs) > 0)
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th class="text-center">User</th>
						<th class="text-center">Activity</th>
						<th class="text-center">Date</th>
					</tr>
				</thead>
				<tbody>
					@foreach($logs as $l)
					<tr>
						<td>{{ ucwords($l->user->firstname . ' ' . $l->user->lastname) }} [{{ strtoupper($l->user->privilege->name) }}]</td>
						<td class="text-center">{{ $l->action }}</td>
						<td>{{ date('l, F j, Y g:i:s a', strtotime($l->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $logs->links() }}
			@else
			<p class="text-center">No Logs Found!</p>
			@endif
		</div>
	</div>
</section>
@endsection