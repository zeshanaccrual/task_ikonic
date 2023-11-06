<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href=" {{ route('dashboard') }}">
                    <span class="brand-logo">
                    </span><span class="brand-name">
                        <h2 class="brand-text" style="color: black;">FeedBack System</h2>

                    </span>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->routeIs('dashboard') ? 'active' : null }}"><a class="d-flex align-items-center"
                    href="{{ route('dashboard') }}"><i data-feather="home"></i><span class="menu-item text-truncate"
                        data-i18n="eCommerce">Dashboard</span></a>
            </li>
            </li>
            </li>
            <li
                class="nav-item {{ request()->routeIs('feedback.index') || request()->routeIs('feedback.create') || request()->routeIs('feedback.edit') ? 'active' : null }}">
                <a class="d-flex align-items-center" href="{{ route('feedback.index') }}"><i
                        data-feather="circle"></i><span class="menu-title text-truncate"
                        data-i18n="Email">Feedback</span>
                </a>
            </li>

            <li
            class="nav-item {{ request()->routeIs('comment.index') || request()->routeIs('comment.create') || request()->routeIs('comment.edit') ? 'active' : null }}">
            <a class="d-flex align-items-center" href="{{ route('comment.index') }}"><i
                    data-feather="circle"></i><span class="menu-title text-truncate"
                    data-i18n="Email">Comments</span>
            </a>
        </li>
        </ul>
    </div>
</div>
