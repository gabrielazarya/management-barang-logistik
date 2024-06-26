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
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-3">
                        {{ __('Form Peminjaman Barang') }}
                    </h3>

                    <div class="mb-6 p-4 bg-gray-100 rounded border border-gray-200">
                        <h4 class="text-md font-semibold mb-2">Aturan Peminjaman:</h4>
                        <ul class="list-disc list-inside text-sm text-gray-700">
                            <li>Pengguna wajib mengisi semua data dengan benar.</li>
                            <li>Peminjaman hanya dapat dilakukan oleh pengguna yang terdaftar.</li>
                            <li>Jumlah barang yang dipinjam tidak boleh melebihi stok yang tersedia.</li>
                            <li>Pengguna harus menentukan tanggal peminjaman dan tanggal pengembalian.</li>
                            <li>Barang harus dikembalikan tepat waktu untuk menghindari sanksi.</li>
                        </ul>
                    </div>

                    @if (session('success'))
                        <div id="notification" class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div id="notification" class="bg-red-500 text-white p-4 mb-4 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="peminjamanForm" action="{{ route('prosesPinjam') }}" method="POST" onsubmit="return validateForm()">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <div class="mb-4">
                            <label for="nama_peminjam" class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" class="mt-1 block w-full" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="mb-4">
                            <label for="id_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                            <select name="id_barang" id="id_barang" required class="mt-1 block w-full" onchange="updateAvailableStock()">
                                <option value="" hidden>Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id_barang }}" data-stock="{{ $barang->jumlah_barang_tersedia }}">
                                        {{ $barang->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_barang_dipinjam" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" name="jumlah_barang_dipinjam" id="jumlah_barang_dipinjam" min="1" required class="mt-1 block w-full">
                            <span id="available-stock" class="text-sm text-gray-600">Silahkan pilih barang terlebih dahulu.</span>
                            <span id="error-message" class="text-sm text-red-600"></span>
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required class="mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" required class="mt-1 block w-full">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Pinjam
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function updateAvailableStock() {
        const selectedBarang = document.getElementById('id_barang').selectedOptions[0];
        const stock = selectedBarang.getAttribute('data-stock');
        document.getElementById('available-stock').textContent = stock ? `Jumlah tersedia: ${stock}` : 'Silahkan pilih barang terlebih dahulu.';
        document.getElementById('error-message').textContent = ''; // Clear error message when item changes
    }

    function validateForm() {
        const selectedBarang = document.getElementById('id_barang').selectedOptions[0];
        const stock = parseInt(selectedBarang.getAttribute('data-stock'));
        const jumlah = parseInt(document.getElementById('jumlah_barang_dipinjam').value);

        if (jumlah > stock) {
            document.getElementById('error-message').textContent = 'Jumlah yang diminta melebihi jumlah barang yang tersedia.';
            return false;
        }
        return true;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.getElementById('notification');
        if (notification) {
            setTimeout(function() {
                notification.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }

        const today = new Date();
        const tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        const minDate = tomorrow.toISOString().split('T')[0];
        document.getElementById('tanggal_pinjam').setAttribute('min', minDate);
        document.getElementById('tanggal_pengembalian').setAttribute('min', minDate);
    });
</script>
