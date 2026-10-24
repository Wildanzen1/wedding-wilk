
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Wedding Invitation')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Poppins:wght@300;400;500;600&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --cream: #fbf7f2;
            --blush: #f6e6e2;
            --rose: #c98b8b;
            --rose-dark: #b07272;
            --gold: #b8975a;
            --gold-soft: #ecdfc4;
            --ink: #4a3f3a;
            --muted: #8c7f78;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--cream);
            color: var(--ink);
            margin: 0;
        }

        /* Navbar */
        .wd-navbar {
            position: relative;
            background: linear-gradient(180deg, #fff 0%, var(--cream) 100%);
            border-bottom: 1px solid var(--gold-soft);
            box-shadow: 0 4px 18px rgba(176, 114, 114, .08);
            padding: 12px 0;
            z-index: 1000;
        }

        .wd-navbar::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(
                90deg,
                transparent,
                var(--gold),
                var(--rose),
                var(--gold),
                transparent
            );
            opacity: .65;
        }

        /* Brand */
        .wd-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            margin-right: 35px;
        }

        .wd-brand-icon {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            font-size: 17px;
            background: linear-gradient(135deg, var(--rose), var(--rose-dark));
            box-shadow: 0 0 0 3px #fff, 0 0 0 4px var(--gold-soft);
        }

        .wd-brand-title {
            display: block;
            font-family: 'Great Vibes', cursive;
            font-size: 30px;
            line-height: 1;
            color: var(--rose-dark);
        }

        .wd-brand-subtitle {
            display: block;
            margin-top: 5px;
            font-size: 9px;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--gold);
        }

        /* Navigation links */
        .wd-navbar .navbar-nav {
            gap: 8px;
        }

        .wd-navbar .nav-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 17px !important;
            border-radius: 30px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 500;
            transition: all .25s ease;
        }

        .wd-navbar .nav-link:hover,
        .wd-navbar .nav-link.active {
            color: var(--rose-dark);
            background: var(--blush);
        }

        .wd-navbar .nav-link.active {
            box-shadow: inset 0 0 0 1px var(--gold-soft);
        }

        .wd-navbar .nav-link i {
            font-size: 16px;
        }

        .wd-navbar .nav-link.active i {
            color: var(--gold);
        }

        /* User profile */
        .wd-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 14px 5px 6px;
            border: 1px solid var(--gold-soft);
            border-radius: 40px;
            background: #fff;
            color: var(--ink);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            transition: all .25s ease;
        }

        .wd-user:hover,
        .wd-user.show {
            background: var(--blush);
            color: var(--rose-dark);
        }

        .wd-avatar {
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold), var(--rose));
            color: #fff;
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            font-weight: 700;
        }

        .wd-user i {
            color: var(--gold);
        }

        /* Dropdown */
        .wd-dropdown {
            min-width: 190px;
            margin-top: 12px !important;
            padding: 8px;
            border: 1px solid var(--gold-soft);
            border-radius: 16px;
            background: #fffaf6;
            box-shadow: 0 8px 24px rgba(74, 63, 58, .08);
        }

        .wd-dropdown .dropdown-item {
            padding: 10px 13px;
            border-radius: 10px;
            color: var(--ink);
            font-size: 13px;
            transition: all .2s ease;
        }

        .wd-dropdown .dropdown-item:hover {
            background: var(--blush);
            color: var(--rose-dark);
        }

        /* Hamburger */
        .wd-navbar .navbar-toggler {
            padding: 8px 10px;
            border: 1px solid var(--gold-soft);
            border-radius: 12px;
            background: #fff;
            box-shadow: none;
        }

        .wd-navbar .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(201, 139, 139, .15);
        }

        .wd-navbar .navbar-toggler-icon {
            filter: none;
        }

        /* Page content */
        .wd-content {
            min-height: calc(100vh - 100px);
            padding: 30px;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .wd-brand {
                margin-right: 0;
            }

            .wd-navbar .navbar-collapse {
                padding-top: 18px;
            }

            .wd-navbar .navbar-nav {
                gap: 4px;
            }

            .wd-navbar .nav-link {
                display: flex;
                width: 100%;
            }

            .wd-navbar .nav-link.active {
                box-shadow: inset 3px 0 0 var(--gold);
            }

            .wd-account {
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px dashed var(--gold-soft);
            }

            .wd-dropdown {
                margin-top: 5px !important;
            }

            .wd-content {
                padding: 20px 15px;
            }
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg wd-navbar">
        <div class="container-fluid px-4">

            {{-- Logo --}}
            <a class="wd-brand" href="{{ route('admin.dashboard') }}">
                <span class="wd-brand-icon">
                    <i class="bi bi-heart-fill"></i>
                </span>

                <span>
                    <span class="wd-brand-title">Wedding</span>
                    <span class="wd-brand-subtitle">Invitation Admin</span>
                </span>
            </a>

            {{-- Hamburger --}}
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#adminNavbar"
                    aria-controls="adminNavbar"
                    aria-expanded="false"
                    aria-label="Buka navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu --}}
            <div class="collapse navbar-collapse" id="adminNavbar">

                <ul class="navbar-nav me-auto mt-3 mt-lg-0">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                           href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-house-heart"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.invitations.*') ? 'active' : '' }}"
                           href="{{ route('admin.invitations.index') }}">
                            <i class="bi bi-envelope-heart"></i>
                            Daftar Undangan
                        </a>
                    </li>
                    {{-- TAMBAHKAN MENU RSVP DI SINI --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.rsvps.*') ? 'active fw-bold' : '' }}"
                    href="{{ route('admin.rsvps.index') }}">
                        <i class="bi bi-clipboard-heart me-1"></i>
                        RSVP
                    </a>
                </li>

                </ul>

                {{-- User menu --}}
                <div class="wd-account d-flex align-items-lg-center gap-3">

                    <div class="dropdown">
                        <button class="wd-user dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                            <span class="wd-avatar">
                                {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                            </span>

                            <span>{{ auth()->user()->name }}</span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end wd-dropdown">

                            <li>
                                <div class="px-3 py-2">
                                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                                    <small class="text-muted">{{ auth()->user()->email }}</small>
                                </div>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person-heart me-2"></i>
                                    Profile
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    {{-- Konten halaman --}}
    <main class="container-fluid wd-content">
        @yield('content')
    </main>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
