<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11px;
            line-height: 1.6;
            color: #333;
            padding: 25px;
            background: #f8f9fa;
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
            padding: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .header h1 {
            font-size: 32px;
            color: white;
            margin-bottom: 8px;
            font-weight: 900;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .header h2 {
            font-size: 20px;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 12px;
            font-weight: 700;
        }

        .header p {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 500;
        }

        .summary {
            display: table;
            width: 100%;
            margin-bottom: 30px;
            border-spacing: 15px 0;
        }

        .summary-item {
            display: table-cell;
            width: 33.33%;
            padding: 20px;
            background: white;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #667eea;
        }

        .summary-item h3 {
            font-size: 10px;
            color: #666;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .summary-item p {
            font-size: 24px;
            font-weight: 900;
            color: #667eea;
            letter-spacing: -0.5px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 900;
            color: #333;
            margin: 30px 0 20px 0;
            padding: 12px 18px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
            display: flex;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        table th {
            padding: 14px 12px;
            text-align: left;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #e9ecef;
            font-size: 11px;
        }

        table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        table tbody tr:hover {
            background: #f0f3ff;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .badge-green {
            background: #d4edda;
            color: #155724;
        }

        .badge-blue {
            background: #d1ecf1;
            color: #0c5460;
        }

        .badge-yellow {
            background: #fff3cd;
            color: #856404;
        }

        .badge-purple {
            background: #e2d9f3;
            color: #5a32a3;
        }

        .footer {
            margin-top: 50px;
            padding-top: 25px;
            border-top: 3px solid #667eea;
            text-align: center;
            font-size: 10px;
            color: #666;
        }

        .footer p {
            margin: 3px 0;
        }

        .footer strong {
            color: #667eea;
            font-size: 13px;
        }

        .payment-methods {
            display: table;
            width: 100%;
            margin-bottom: 25px;
            border-spacing: 15px 0;
        }

        .payment-method {
            display: table-cell;
            width: 25%;
            padding: 18px;
            background: white;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-top: 3px solid #667eea;
        }

        .payment-method p {
            font-size: 9px;
            color: #666;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .payment-method h4 {
            font-size: 22px;
            color: #333;
            font-weight: 900;
            margin-bottom: 3px;
        }

        .payment-method .amount {
            font-size: 10px;
            color: #667eea;
            font-weight: 700;
        }

        .ranking {
            display: inline-block;
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 10px;
            text-align: center;
            line-height: 32px;
            font-weight: 900;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .highlight {
            font-weight: 900;
            color: #667eea;
        }

        tfoot {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 900;
        }

        tfoot td {
            padding: 15px 12px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>🏪 KASIR MODERN</h1>
        <h2>{{ $judul }}</h2>
        <p>📅 Dicetak pada: {{ now()->format('d F Y, H:i:s') }}</p>
    </div>

    <!-- Summary -->
    <div class="summary">
        <div class="summary-item">
            <h3>💰 Total Penjualan</h3>
            <p>Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
        </div>
        <div class="summary-item">
            <h3>🛒 Total Transaksi</h3>
            <p>{{ $totalTransaksi }}</p>
        </div>
        <div class="summary-item">
            <h3>📊 Rata-rata</h3>
            <p>Rp {{ $totalTransaksi > 0 ? number_format($totalPenjualan / $totalTransaksi, 0, ',', '.') : 0 }}</p>
        </div>
    </div>

    <!-- Metode Pembayaran -->
    <h2 class="section-title">💳 Metode Pembayaran</h2>
    <div class="payment-methods">
        @foreach($metodePembayaran as $metode => $info)
            <div class="payment-method">
                <p>{{ ucfirst($metode) }}</p>
                <h4>{{ $info['jumlah'] }}</h4>
                <p class="amount">Rp {{ number_format($info['total'], 0, ',', '.') }}</p>
            </div>
        @endforeach
    </div>

    <!-- Menu Terlaris -->
    <h2 class="section-title">🔥 Menu Terlaris (Top 10)</h2>
    <table>
        <thead>
            <tr>
                <th width="8%">Rank</th>
                <th width="40%">Nama Menu</th>
                <th width="20%">Kategori</th>
                <th width="12%" class="text-center">Terjual</th>
                <th width="20%" class="text-right">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menuTerlaris as $menu)
                <tr>
                    <td class="text-center">
                        <span class="ranking">{{ $loop->iteration }}</span>
                    </td>
                    <td><strong class="highlight">{{ $menu->nama_menu }}</strong></td>
                    <td>
                        <span class="badge badge-purple">{{ $menu->kategori }}</span>
                    </td>
                    <td class="text-center"><strong class="highlight">{{ $menu->total_terjual }}</strong> item</td>
                    <td class="text-right"><strong class="highlight">Rp {{ number_format($menu->total_pendapatan, 0, ',', '.') }}</strong></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center" style="padding: 30px;">
                        <strong>📭 Belum ada data</strong>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Daftar Transaksi -->
    <h2 class="section-title">📋 Daftar Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="20%">Tanggal</th>
                <th width="25%">Kasir</th>
                <th width="20%">Metode</th>
                <th width="25%" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $transaksi)
                <tr>
                    <td><strong class="highlight">#{{ $transaksi->id_transaksi }}</strong></td>
                    <td>{{ $transaksi->tanggal->format('d/m/Y H:i') }}</td>
                    <td><strong>{{ $transaksi->kasir->nama_kasir }}</strong></td>
                    <td>
                        <span class="badge 
                            @if($transaksi->metode_pembayaran === 'tunai') badge-green
                            @elseif($transaksi->metode_pembayaran === 'debit') badge-blue
                            @elseif($transaksi->metode_pembayaran === 'kredit') badge-yellow
                            @else badge-purple
                            @endif">
                            {{ ucfirst($transaksi->metode_pembayaran) }}
                        </span>
                    </td>
                    <td class="text-right"><strong class="highlight">Rp {{ number_format($transaksi->total, 0, ',', '.') }}</strong></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center" style="padding: 30px;">
                        <strong>📭 Belum ada transaksi</strong>
                    </td>
                </tr>
            @endforelse
        </tbody>
        @if(count($transaksis) > 0)
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right" style="font-size: 13px;">💎 GRAND TOTAL:</td>
                    <td class="text-right" style="font-size: 15px;">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        @endif
    </table>

    <!-- Footer -->
    <div class="footer">
        <p><strong>KASIR MODERN</strong></p>
        <p>📍 Jl. Contoh No. 123, Surabaya, Jawa Timur</p>
        <p>📞 0812-3456-7890 | ✉️ info@kasirmodern.com</p>
        <p style="margin-top: 12px; color: #999;">Laporan ini digenerate secara otomatis oleh sistem</p>
    </div>
</body>
</html>