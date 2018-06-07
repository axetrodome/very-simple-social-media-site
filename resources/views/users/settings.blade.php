@extends('layouts.app')

@section ('title','Settings')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">My Profile</div>
	                <div class="card-body">
						@include('layouts.status')
						
						@include('layouts.errors')
	                	<form action="/settings/{{ $user->slug }}/update_settings" method="POST">
							@csrf
							@method('PUT')
						     <div class="form-group">
						     	<label for="current_password"><b>Current password:</b></label>
						     	<input type="password" name="current_password" id="current_password" class="form-control" required>
						     </div>
						     <div class="form-group">
						     	<label for="password"><b>Password:</b></label>
						     	<input type="password" name="password" id="password" class="form-control" required>
						     </div>
						     <div class="form-group">
						     	<label for="password_confirmation"><b>Confirm Password:</b></label>
						     	<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
						     </div>           		
							<div class="form-group float-right">
								<button type="submit" class="btn btn-primary"><span class="fa fa-arrow-down"></span> Save</button>
							</div>
	                	</form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection
