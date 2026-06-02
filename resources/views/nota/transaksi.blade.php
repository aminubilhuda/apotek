<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi - {{ $transaksi->id_transaksi }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 10pt;
            color: #000;
        }
        .container {
            width: 300px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 14pt;
            margin: 0;
        }
        .header p {
            margin: 0;
            font-size: 9pt;
        }
        .info {
            margin-bottom: 10px;
        }
        .info table {
            width: 100%;
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            padding: 4px 0;
        }
        .items th {
            text-align: left;
            border-bottom: 1px dashed #000;
        }
        .items .price-col {
            text-align: right;
        }
        .totals {
            margin-top: 10px;
            width: 100%;
        }
        .totals table {
            width: 100%;
        }
        .totals .label {
            text-align: left;
        }
        .totals .value {
            text-align: right;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 9pt;
        }
        @media print {
            body {
                margin: 0;
            }
            .no-print {
                display: none;
            }
        }
        .print-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="print-button no-print" onclick="window.print()">Cetak Nota</button>

        <div class="header">
            <h1>{{ $pengaturan['nama_aplikasi'] ?? 'Apotek Sehat' }}</h1>
            <p>{{ $pengaturan['alamat_toko'] ?? 'Alamat Toko Anda' }}</p>
            <p>Telp: {{ $pengaturan['no_telepon'] ?? '' }}</p>
        </div>

        <div class="info">
            <table>
                <tr>
                    <td>No. Transaksi</td>
                    <td>: {{ $transaksi->id_transaksi }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $transaksi->tanggal_transaksi->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <td>Pelanggan</td>
                    <td>: {{ $transaksi->pelanggan->nama_pelanggan ?? 'Umum' }}</td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td>: {{ $transaksi->user->name }}</td>
                </tr>
            </table>
        </div>

        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Obat</th>
                        <th class="price-col">Qty</th>
                        <th class="price-col">Harga</th>
                        <th class="price-col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detailTransaksi as $item)
                    <tr>
                        <td>{{ $item->obat->nama_obat }}</td>
                        <td class="price-col">{{ $item->jumlah }}</td>
                        <td class="price-col">{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="price-col">{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="totals">
             <hr style="border: 1px dashed #000;">
            <table>
                <tr>
                    <td class="label"><strong>Total</strong></td>
                    <td class="value"><strong>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</strong></td>
                </tr>
                 <tr>
                    <td class="label">Metode Bayar</td>
                    <td class="value">{{ $transaksi->metode_pembayaran }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja!</p>
            <p>Semoga lekas sembuh.</p>
        </div>
    </div>
</body>
</html>