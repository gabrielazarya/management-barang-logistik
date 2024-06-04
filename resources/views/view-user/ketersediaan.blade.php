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
                                            <th>NO</th>
                                            <th>Nama Barang</th>
                                            <th id="tipeHeader" style="cursor: pointer;">Tipe Barang</th>
                                            <th id="jumlahHeader" style="cursor: pointer;">Jumlah Barang Tersedia</th>
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
