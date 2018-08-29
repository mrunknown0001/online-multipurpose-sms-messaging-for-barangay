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
                <p class="title"> Add Sending Group </p>
            </div>
        </div>
        <div class="card-block">
        	<div class="row">
        		<div class="col-md-6">
        			@include('includes.all')
		            <form id="signup-form" action="{{ route('admin.sending.group.add.post') }}" method="POST" role="form" autocomplete="off">
		            	{{ csrf_field() }}
		                <div class="form-group">
		                    <label for="name">Sending Group Name</label>
		                    <input type="text" class="form-control underlined" name="name" id="sending_group_name" placeholder="Enter Sending Group Name">  
		                </div>
		                <div class="form-group">
		                	<button class="btn btn-primary"><i class="fa fa-plus"></i> Add Sending Group</button>
		                </div>
		            </form>
		        </div>
		    </div>
        </div>
    </div>
</section>
@endsection