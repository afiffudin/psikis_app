<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            min-width: 250px;
            background-color: {{ session('themeColor', '#343a40') }};
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: {{ session('themeColor', '#495057') }};
            color: white;
        }
        
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: {{ session('themeColor', '#343a40') }};
            color: white;
            padding: 10px;
        }
        .navbar .user-icon {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .navbar .user-icon:hover {
            color: #adb5bd;
        }
        .user-dropdown {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h3 class="text-center my-4">Dashboard</h3>
            <a href="/soal" class="{{ request()->is('soal') ? 'active' : '' }}">Soal</a>
            <a href="/modules" class="{{ request()->is('modules') ? 'active' : '' }}">Modules</a>
            <a href="/settings">Settings</a>
            <a href="{{ route('logout') }}">Logout</a>
        </nav>

        <!-- Main Content -->
        <div class="content">
            <!-- Navbar with User Icon -->
            <div class="navbar d-flex justify-content-between">
                <button id="openColorModal" class="btn btn-outline-light">Ganti Warna Tema</button>

                <div class="dropdown">
                    <a href="#" class="user-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle" style="font-size: 24px; margin-right: 8px;"></i>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                        <li><a class="dropdown-item" href="/settings">Settings</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Section -->
            @yield('content')
        </div>
    </div>

    <!-- Include Settings Modal -->
    @include('questions.setting')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('openColorModal').addEventListener('click', function () {
            var colorModal = new bootstrap.Modal(document.getElementById('colorModal'));
            colorModal.show();
        });
    </script>
</body>
</html>
