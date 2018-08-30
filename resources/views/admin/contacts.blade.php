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
	</p>
	@if(count($contacts) > 0)
	<div class="row">
		<div class="col-md-12">
			@include('includes.all')
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
						<td>
							{{ ucwords($c->name) }}
							<a href="javascript:void(0)" class="" data-toggle="modal" data-target="#sendMessage-{{ $c->id }}"><i class="fa fa-envelope-o"></i></a>
						</td>
						<td class="text-center">
							{{ $c->mobile_number }} <small>{{ $c->network ? strtoupper($c->network) : '' }}</small> 
						</td>
						<td class="text-center">
							{{ $c->sending_group_id ? strtoupper($c->sg->name) : 'N/A' }}
						</td>
						<td class="text-center">
							<a href="{{ route('admin.update.contact', ['id' => $c->id ]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Update</a>
							<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#contactDelete-{{ $c->id }}"><i class="fa fa-trash"></i> Delete</button>
						</td>
					</tr>
					@include('admin.includes.modal-contact-single-send')
					@include('admin.includes.modal-contact-delete')
					@endforeach
				</tbody>
			</table>
			<p class="text-center">{{ $contacts->links() }}</p>
		</div>
	</div>
	@else
	<p class="text-center">No Contacts! Please Add Contact</p>
	@endif
</section>
@endsection