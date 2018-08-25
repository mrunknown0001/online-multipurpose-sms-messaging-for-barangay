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
						<td>{{ $l->user_id }}</td>
						<td>{{ $l->action }}</td>
						<td>{{ $l->created_at }}</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot></tfoot>
			</table>
			@else
			<p class="text-center">No Logs Found!</p>
			@endif
		</div>
	</div>
</section>
@endsection