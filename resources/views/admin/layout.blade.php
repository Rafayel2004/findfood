<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    
    <!-- Styles -->
    @production
        {{-- In production, you would link to compiled CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @else
        {{-- For development without Vite --}}
        <script src="https://cdn.tailwindcss.com"></script>
    @endproduction
    
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .form-input {
            border: 1px solid #e2e8f0;
            padding: 0.5rem;
            border-radius: 0.25rem;
            width: 100%;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #f53003;
            box-shadow: 0 0 0 3px rgba(245, 48, 3, 0.1);
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }
        
        .btn-primary {
            background-color: #f53003;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #e02d04;
        }
        
        .btn-secondary {
            background-color: #718096;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #4a5568;
        }
        
        .btn-danger {
            background-color: #e53e3e;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c53030;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th,
        .table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .table th {
            background-color: #f7fafc;
            font-weight: 600;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
        }
        
        .alert-success {
            background-color: #c6f6d5;
            color: #22543d;
            border: 1px solid #9ae6b4;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-white min-h-screen shadow-lg">
            <div class="p-4 border-b border-gray-200">
                <h1 class="text-xl font-bold text-[#f53003]">FineFood Admin</h1>
            </div>
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 rounded hover:bg-gray-100 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-100' : '' }}">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="block py-2 px-4 rounded hover:bg-gray-100 {{ request()->routeIs('admin.products.*') ? 'bg-gray-100' : '' }}">
                            Products
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold">@yield('header', 'Admin Panel')</h2>
                <div>
                    @auth
                        <a href="{{ url('/') }}" class="text-sm text-[#f53003] hover:underline">Back to Site</a>
                    @endauth
                </div>
            </header>

            <!-- Content -->
            <main class="p-6">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>