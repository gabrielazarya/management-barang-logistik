<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Pinjam Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('prosesPinjam') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="id_barang" class="block text-gray-700">Pilih Barang:</label>
                            <select id="id_barang" name="id_barang" class="form-select mt-1 block w-full">
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_pinjam" class="block text-gray-700">Jumlah Pinjam:</label>
                            <input type="number" id="jumlah_pinjam" name="jumlah_pinjam" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pinjam" class="block text-gray-700">Tanggal Pinjam:</label>
                            <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pengembalian" class="block text-gray-700">Tanggal Pengembalian:</label>
                            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-input mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Pinjam</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
