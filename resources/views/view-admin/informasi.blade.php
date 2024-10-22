<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Session flash for success messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Session flash for delete messages -->
                    @if(session('delete'))
                        <div class="alert alert-danger">
                            {{ session('delete') }}
                        </div>
                    @endif
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ __('Keseluruhan Data Barang Logistik') }}
                    </h3>
                    <div class="container mt-4">
                        <form class="ketersediaan-form" method="GET" action="{{ route('informasi') }}">
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

                            <button type="submit" class="btn btn-sm btn-primary align-self-end">Cek Ketersediaan</button>
                        </form>

                        <div class="mb-4">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama barang...">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="barangTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th id="tipeHeader" style="cursor: pointer;">Tipe Barang</th>
                                        <th id="jumlahHeader" style="cursor: pointer;">Jumlah Barang Tersedia</th>
                                        <th id="jumlahstockHeader" style="cursor: pointer;">Total Barang</th> 
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td class="nomor-urut"></td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->tipe_barang }}</td>
                                            <td>{{ $item->jumlah_tersedia }}</td>
                                            <td>{{ $item->jumlah_barang_tersedia }}</td> <!-- Display total stock -->
                                            <td>
                                                <a href="{{ route('editData', $item->id_barang) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('deleteData', $item->id_barang) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
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
            updateNomorUrut();
        });

        function sortTable(n, isNumeric = false) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById('barangTable');
            switching = true;
            dir = "asc";

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName('td')[n];
                    y = rows[i + 1].getElementsByTagName('td')[n];

                    if (isNumeric) {
                        if (dir == "asc") {
                            if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    } else {
                        if (dir == "asc") {
                            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        } else if (dir == "desc") {
                            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                shouldSwitch = true;
                                break;
                            }
                        }
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }

            updateNomorUrut();

            var header = document.getElementsByTagName('th')[n];
            if (dir == "asc") {
                header.innerHTML = header.innerHTML.replace('&#x2193;', '&#x2191;').replace('&#x2191;', '&#x2193;');
            } else {
                header.innerHTML = header.innerHTML.replace('&#x2193;', '&#x2191;').replace('&#x2191;', '&#x2193;');
            }
        }

        document.getElementById('jumlahstockHeader').addEventListener('click', function() {
            sortTable(3, true);
        });
        
        document.getElementById('jumlahHeader').addEventListener('click', function() {
            sortTable(3, true);
        });

        document.getElementById('tipeHeader').addEventListener('click', function() {
            sortTable(2, false);
        });

        function updateNomorUrut() {
            var table, rows, i, counter = 1;
            table = document.getElementById('barangTable');
            rows = table.getElementsByTagName('tr');
            for (i = 1; i < rows.length; i++) {
                if (rows[i].style.display !== 'none') {
                    rows[i].getElementsByTagName('td')[0].innerHTML = counter;
                    counter++;
                }
            }
        }

        window.onload = function() {
            updateNomorUrut();
        };
    </script>

<link rel="stylesheet" href="{{ asset('css/ketersediaan.css') }}">
</x-app-layout>

