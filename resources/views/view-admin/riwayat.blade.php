<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Peminjaman Semua Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Riwayat Peminjaman Semua Pengguna</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Peminjaman</th>
                                <th>Nama Pengguna</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjams as $pinjam)
                            <tr>
                                <td>{{ $pinjam->id_pinjam }}</td>
                                <td>{{ $pinjam->user->name }}</td>
                                <td>{{ $pinjam->barang->nama_barang }}</td>
                                <td>{{ $pinjam->jumlah_barang_dipinjam }}</td>
                                <td>{{ $pinjam->tanggal_pinjam }}</td>
                                <td>{{ $pinjam->tanggal_pengembalian }}</td>
                                <td>{{ $pinjam->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
