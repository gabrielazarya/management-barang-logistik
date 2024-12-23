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
                        
                        <!-- Nama Peminjam -->
                        <div class="mb-4">
                            <label for="nama_peminjam" class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" class="mt-1 block w-full" value="{{ auth()->user()->name }}" disabled>
                        </div>

                        <!-- Tabel Barang -->
                        <div class="mb-4">
                            <label for="searchInput" class="block text-sm font-medium text-gray-700">Cari Barang</label>
                            <input type="text" id="searchInput" class="mt-1 block w-full" placeholder="Ketik untuk mencari barang...">
                        </div>

                        <div class="table-responsive mb-4" style="max-height: 200px; overflow-y: auto;">
                            <table id="barangTable" class="table table-striped w-full">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>Nama Barang</th>
                                        <th>Tipe Barang</th>
                                        <th>Jumlah Barang Tersedia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $barang)
                                        <tr>
                                            <td>
                                                <input type="radio" name="id_barang" value="{{ $barang->id_barang }}" data-stock="{{ $barang->jumlah_barang_tersedia }}" required>
                                            </td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->tipe_barang }}</td>
                                            <td>{{ $barang->jumlah_barang_tersedia }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Jumlah dan Tanggal -->
                        <div class="mb-4">
                            <label for="jumlah_barang_dipinjam" class="block text-sm font-medium text-gray-700">Jumlah</label>
                            <input type="number" name="jumlah_barang_dipinjam" id="jumlah_barang_dipinjam" min="1" required class="mt-1 block w-full">
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

    <script>
        // Pencarian di tabel
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('#barangTable tbody tr');
            rows.forEach(row => {
                const namaBarang = row.cells[1].textContent.toLowerCase();
                row.style.display = namaBarang.includes(filter) ? '' : 'none';
            });
        });

        // Validasi jumlah barang
        function validateForm() {
            const selectedBarang = document.querySelector('input[name="id_barang"]:checked');
            if (!selectedBarang) {
                document.getElementById('error-message').textContent = 'Silahkan pilih barang.';
                return false;
            }

            const stock = parseInt(selectedBarang.getAttribute('data-stock'));
            const jumlah = parseInt(document.getElementById('jumlah_barang_dipinjam').value);
            if (jumlah > stock) {
                document.getElementById('error-message').textContent = 'Jumlah yang diminta melebihi jumlah barang yang tersedia.';
                return false;
            }
            return true;
        }
    </script>
</x-app-layout>
