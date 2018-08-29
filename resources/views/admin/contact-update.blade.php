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
    	<a href="{{ route('admin.contacts') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Contacts</a>
    </p>
    <div class="card card-primary">
        <div class="card-header">
            <div class="header-block">
                <p class="title"> Update Contact </p>
            </div>
        </div>
        <div class="card-block">
        	<div class="row">
        		<div class="col-md-6">
        			@include('includes.all')
		            <form id="signup-form" action="{{ route('admin.update.contact.post') }}" method="POST" role="form" autocomplete="off">
		            	{{ csrf_field() }}
		            	<input type="hidden" name="contact_id" value="{{ $contact->id }}">
		                <div class="form-group">
		                    <label for="name">Name</label>
		                    <input type="text" class="form-control underlined" name="name" id="name" value="{{ ucwords($contact->name) }}" placeholder="Enter Name">  
		                </div>
		                <div class="form-group">
		                    <label for="mobile_number">Mobile Number</label>
		                    <input type="text" name="mobile_number" id="mobile_number" class="form-control underlined" value="{{ $contact->mobile_number }}" placeholder="Enter mobile number">
		                </div>
		                <div class="form-group">
		                	<label for="sending_group">Sending Group</label>
		                	<select class="form-control underlined" name="sending_group" id="sending_group">
		                		<option value="">Select Sending Group</option>
		                		<option value="">No Sending Group</option>
		                		@if(count($sg) > 0)
								@foreach($sg as $s)
								<option value="{{ $s->id }}" {{ $contact->sending_group_id == $s->id ? 'selected' : '' }}>{{ strtoupper($s->name) }}</option>
								@endforeach
		                		@else
					
		                		@endif
		                	</select>
		                </div>
		                <div class="form-group">
		                	<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Update Contact</button>
		                </div>
		            </form>
		        </div>
		    </div>
        </div>
    </div>
</section>
@endsection