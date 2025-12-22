@extends('components.app')

@section('title', 'Riwayat Transaksi - Sistem Kasir Modern')

@push('styles')
<style>
    .gradient-bg {
        background: #1f2937;
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen gradient-bg py-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="mb-8">
            <div class="glass-card rounded-2xl p-6 shadow-2xl">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                        <i class="fas fa-history text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                            Riwayat Transaksi
                        </h1>
                        <p class="text-gray-600 mt-1">Daftar semua transaksi yang telah dilakukan</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="mb-6 glass-card rounded-xl p-5 shadow-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-check-circle text-white text-lg"></i>
                    </div>
                    <p class="text-gray-800 font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 glass-card rounded-xl p-5 shadow-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-exclamation-circle text-white text-lg"></i>
                    </div>
                    <p class="text-gray-800 font-semibold">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Filter -->
        <div class="glass-card rounded-2xl p-6 mb-8 shadow-xl">
            <form method="GET" action="{{ route('transaksi.history') }}" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input 
                        type="date" 
                        name="tanggal" 
                        value="{{ request('tanggal') }}"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition"
                    >
                </div>
                <select 
                    name="metode"
                    class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-500/20 focus:border-purple-500 transition"
                >
                    <option value="">Semua Metode</option>
                    <option value="tunai" {{ request('metode') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="debit" {{ request('metode') == 'debit' ? 'selected' : '' }}>Debit</option>
                    <option value="kredit" {{ request('metode') == 'kredit' ? 'selected' : '' }}>Kredit</option>
                    <option value="qris" {{ request('metode') == 'qris' ? 'selected' : '' }}>QRIS</option>
                </select>
                <button type="submit" class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-lg transition">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
                <a href="{{ route('transaksi.history') }}" class="bg-white border-2 border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-bold hover:bg-gray-50 transition text-center">
                    <i class="fas fa-redo mr-2"></i>Reset
                </a>
            </form>
        </div>

        <!-- Table -->
        <div class="glass-card rounded-2xl shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Tanggal & Waktu</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Kasir</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Metode</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Bayar</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Kembalian</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($transaksis as $transaksi)
                            <tr class="hover:bg-purple-50 transition-colors">
                                <td class="px-6 py-4">
                                    <span class="font-mono font-bold text-purple-600">#{{ $transaksi->id_transaksi }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-gray-900">{{ $transaksi->tanggal->format('d/m/Y') }}</span>
                                        <span class="text-xs text-gray-600">{{ $transaksi->created_at->format('H:i:s') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-indigo-600 rounded-full flex items-center justify-center mr-3 shadow-md">
                                            <span class="text-white font-bold">{{ substr($transaksi->kasir->nama_kasir, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $transaksi->kasir->nama_kasir }}</div>
                                            <div class="text-xs text-gray-600">{{ $transaksi->kasir->username }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-bold text-lg text-gray-900">{{ $transaksi->total_format }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1.5 text-xs font-bold rounded-full shadow-sm
                                        @if($transaksi->metode_pembayaran === 'tunai') bg-green-100 text-green-700
                                        @elseif($transaksi->metode_pembayaran === 'debit') bg-blue-100 text-blue-700
                                        @elseif($transaksi->metode_pembayaran === 'kredit') bg-yellow-100 text-yellow-700
                                        @else bg-purple-100 text-purple-700
                                        @endif">
                                        {{ ucfirst($transaksi->metode_pembayaran) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $transaksi->bayar_format }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $transaksi->kembalian_format }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('transaksi.show', $transaksi) }}" 
                                           class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-lg transition flex items-center justify-center"
                                           title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('transaksi.print', $transaksi) }}" 
                                           target="_blank"
                                           class="w-9 h-9 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl hover:shadow-lg transition flex items-center justify-center"
                                           title="Print Struk">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        @if($transaksi->tanggal->isToday())
                                            <form method="POST" action="{{ route('transaksi.cancel', $transaksi) }}"
                                                  onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-9 h-9 bg-gradient-to-br from-red-500 to-red-600 text-white rounded-xl hover:shadow-lg transition flex items-center justify-center"
                                                        title="Batalkan">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-receipt text-gray-400 text-4xl"></i>
                                        </div>
                                        <p class="text-gray-500 text-lg font-medium">Belum ada transaksi</p>
                                        <p class="text-gray-400 text-sm mt-1">Transaksi akan muncul di sini</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($transaksis->hasPages())
            <div class="mt-8">
                {{ $transaksis->links() }}
            </div>
        @endif

        <!-- Summary -->
        @if($transaksis->count() > 0)
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="glass-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Total Transaksi</p>
                            <p class="text-3xl font-black text-gray-900 mt-1">{{ $transaksis->total() }}</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-shopping-cart text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Total Penjualan</p>
                            <p class="text-3xl font-black text-gray-900 mt-1">
                                Rp {{ number_format($transaksis->sum('total'), 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-money-bill-wave text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-semibold uppercase tracking-wide">Rata-rata</p>
                            <p class="text-3xl font-black text-gray-900 mt-1">
                                Rp {{ number_format($transaksis->avg('total'), 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection