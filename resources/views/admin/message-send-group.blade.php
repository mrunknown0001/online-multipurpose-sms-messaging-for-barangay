@extends('layouts.app')

@section('title')
Messages
@endsection

@section('headside')
    @include('admin.includes.header')
    @include('admin.includes.side-menu')
@endsection

@section('content')
<section class="section">
    <p>
    	<a href="{{ route('admin.messages') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back to Messages</a>
    </p>
    <div class="card card-primary">
        <div class="card-header">
            <div class="header-block">
                <p class="title"> Send Group Message </p>
            </div>
        </div>
        <div class="card-block">
        	<div class="row">
        		<div class="col-md-6">
        			@include('includes.all')
		            <form id="signup-form" action="{{ route('admin.send.group.message.post') }}" method="POST" role="form" autocomplete="off">
		            	{{ csrf_field() }}
		                <div class="form-group">
		                    <label for="recipient">Sending Group Recipient</label>
		                    <select name="recipient" id="recipient" class="form-control underlined" required>
                                <option value="">Select Sending Group Recipient</option>
                                @if(count($groups) > 0)
                                    @foreach($groups as $g)
                                    <option value="{{ $g->id }}">{{ strtoupper($g->name) }} - ({{ count($g->contacts) }} recipient)</option>
                                    @endforeach
                                @else
                                <option value="">NO Sending Group Found!</option>
                                @endif   
                            </select>
		                </div>

		                <div class="form-group">
		                	<label for="message">Message</label>
							<textarea name="message" id="message" class="form-control underlined" required></textarea>
		                </div>
                        <div class="form-group">
                            <label for="message_type">Message Type</label>
                            <select class="form-control" name="message_type" id="message_type" required>
                                <option value="General Message">General Message</option>
                                <option value="Announcement">Announcement</option>
                                <option value="Trivia">Trivial Message</option>
                                <option value="Alert">Alert Message</option>
                                <option value="Warning">Warning Message</option>
                            </select>
                        </div>
		                <div class="form-group">
		                	<button class="btn btn-primary"><i class="fa fa-send-o"></i> Send Message</button>
		                </div>
		            </form>
		        </div>
		    </div>
        </div>
    </div>
</section>
@endsection