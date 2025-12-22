<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kasir Modern')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        [x-cloak] { display: none !important; }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .hover-lift {
            transition: transform 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }
        
        .sidebar {
            background: #1a1a1a;
        }
        
        .sidebar-link {
            transition: all 0.3s ease;
        }
        
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            padding-left: 1.5rem;
        }
        
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" 
             x-cloak
             @click="sidebarOpen = false"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden">
        </div>

        <!-- Mobile Sidebar -->
        <aside x-show="sidebarOpen"
               x-cloak
               x-transition:enter="transition ease-in-out duration-300 transform"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in-out duration-300 transform"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               class="fixed inset-y-0 left-0 sidebar w-64 text-white z-50 md:hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                            <i class="fas fa-cash-register text-purple-600 text-xl"></i>
                        </div>
                        <h1 class="text-xl font-bold">Kasir Kopen</h1>
                    </div>
                    <button @click="sidebarOpen = false" class="text-white hover:text-gray-200 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('transaksi.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart w-5"></i>
                        <span>Transaksi</span>
                    </a>
                    
                    <a href="{{ route('menu.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('menu.*') ? 'active' : '' }}">
                        <i class="fas fa-utensils w-5"></i>
                        <span>Menu</span>
                    </a>
                    
                    <a href="{{ route('laporan.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span>Laporan</span>
                    </a>
                    
                    <a href="{{ route('profile.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <i class="fas fa-user w-5"></i>
                        <span>Profile</span>
                    </a>
                    
                    <hr class="border-white/20 my-4">
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg w-full text-left hover:bg-red-500/20">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Desktop Sidebar -->
        <aside class="sidebar w-64 text-white flex-shrink-0 hidden md:block">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-cash-register text-purple-600 text-xl"></i>
                    </div>
                    <h1 class="text-xl font-bold">Kasir Kopen</h1>
                </div>
                
                <nav class="space-y-2">
                    <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home w-5"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="{{ route('transaksi.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('transaksi.*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart w-5"></i>
                        <span>Transaksi</span>
                    </a>
                    
                    <a href="{{ route('menu.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('menu.*') ? 'active' : '' }}">
                        <i class="fas fa-utensils w-5"></i>
                        <span>Menu</span>
                    </a>
                    
                    <a href="{{ route('laporan.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar w-5"></i>
                        <span>Laporan</span>
                    </a>
                    
                    <a href="{{ route('profile.index') }}" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                        <i class="fas fa-user w-5"></i>
                        <span>Profile</span>
                    </a>
                    
                    <hr class="border-white/20 my-4">
                    
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="sidebar-link flex items-center space-x-3 px-4 py-3 rounded-lg w-full text-left hover:bg-red-500/20">
                            <i class="fas fa-sign-out-alt w-5"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm z-10">
                <div class="px-6 py-4 flex items-center justify-between">
                    <button class="md:hidden text-gray-600 hover:text-purple-600 transition-colors p-2 rounded-lg hover:bg-purple-50" @click="sidebarOpen = true">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-900">
                                {{ Auth::guard('kasir')->user()->nama_kasir }}
                            </p>
                            <p class="text-xs text-gray-500">
                                {{ Auth::guard('kasir')->user()->username }}
                            </p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr(Auth::guard('kasir')->user()->nama_kasir, 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                @if(session('success'))
                    <div class="mx-4 mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mx-4 mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>