@extends('layouts.app')

@section('title')
Sending Groups
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
	<p>
		<a href="{{ route('admin.sending.group.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Sending Group</a>

		@if(count($sg) > 0)
			@include('includes.all')
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th class="text-center">Name</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($sg as $s)
						<tr>
							<td class="text-center">{{ strtoupper($s->name) }}</td>
							<td class="text-center">
								<a href="{{ route('admin.sending.group.update', ['id' => $s->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Update</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
		<p class="text-center">No Sending Group Found!</p>
		@endif
	</p>
</section>
@endsection