@extends('components.app')

@section('title', 'Detail Transaksi - Sistem Kasir Modern')

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
    <div class="container mx-auto px-4 max-w-5xl">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('transaksi.history') }}" 
               class="inline-flex items-center text-white hover:text-gray-200 mb-4 font-semibold transition-all">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali ke Riwayat
            </a>
            <div class="glass-card rounded-2xl p-6 shadow-2xl">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg mr-4">
                            <i class="fas fa-receipt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                                Detail Transaksi
                            </h1>
                            <p class="text-gray-600 mt-1">ID: <span class="font-mono font-bold text-purple-600">#{{ $transaksi->id_transaksi }}</span></p>
                        </div>
                    </div>
                    <a href="{{ route('transaksi.print', $transaksi) }}" 
                       target="_blank"
                       class="bg-gradient-to-r from-green-500 to-green-600 text-white px-6 py-3 rounded-xl font-bold hover:shadow-xl transition-all">
                        <i class="fas fa-print mr-2"></i>Print Struk
                    </a>
                </div>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Info Transaksi -->
            <div class="glass-card rounded-2xl p-6 shadow-xl">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                        <i class="fas fa-info-circle text-white"></i>
                    </div>
                    Informasi Transaksi
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 font-semibold">Tanggal:</span>
                        <span class="font-bold text-gray-900">{{ $transaksi->tanggal->format('d/m/Y') }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 font-semibold">Waktu:</span>
                        <span class="font-bold text-gray-900">{{ $transaksi->created_at->format('H:i:s') }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 font-semibold">Kasir:</span>
                        <span class="font-bold text-gray-900">{{ $transaksi->kasir->nama_kasir }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 font-semibold">Metode:</span>
                        <span class="px-3 py-1.5 text-xs font-bold rounded-full shadow-sm
                            @if($transaksi->metode_pembayaran === 'tunai') bg-green-100 text-green-700
                            @elseif($transaksi->metode_pembayaran === 'debit') bg-blue-100 text-blue-700
                            @elseif($transaksi->metode_pembayaran === 'kredit') bg-yellow-100 text-yellow-700
                            @else bg-purple-100 text-purple-700
                            @endif">
                            {{ ucfirst($transaksi->metode_pembayaran) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Info Pembayaran -->
            <div class="glass-card rounded-2xl p-6 shadow-xl">
                <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                        <i class="fas fa-money-bill-wave text-white"></i>
                    </div>
                    Informasi Pembayaran
                </h2>
                <div class="space-y-3">
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 font-semibold">Total:</span>
                        <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">{{ $transaksi->total_format }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                        <span class="text-gray-600 font-semibold">Bayar:</span>
                        <span class="font-bold text-gray-900 text-lg">{{ $transaksi->bayar_format }}</span>
                    </div>
                    <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border-2 border-green-200">
                        <span class="text-green-700 font-bold">Kembalian:</span>
                        <span class="text-2xl font-black text-green-600">{{ $transaksi->kembalian_format }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Items -->
        <div class="glass-card rounded-2xl p-6 shadow-xl">
            <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                    <i class="fas fa-list text-white"></i>
                </div>
                Item Transaksi
            </h2>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider">No</th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider">Menu</th>
                            <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider">Kategori</th>
                            <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider">Jumlah</th>
                            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wider">Harga</th>
                            <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wider">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($transaksi->detailTransaksi as $detail)
                            <tr class="hover:bg-purple-50 transition-colors">
                                <td class="px-4 py-3 text-sm font-bold text-gray-900">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">
                                    <div class="font-bold text-gray-900">{{ $detail->menu->nama_menu }}</div>
                                    @if($detail->menu->deskripsi)
                                        <div class="text-xs text-gray-600 mt-1">{{ Str::limit($detail->menu->deskripsi, 50) }}</div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-bold">
                                        {{ $detail->menu->kategori }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-bold rounded-xl shadow-lg">
                                        {{ $detail->jumlah }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right font-semibold text-gray-900">{{ $detail->harga_satuan_format }}</td>
                                <td class="px-4 py-3 text-right font-bold text-lg text-gray-900">{{ $detail->subtotal_format }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-right font-bold text-gray-900 uppercase tracking-wide">Total:</td>
                            <td class="px-4 py-4 text-right font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-indigo-600">
                                {{ $transaksi->total_format }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <!-- Action Buttons -->
        @if($transaksi->tanggal->isToday())
            <div class="mt-6">
                <form method="POST" action="{{ route('transaksi.cancel', $transaksi) }}"
                      onsubmit="return confirm('Yakin ingin membatalkan transaksi ini? Stok akan dikembalikan.')"
                      class="glass-card rounded-2xl p-6 shadow-xl">
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-lg">Batalkan Transaksi</p>
                                <p class="text-sm text-gray-600">Stok akan dikembalikan ke menu</p>
                            </div>
                        </div>
                        <button type="submit" 
                                class="bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-3 rounded-xl font-bold hover:shadow-xl transition-all">
                            <i class="fas fa-times-circle mr-2"></i>Batalkan
                        </button>
                    </div>
                </form>
            </div>
        @endif
    </div>
</div>
@endsection