<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ backpack_url('user') }}'><i class='fa fa-tag'></i> <span>Users</span></a></li>
<li><a href='{{ backpack_url('role') }}'><i class='fa fa-tag'></i> <span>Roles</span></a></li>
<li><a href='{{ backpack_url('data') }}'><i class='fa fa-tag'></i> <span>Data</span></a></li>
<li><a href='{{ backpack_url('biodata') }}'><i class='fa fa-tag'></i> <span>Biodata</span></a></li>