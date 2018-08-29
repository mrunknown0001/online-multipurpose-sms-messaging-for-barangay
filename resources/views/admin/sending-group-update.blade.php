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
    	<a href="{{ route('admin.sending.groups') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Sending Groups</a>
    </p>
    <div class="card card-primary">
        <div class="card-header">
            <div class="header-block">
                <p class="title"> Update Sending Group </p>
            </div>
        </div>
        <div class="card-block">
        	<div class="row">
        		<div class="col-md-6">
        			@include('includes.all')
		            <form id="signup-form" action="{{ route('admin.sending.group.update.post') }}" method="POST" role="form" autocomplete="off">
		            	{{ csrf_field() }}
                        <input type="hidden" name="sg_id" value="{{ $sg->id }}">
		                <div class="form-group">
		                    <label for="name">Sending Group Name</label>
		                    <input type="text" class="form-control underlined" name="name" id="sending_group_name" value="{{ strtoupper($sg->name) }}" placeholder="Enter Sending Group Name">  
		                </div>
		                <div class="form-group">
		                	<button class="btn btn-primary"><i class="fa fa-plus"></i> Update Sending Group</button>
		                </div>
		            </form>
		        </div>
		    </div>
        </div>
    </div>
</section>
@endsection