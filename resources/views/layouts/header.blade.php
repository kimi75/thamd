<header id="header" class="header transition-base fixed-top z-1030" data-bs-theme="dark">
    <nav class="navbar navbar-expand-xl fw-medium pt-5 pb-5 fs-6">
        <div class="container justify-content-end">
            <!-- Brand -->
            <a class="navbar-brand flex-grow-1" id="brandHeader" href="{{ __('header.links.home') }}">
                <img src="/images/logos/am-drive-logo-blanc-2.svg" class="logo" alt="logo am-drive">
                <span class="d-none">am-drive</span>
            </a>
            <!-- /Brand -->
            <!-- offcanvas Navbar -->
            <div class="offcanvas offcanvas-navbar offcanvas-end border-start-0" tabindex="-1" id="offcanvasNavbar">
                <!-- Offcanvas header -->
                <div class="offcanvas-header">
                    <a href="{{ __('header.links.home') }}">
                        <img class="logo-light" src="/images/logos/am-drive-logo-blanc.svg" alt="Am-drive" title="am-drive">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <!-- /Offcanvas header -->
                <div class="offcanvas-body justify-content-end">
                    <!-- Navbar nav-->
                    <ul class="navbar-nav align-items-xl-center me-xl-3 mb-3 mb-xl-0">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase active" href="{{ __('header.links.home') }}" data-bs-display="static">
                                <span>{{ __('header.home') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-uppercase active" href="{{ __('header.links.services') }}" data-bs-display="static">
                                <span>{{ __('header.services') }}</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-uppercase active" href="{{ __('header.links.contact') }}" data-bs-display="static">
                                <span>{{ __('header.contact') }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex flex-column flex-xl-row align-items-xl-center small">
                        <!-- Language & Currency -->
                        <div class="mt-5 mt-xl-0 order-1 order-xl-0">
                            <ul class="nav flex-row me-xl-7 mb-3 mb-xl-0">
                                <li class="nav-item me-4">
                                    <a class="navbar-text d-flex align-items-center" data-bs-toggle="modal" href="{{ __('header.links.language_modal') }}">
                                        <img src="assets/img/flags/en.svg" height="14" alt="" class="me-1">
                                        <span>{{ __('header.language') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Language & Currency -->
                        <!-- Reservation -->
                        <div class="mt-2 mt-xl-0 order-0 order-xl-1">
                            <a href="{{ __('header.links.reservation') }}" class="btn btn-primary">
                                <i class="hicon hicon-24hour-room-service"></i>
                                <span>{{ __('header.reservation') }}</span>
                            </a>
                        </div>
                        <!-- /Reservation -->
                    </div>
                    <!-- /Sub Links -->
                </div>
            </div>
            <!-- /offcanvas Navbar -->

            <!-- Nav toggler -->
            <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- /Nav toggler -->
        </div>
    </nav>
</header>

<div class="modal fade" id="mdlLanguage" tabindex="-1" aria-labelledby="h3Language" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-4 text-uppercase ls-1 ff-sub" id="h3Language">{{ __('header.select_language') }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav small row mb-0">
                    <li class="nav-item col-6 col-lg-4">
                        <a class="nav-link text-body link-hover-primary d-flex align-items-center ps-0" href="{{ __('header.links.english') }}">
                            <span class="me-1">{{ __('header.languages.english') }}</span>
                        </a>
                    </li>
                    <li class="nav-item col-6 col-lg-4">
                        <a class="nav-link text-body link-hover-primary d-flex align-items-center ps-0" href="{{ __('header.links.french') }}">
                            <span class="me-1">{{ __('header.languages.french') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>