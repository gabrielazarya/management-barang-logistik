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
                    <div class="ketersediaan-container mt-5">
                        <h1 class="ketersediaan-header mb-4">{{ __('Ketersediaan Barang') }}</h1>
                        <form class="ketersediaan-form" method="GET" action="{{ route('ketersediaan') }}">
                            <div class="form-group">
                                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                                <input type="date" id="tanggal_pinjam" name="tanggal_pinjam"
                                    value="{{ $tanggal_pinjam }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                                <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian"
                                    value="{{ $tanggal_pengembalian }}" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary align-self-end">Cek
                                Ketersediaan</button>
                        </form>

                        <div class="mb-4 mt-3">
                            <input type="text" id="searchInput" class="form-control"
                                placeholder="Cari nama barang...">
                        </div>
                        <div class="container">
                            <div class="table-responsive">
                                <table id="barangTable" class="ketersediaan-table table table-striped">
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
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('barangTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td')[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        });
    </script>

    <link rel="stylesheet" href="{{ asset('css/ketersediaan.css') }}">
</x-app-layout>
