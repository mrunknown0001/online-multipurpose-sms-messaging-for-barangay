@if(session('warning'))
	<div class="alert alert-warning text-center top-space">
		<a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<b>{{ session('warning') }}</b>
	</div>
@endif