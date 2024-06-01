<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Peminjaman Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('prosesPinjam') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                Peminjam</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full"
                                value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="id_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                            <select name="id_barang" id="id_barang" required class="mt-1 block w-full">
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_barang_dipinjam"
                                class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" name="jumlah_barang_dipinjam" id="jumlah_barang_dipinjam"
                                min="1" required class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700">Tanggal
                                Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required
                                class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal
                                Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" required
                                class="mt-1 block w-full">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Pinjam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
