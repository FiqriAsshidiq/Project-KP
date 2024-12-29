<!DOCTYPE html>
<html>
<head>
    <title>Laporan Fasilitas Rusak</title>
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

    <h2>Laporan Fasilitas Rusak</h2>

    <!-- Menampilkan Bulan dan Tahun Laporan -->
    <p class="date">Laporan untuk bulan {{ \Carbon\Carbon::createFromFormat('m', $bulan)->format('F') }} tahun {{ $tahun }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Fasilitas</th>
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pengecekan_fasilitas as $index => $pengecekan_fasilitas)
        <tr>
                <td class=" text-center">{{ $index + 1 }}</td>
                <td class=" text-center">{{ $pengecekan_fasilitas->fasilitas->nama_fasilitas }}</td>
                <td class=" text-center">{{ $pengecekan_fasilitas->jumlah_rusak}}</td>
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
