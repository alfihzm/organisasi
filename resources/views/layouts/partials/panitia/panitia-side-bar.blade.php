<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/panitia" aria-expanded="false"><i
                            data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">Data Oprec</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="/panitia/openrecruitment" class="sidebar-link"><span
                                    class="hide-menu"> Kampus
                                </span></a>
                        </li>
                    </ul>
                </li>
                @can('admin')
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/manage-users"
                            aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                class="hide-menu">Data Panitia</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/notification"
                            aria-expanded="false"><i data-feather="clock" class="feather-icon"></i><span
                                class="hide-menu">Riwayat</span></a>
                    </li>
                    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/pengaturan"
                            aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                                class="hide-menu">Pengaturan
                                Oprec</span></a>
                    </li>
                @endcan
                {{-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="#" aria-expanded="false"><i
                            data-feather="sidebar" class="feather-icon"></i><span class="hide-menu">Content Web
                        </span></a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
