<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ketersediaan Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">
                        <h1 class="mb-4">Ketersediaan Barang</h1>
                        <form method="GET" action="{{ route('ketersediaan') }}">
                            <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $tanggal_pinjam }}">
                        
                            <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ $tanggal_pengembalian }}">
                        
                            <button type="submit">Cek Ketersediaan</button>
                        </form>
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>Jumlah Tersedia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id_barang }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->tipe_barang }}</td>
                                        <td>{{ $item->jumlah_tersedia }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
