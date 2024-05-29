<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">
                        <h1 class="mb-4">Tambah Barang</h1>
                        <form action="{{ route('tambahData') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <select class="form-control" id="nama_barang" name="nama_barang" required>
                                    <option value="" hidden>Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipe_barang" class="form-label">Tipe Barang</label>
                                <input type="text" class="form-control" id="tipe_barang" name="tipe_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_barang_tersedia" class="form-label">Jumlah Barang Tersedia</label>
                                <input type="number" class="form-control" id="jumlah_barang_tersedia" name="jumlah_barang_tersedia" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
