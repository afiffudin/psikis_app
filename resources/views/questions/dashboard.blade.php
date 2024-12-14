<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            min-width: 250px;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #495057;
            color: white;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h3 class="text-center my-4">Dashboard</h3>
            <a href="/soal" class="{{ request()->is('soal') ? 'active' : '' }}">Questions</a>
            <a href="/modules" class="{{ request()->is('modules') ? 'active' : '' }}">Modules</a>
            <a href="/settings">Settings</a>
            <a href="/logout">Logout</a>
        </nav>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
