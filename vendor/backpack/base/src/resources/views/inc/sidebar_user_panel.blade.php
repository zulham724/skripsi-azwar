<div class="user-panel">
  <a class="pull-left image" href="{{ route('backpack.account.info') }}">
    <img src="{{ backpack_auth()->user()->avatar != null ? asset('uploads/'.backpack_auth()->user()->avatar) : asset('uploads/avatars/default.png') }}" class="img-circle" alt="User Image">
  </a>
  <div class="pull-left info">
    <p><a href="{{ route('backpack.account.info') }}">{{ backpack_auth()->user()->name }}</a></p>
    <small><small><a href="{{ route('backpack.account.info') }}"><span><i class="fa fa-user"></i> {{ trans('backpack::base.my_account') }}</span></a> &nbsp;  &nbsp; <a onclick="logout()" href="#"><i class="fa fa-sign-out-alt"></i> <span>{{ trans('backpack::base.logout') }}</span></a></small></small>
  </div>
</div>