<div class="site-menubar">
    <ul class="site-menu">
        <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Dashboard</span>
                <span class="site-menu-arrow"></span>
            </a>
            {{--           <ul class="site-menu-sub">
                <li class="site-menu-item active">
                    <a class="animsition-link" href="">
                        <span class="site-menu-title">Users</span>
                    </a>
                </li>
                <li class="site-menu-item">
                    <a class="animsition-link" href="dashboard/v2.html">
                        <span class="site-menu-title">Dashboard v2</span>
                    </a>
                </li>
                <li class="site-menu-item">
                    <a class="animsition-link" href="dashboard/ecommerce.html">
                        <span class="site-menu-title">Ecommerce</span>
                    </a>
                </li>
                <li class="site-menu-item">
                    <a class="animsition-link" href="dashboard/analytics.html">
                        <span class="site-menu-title">Analytics</span>
                    </a>
                </li>
                <li class="site-menu-item">
                    <a class="animsition-link" href="dashboard/team.html">
                        <span class="site-menu-title">Team</span>
                    </a>
                </li>
            </ul> --}}
        </li>
        <li class="site-menu-item has-sub">
            <a href="{{ route('users.index') }}">
                <i class="site-menu-icon icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Người dùng</span>
                {{-- <span class="site-menu-arrow"></span> --}}
            </a>
        </li>
        <li class="site-menu-item has-sub">
            <a href="{{ route('roles.index') }}">
                <i class="site-menu-icon icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">Vài trò người dùng</span>
                {{-- <span class="site-menu-arrow"></span> --}}
            </a>
        </li>
        <li class="site-menu-item has-sub">
            <a href="{{ route('permissions.index') }}">
                <i class="site-menu-icon icon wb-users" aria-hidden="true"></i>
                <span class="site-menu-title">Quyền người dùng</span>
                {{-- <span class="site-menu-arrow"></span> --}}
            </a>
        </li>
        <li class="site-menu-item has-sub">
            <a href="">
                <i class="site-menu-icon icon wb-book" aria-hidden="true"></i>
                <span class="site-menu-title">Tuyển sinh đầu cấp</span>
                <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item active">
                    <a class="animsition-link" href="{{ route('dottuyensinh.index') }}">
                        <span class="site-menu-title">Quản lý</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</div>
