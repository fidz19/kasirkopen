@extends('components.app')

@section('title', 'Dashboard - Sistem Kasir Modern')

@push('styles')
<style>
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(30%, -30%);
    }
    
    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
    
    .pulse-animation {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: .7;
        }
    }
    
    .gradient-bg {
        background:#1f2937;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen gradient-bg py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8">
            <div class="glass-card rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gray-600">
                            👋 Selamat Datang!
                        </h1>
                        <p class="text-xl text-gray-700 font-medium">
                            {{ auth()->guard('kasir')->user()->nama_kasir }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            <i class="fas fa-calendar-alt mr-2"></i>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full flex items-center justify-center shadow-2xl">
                            <span class="text-white text-4xl font-bold">{{ substr(auth()->guard('kasir')->user()->nama_kasir, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Penjualan Hari Ini -->
            <div class="stat-card glass-card rounded-2xl p-6 shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg transform -rotate-3">
                        <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                    </div>
                    <span class="text-xs font-bold text-green-600 bg-green-100 px-3 py-1.5 rounded-full pulse-animation">
                        HARI INI
                    </span>
                </div>
                <h3 class="text-gray-600 text-sm font-semibold mb-2 uppercase tracking-wide">Penjualan Hari Ini</h3>
                <p class="text-3xl font-black text-gray-900 mb-1">
                    Rp {{ number_format($penjualanHariIni, 0, ',', '.') }}
                </p>
                <div class="flex items-center text-green-600 text-sm font-semibold mt-2">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>{{ $transaksiHariIni }} Transaksi</span>
                </div>
            </div>

            <!-- Transaksi Hari Ini -->
            <div class="stat-card glass-card rounded-2xl p-6 shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg transform rotate-3">
                        <i class="fas fa-shopping-cart text-white text-2xl"></i>
                    </div>
                    <span class="text-xs font-bold text-blue-600 bg-blue-100 px-3 py-1.5 rounded-full pulse-animation">
                        HARI INI
                    </span>
                </div>
                <h3 class="text-gray-600 text-sm font-semibold mb-2 uppercase tracking-wide">Total Transaksi</h3>
                <p class="text-3xl font-black text-gray-900 mb-1">{{ $transaksiHariIni }}</p>
                <div class="flex items-center text-blue-600 text-sm font-semibold mt-2">
                    <i class="fas fa-receipt mr-1"></i>
                    <span>Transaksi Selesai</span>
                </div>
            </div>

            <!-- Menu Tersedia -->
            <div class="stat-card glass-card rounded-2xl p-6 shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg transform -rotate-3">
                        <i class="fas fa-utensils text-white text-2xl"></i>
                    </div>
                    <span class="text-xs font-bold text-purple-600 bg-purple-100 px-3 py-1.5 rounded-full">
                        STOK
                    </span>
                </div>
                <h3 class="text-gray-600 text-sm font-semibold mb-2 uppercase tracking-wide">Menu Tersedia</h3>
                <p class="text-3xl font-black text-gray-900 mb-1">{{ $totalMenu }}</p>
                <div class="flex items-center text-purple-600 text-sm font-semibold mt-2">
                    <i class="fas fa-box mr-1"></i>
                    <span>Item Menu</span>
                </div>
            </div>

            <!-- Penjualan Bulan Ini -->
            <div class="stat-card glass-card rounded-2xl p-6 shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg transform rotate-3">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <span class="text-xs font-bold text-orange-600 bg-orange-100 px-3 py-1.5 rounded-full">
                        BULAN INI
                    </span>
                </div>
                <h3 class="text-gray-600 text-sm font-semibold mb-2 uppercase tracking-wide">Penjualan Bulan Ini</h3>
                <p class="text-3xl font-black text-gray-900 mb-1">
                    Rp {{ number_format($penjualanBulanIni, 0, ',', '.') }}
                </p>
                <div class="flex items-center text-orange-600 text-sm font-semibold mt-2">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    <span>{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Chart Penjualan 7 Hari -->
            <div class="lg:col-span-2 glass-card rounded-2xl p-8 shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                            <i class="fas fa-chart-bar text-white"></i>
                        </div>
                        Grafik Penjualan 7 Hari
                    </h2>
                    <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-3 py-1.5 rounded-full">
                        TREN MINGGUAN
                    </span>
                </div>
                <div class="bg-white rounded-xl p-4 shadow-inner">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>

            <!-- Menu Terlaris -->
            <div class="glass-card rounded-2xl p-8 shadow-xl">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                            <i class="fas fa-fire text-white"></i>
                        </div>
                        Top Menu
                    </h2>
                </div>
                <div class="space-y-3">
                    @forelse($menuTerlaris as $menu)
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-white to-gray-50 rounded-xl shadow-md hover:shadow-lg transition-all border border-gray-100">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-lg">
                                    {{ $loop->iteration }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900">{{ $menu->nama_menu }}</p>
                                    <p class="text-xs text-gray-600 font-semibold">
                                        <i class="fas fa-fire text-orange-500 mr-1"></i>{{ $menu->total_terjual }} terjual
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-utensils text-gray-400 text-3xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium">Belum ada data menu terlaris</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Transaksi Terbaru -->
        <div class="mt-6 glass-card rounded-2xl p-8 shadow-xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                    <div class="w-10 h-10 bg-gray-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                        <i class="fas fa-history text-white"></i>
                    </div>
                    Transaksi Terbaru
                </h2>
                <a href="{{ route('transaksi.history') }}" class="flex items-center gap-2 bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-xl transition-all">
                    Lihat Semua 
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="bg-white rounded-xl shadow-inner overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-600 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">ID Transaksi</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Tanggal & Waktu</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Kasir</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Total</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Metode</th>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($transaksiTerbaru as $transaksi)
                                <tr class="hover:bg-purple-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <span class="font-mono font-bold text-gray-600">#{{ $transaksi->id_transaksi }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <span class="font-semibold text-gray-900">{{ $transaksi->tanggal->format('d/m/Y') }}</span>
                                            <span class="text-xs text-gray-600">{{ $transaksi->tanggal->format('H:i:s') }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-purple-400 to-indigo-600 rounded-full flex items-center justify-center mr-2 shadow-md">
                                                <span class="text-white font-bold text-sm">{{ substr($transaksi->kasir->nama_kasir, 0, 1) }}</span>
                                            </div>
                                            <span class="font-medium text-gray-900">{{ $transaksi->kasir->nama_kasir }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-bold text-lg text-gray-900">
                                            Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-full shadow-sm
                                            @if($transaksi->metode_pembayaran === 'tunai') bg-green-100 text-green-700
                                            @elseif($transaksi->metode_pembayaran === 'qris') bg-yellow-100 text-yellow-700
                                            @else bg-purple-100 text-purple-700
                                            @endif">
                                            {{ ucfirst($transaksi->metode_pembayaran) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('transaksi.show', $transaksi) }}" 
                                           class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:shadow-lg transition-all">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-16 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-receipt text-gray-400 text-4xl"></i>
                                            </div>
                                            <p class="text-gray-500 text-lg font-medium">Belum ada transaksi hari ini</p>
                                            <p class="text-gray-400 text-sm mt-1">Transaksi akan muncul di sini</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart Penjualan dengan styling modern
    const ctx = document.getElementById('salesChart').getContext('2d');
    const chartData = @json($chartData);
    
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.map(item => item.tanggal),
            datasets: [{
                label: 'Penjualan',
                data: chartData.map(item => item.total),
                borderColor: 'rgb(102, 126, 234)',
                backgroundColor: function(context) {
                    const chart = context.chart;
                    const {ctx, chartArea} = chart;
                    if (!chartArea) {
                        return null;
                    }
                    const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                    gradient.addColorStop(0, 'rgba(102, 126, 234, 0.3)');
                    gradient.addColorStop(1, 'rgba(102, 126, 234, 0.0)');
                    return gradient;
                },
                tension: 0.4,
                fill: true,
                borderWidth: 3,
                pointBackgroundColor: 'rgb(102, 126, 234)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: 'rgb(102, 126, 234)',
                    borderWidth: 1,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + (value/1000) + 'K';
                        },
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });
</script>
@endpush