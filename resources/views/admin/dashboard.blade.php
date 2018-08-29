@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
	<div class="row">
		<div class="col-md-12">
            <div class="card sameheight-item stats" data-exclude="xs">
                <div class="card-block">
                    <div class="title-block">
                        <strong>Summary Data</strong>
                    </div>
                    <div class="row row-sm stats-container">
                        <div class="col-12 col-sm-6 stat-col">
                            <div class="stat-icon">
                                <i class="fa fa-address-book"></i>
                            </div>
                            <div class="stat">
                                <div class="value"> {{ count($contacts) }} </div>
                                <div class="name"> Contacts </div>
                            </div>
                            <div class="progress stat-progress">
                                <!-- <div class="progress-bar" style="width: 75%;"></div> -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 stat-col">
                            <div class="stat-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="stat">
                                <div class="value">  </div>
                                <div class="name"> Sending Groups </div>
                            </div>
                            <div class="progress stat-progress">
                                <!-- <div class="progress-bar" style="width: 25%;"></div> -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6  stat-col">
                            <div class="stat-icon">
                                <i class="fa fa-line-chart"></i>
                            </div>
                            <div class="stat">
                                <div class="value">  </div>
                                <div class="name"> Monthly Counter </div>
                            </div>
                            <div class="progress stat-progress">
                                <!-- <div class="progress-bar" style="width: 60%;"></div> -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 stat-col">
                            <div class="stat-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="stat">
                                <div class="value">  </div>
                                <div class="name"> Total Sent Messages </div>
                            </div>
                            <div class="progress stat-progress">
                                <!-- <div class="progress-bar" style="width: 15%;"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>
@endsection