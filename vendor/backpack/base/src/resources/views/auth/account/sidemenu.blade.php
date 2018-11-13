<div class="box">
    <div class="box-body box-profile">
	    <img class="profile-user-img img-responsive img-circle" src="{{ backpack_auth()->user()->avatar != null ? asset('uploads/'.backpack_auth()->user()->avatar) : asset('uploads/avatars/default.png') }}">
	    <h3 class="profile-username text-center">{{ backpack_auth()->user()->name }}</h3>
	    <form method="post" files='true' enctype="multipart/form-data" action="{{ route('users.update',backpack_auth()->user()->id) }}">
	    	@method('put')
	    	@csrf
	    	<input type="file" class="form-control" name="avatar" required>
	    	<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Upload</button>
	    </form>
	</div>

	<hr class="m-t-0 m-b-0">

	<ul class="nav nav-pills nav-stacked">

	  <li role="presentation"
		@if (Request::route()->getName() == 'backpack.account.info')
	  	class="active"
	  	@endif
	  	><a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.update_account_info') }}</a></li>

	  <li role="presentation"
		@if (Request::route()->getName() == 'backpack.account.password')
	  	class="active"
	  	@endif
	  	><a href="{{ route('backpack.account.password') }}">{{ trans('backpack::base.change_password') }}</a></li>

	</ul>
</div>
