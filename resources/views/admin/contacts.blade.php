@extends('layouts.app')

@section('title')
Contacts
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
	<p>
		<a href="{{ route('admin.add.contact') }}" class="btn btn-primary">
			<i class="fa fa-plus"></i> Add Contact
		</a>
		<a href="#" class="btn btn-primary">
			<i class="fa fa-users"></i> Manage Sending Groups
		</a>
	</p>
	@if(count($contacts) > 0)
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th class="text-center">Name</th>
						<th class="text-center">Mobile Number</th>
						<th class="text-center">Sending Group</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($contacts as $c)
					<tr>
						<td>{{ ucwords($c->name) }}</td>
						<td class="text-center">{{ $c->mobile_number }}</td>
						<td class="text-center"></td>
						<td class="text-center"></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	@else
	<p class="text-center">No Contacts! Please Add Contact</p>
	@endif
</section>
@endsection