<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <li class="nav-item {{ set_active('dashboard.index') }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item {{ set_active(['user.index','activity.index']) }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">User Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ set_active('user.index') }}">
                        <a href="{{ route('user.index') }}" class="nav-link ">
                            <span class="title">User Lists</span>
                        </a>
                    </li>
                    @can('disable')
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <span class="title">User Roles</span>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item {{ set_active('activity.index') }}">
                        <a href="{{ route('activity.index') }}" class="nav-link ">
                            <span class="title">Activity Log</span>
                        </a>
                    </li>                                    
                </ul>
            </li>
            <li class="nav-item {{ set_active(['mitra.index','newMitra.index']) }}">
            	<a href="javascript:;" class="nav-link nav-toggle">
            		<i class="icon-social-dropbox"></i>
            		<span class="title">Mitra Monitoring</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                	<li class="nav-item {{ set_active('mitra.index') }}">
                		<a href="{{ route('mitra.index') }}" class="nav-link ">
                            <span class="title">Mitra Sales</span>
                        </a>
                    </li>
                    @can('disable')
                    <li class="nav-item {{ set_active('newMitra.index') }}">
                        <a href="{{ route('newMitra.index') }}" class="nav-link ">
                            <span class="title">New Mitra Status</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <span class="title">Mitra Performance</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-grid"></i>
                    <span class="title">Mitra Sales Forms</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="https://form.jotform.com/211382211585450" target="_blank" class="nav-link ">
                            <span class="title">Registrasi Mitra A</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="https://form.jotform.com/211742404259452" target="_blank" class="nav-link ">
                            <span class="title">Registrasi Mitra B</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="https://form.jotform.com/211381996615463" target="_blank" class="nav-link ">
                            <span class="title">Pengajuan Rute Pengiriman</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="https://form.jotform.com/211382456773460" target="_blank" class="nav-link ">
                            <span class="title">Kunjungan Staff</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="https://form.jotform.com/211381723971456" target="_blank" class="nav-link ">
                            <span class="title">Kunjungan SPV/AM</span>
                        </a>
                    </li>
                </ul>
            </li>
            @can('disable')
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-grid"></i>
                    <span class="title">Store Monitoring</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <span class="title">Store Sales</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="nav-item  {{ set_active('mitraReports.index') }}">
            	<a href="javascript:;" class="nav-link nav-toggle">
            		<i class="icon-grid"></i>
            		<span class="title">Reports</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @can('disable')
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <span class="title">Global Sales</span>
                        </a>
                    </li>
                    @endcan
                    <li class="nav-item {{ set_active('mitraReports.index') }}">
                        <a href="{{ route('mitraReports.index') }}" class="nav-link ">
                            <span class="title">Mitra Sales</span>
                        </a>
                    </li>
                    @can('disable')
                    <li class="nav-item ">
                        <a href="" class="nav-link ">
                            <span class="title">Store Sales</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
        </ul>
    </div>
</div>