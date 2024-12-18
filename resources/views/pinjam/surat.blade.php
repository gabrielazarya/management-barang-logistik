<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0 2cm;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Surat Resmi Peminjaman Barang</h2>
        <br>
        <p>Nomor Surat: {{ sprintf('%04d', $cetak->id_pinjam) }}/SPB/{{ date('Y') }}</p>
        <p>Tanggal: {{ date('d F Y') }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini:</p>
        <p><strong>Nama:</strong> {{ $cetak->user->name }}</p>
        <p><strong>Email:</strong> {{ $cetak->user->email }}</p>
    </div>

    <p>Menyatakan telah meminjam barang dengan rincian sebagai berikut:</p>
    <table>
        <tr>
            <th>Nama Barang</th>
            <th>Tipe Barang</th>
            <th>Jumlah Barang</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
        </tr>
        <tr>
            <td>{{ $cetak->barang->nama_barang }}</td>
            <td>{{ $cetak->barang->tipe_barang }}</td>
            <td>{{ $cetak->jumlah_barang_dipinjam }}</td>
            <td>{{ $cetak->tanggal_pinjam }}</td>
            <td>{{ $cetak->tanggal_pengembalian }}</td>
        </tr>
    </table>

    <p>Dengan ini, saya bertanggung jawab untuk menjaga barang selama masa peminjaman dan mengembalikannya dalam kondisi baik.</p>

    <p>Status: {{ $cetak->status }}</p>

    <p>Demikian surat peminjaman ini dibuat dengan sebenar-benarnya untuk dapat digunakan sebagaimana mestinya.</p>
    
    <div class="footer">
        <p>Dikonfirmasi pada: <br>{{ now()->format('d-m-Y') }}</p>
        <p>Pihak yang mengkonfirmasi:
        <br><strong>{{ $cetak->admin_name ?? 'Admin' }}</strong></p>
    </div>
</body>
</html>
