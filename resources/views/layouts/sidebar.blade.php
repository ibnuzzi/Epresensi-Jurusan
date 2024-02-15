<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png"
                    alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo-dark.png"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-left"> </i>
            </div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="../assets/images/logo/logo-icon.png" alt=""><img class="img-fluid for-dark"
                    src="../assets/images/logo/logo-icon-dark.png" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="index.html"><img class="img-fluid for-light"
                                src="../assets/images/logo/logo-icon.png" alt=""><img class="img-fluid for-dark"
                                src="../assets/images/logo/logo-icon-dark.png" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h4 class="lan-1">General </h4>
                        </div>
                    </li>
                    @if (auth()->user()->roles[0]->name == 'admin')
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/home" data-bs-original-title=""
                                title="">
                                <i data-feather="home"></i>
                                <span>Dashboard</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/student" data-bs-original-title=""
                                title="">
                                <i data-feather="users"></i>
                                <span>Siswa</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/classroom" data-bs-original-title=""
                                title="">
                                <i data-feather="codepen"></i>
                                <span>Kelas</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/clock-settings"
                                data-bs-original-title="" title="">
                                <i data-feather="clock"></i>
                                <span>Setting Jam</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/student-attendance"
                                data-bs-original-title="" title="">
                                <i data-feather="user-check"></i>
                                <span>Kehadiran</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                    @else
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/home" data-bs-original-title=""
                                title="">
                                <i data-feather="home"></i>
                                <span>Dashboard</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/presence" data-bs-original-title=""
                                title="">
                                <i data-feather="camera"></i>
                                <span>Absen</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/permissions"
                                data-bs-original-title="" title="">
                                <i data-feather="user-x"></i>
                                <span>Izin/Sakit</span>
                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="sidebar-img-section">
                    <div class="sidebar-img-content"><img class="img-fluid"
                            src="../assets/images/dashboard/upgrade/2.png" alt="">
                        <h4>Experiance with more Features</h4><a class="btn btn-primary"
                            href="https://themeforest.net/user/pixelstrap/portfolio" target="_blank">Check now</a>
                    </div>
                </div>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
