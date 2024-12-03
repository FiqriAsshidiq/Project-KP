<!DOCTYPE html>
<html>
<head>
    <title>Laporan Fasilitas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            text-align : center;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }

        p.date {
            text-align: center;
            font-style: italic;
        }
        .kepalahoskiping {
            position: fixed;
            bottom: 10x; /* Jarak dari bawah */
            right: 30px;  /* Jarak dari kanan */
            text-align: center;
        }

        .kepalahoskiping::after {
            content: '';
            display: block;
            width: 130px; /* Panjang garis */
            border-bottom: 1px solid black;
            margin-bottom: 10px; /* Jarak antara garis dan tulisan */
        };
    </style>
</head>
<body>

    <h2>Transaksi</h2>

    <!-- Menampilkan Bulan dan Tahun Laporan -->
    <p class="date">Laporan untuk bulan {{ \Carbon\Carbon::createFromFormat('m', $bulan)->format('F') }} tahun {{ $tahun }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Fasilitas</th>
                <th>Barang Masuk</th>
                <th>Barang Keluar</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($transaksi as $index => $transaksi)           
         <tr>
            <td >{{ $index + 1 }}</td>
            <td >{{ $transaksi->tanggal }}</td>
            <td >{{ $transaksi->fasilitas->nama_fasilitas }}</td> 
            <td >{{ $transaksi->barang_masuk }}</td>
            <td >{{ $transaksi->penggunaan_barang }}</td> <!-- Akses penggunaan barang dari transaksi -->
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br><br>

    <div class="kepalahoskiping">
        Kepala Hoskiping
    </div>

</body>
</html>
