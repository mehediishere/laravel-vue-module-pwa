<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
        }

        .sidebar .nav-link {
            color: #ffffff;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
            background-color: #FF5F1F;
        }

        .dropdown-item.active, .dropdown-item:active{
            background-color: #fc7a46;
        }

        /* Keep dropdown open if it contains an item with the 'active' class */
/*        .nav-item.dropdown:has(.dropdown-item.active) .dropdown-menu {
            display: block;
        }*/
    </style>
</head>
<body>

@include('layout.sidebar')

<!-- Content Area -->
<div class="content">
    @include('layout.header')

    <!-- Page Content -->
    <div class="container">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdowns = document.querySelectorAll('.nav-item.dropdown');

        dropdowns.forEach(dropdown => {
            const activeItem = dropdown.querySelector('.dropdown-item.active');
            if (activeItem) {
                dropdown.classList.add('show'); // Add 'show' to keep the dropdown open
                dropdown.querySelector('.dropdown-menu').classList.add('show');
            }
        });
    });
</script>

<script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            // Register the service worker
            navigator.serviceWorker.register('/sw.js', { scope: '/' })
                .then((registration) => {
                    console.log('ServiceWorker registered with scope: ', registration.scope);
                })
                .catch((error) => {
                    console.log('ServiceWorker registration failed: ', error);
                });
        });
    }
</script>
</body>
</html>
