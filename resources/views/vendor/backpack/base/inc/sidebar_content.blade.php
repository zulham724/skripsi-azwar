<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-home"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-folder"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<li><a href='{{ backpack_url('role') }}'><i class='fa fa-tag'></i> <span>Daftar Hak Akses</span></a></li>
<li><a href='{{ backpack_url('user') }}'><i class='fa fa-user'></i> <span>Daftar Pengguna</span></a></li>
<li><a href='{{ backpack_url('biodata') }}'><i class='fa fa-file'></i> <span>Daftar Biodata Pengguna</span></a></li>
<li><a href='{{ backpack_url('data') }}'><i class='fa fa-code-branch'></i> <span>Daftar Data</span></a></li>
<li><a href='{{ backpack_url('polling') }}'><i class='fa fa-tag'></i> <span>Hasil Polling</span></a></li>
<li><a href='{{ backpack_url('socket') }}'><i class='fa fa-tag'></i> <span>Hasil Socket</span></a></li>