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
                    <div class="container mt-5">
                        <h1 class="mb-4">Barang yang tersedia</h1>
                        
                        <!-- Search input -->
                        <div class="mb-4">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama barang...">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="barangTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th id="tipeHeader" style="cursor: pointer;">Tipe Barang &#x2193;</th> <!-- Clickable header for sorting -->
                                        <th id="jumlahHeader" style="cursor: pointer;">Jumlah Barang Tersedia &#x2193;</th> <!-- Clickable header for sorting -->
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barangs as $barang)
                                        <tr>
                                            <td class="nomor-urut"></td>
                                            <td>{{ $barang->nama_barang }}</td>
                                            <td>{{ $barang->tipe_barang }}</td>
                                            <td>{{ $barang->jumlah_barang_tersedia }}</td>
                                            <td>
                                                <a href="{{ route('editData', $barang->id_barang) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('deleteData', $barang->id_barang) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
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

    <!-- Add JavaScript for Search and Sorting Functionality -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('barangTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName('td')[1]; // Use the second column (Nama Barang)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }       
            }
            updateNomorUrut(); // Update the numbering after filtering
        });

        function sortTable(n, isNumeric = false) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById('barangTable');
            switching = true;
            dir = "asc"; // Set the sorting direction to ascending initially

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

            updateNomorUrut(); // Update the numbering after sorting

            var header = document.getElementsByTagName('th')[n];
            if (dir == "asc") {
                header.innerHTML = header.innerHTML.replace('&#x2193;', '&#x2191;').replace('&#x2191;', '&#x2193;');
            } else {
                header.innerHTML = header.innerHTML.replace('&#x2193;', '&#x2191;').replace('&#x2191;', '&#x2193;');
            }
        }

        document.getElementById('jumlahHeader').addEventListener('click', function() {
            sortTable(3, true); // Sorting based on the fourth column (Jumlah Barang Tersedia), numeric sorting
        });

        document.getElementById('tipeHeader').addEventListener('click', function() {
            sortTable(2, false); // Sorting based on the third column (Tipe Barang), string sorting
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
            updateNomorUrut(); // Update numbering when the page loads
        };
    </script>
</x-app-layout>
