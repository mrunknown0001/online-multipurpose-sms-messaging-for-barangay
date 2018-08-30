@extends('layouts.app')

@section('title')
Settings
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
	
    <div class="card card-primary">
        <div class="card-header">
            <div class="header-block">
                <p class="title"> Settings </p>
            </div>
        </div>
        <div class="card-block">

			<div class="row">
				<div class="col-md-12">
					@include('includes.all')

					<form action="{{ route('admin.settings.post') }}" method="POST" autocomplete="off">
						{{ csrf_field() }}
						<div class="form-group">
							<label>Application Name</label>
							<input type="text" name="application_name" class="form-control underlined" value="{{ $setting->app_name }}" placeholder="Enter Application Name">
						</div>
						<div class="form-group">
							<label>Barangay Name</label>
							<input type="text" name="barangay_name" id="barangay_name" class="form-control underlined" value="{{ $setting->barangay_name }}">
						</div>
						<div class="form-group">
							<button class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save Settings</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection