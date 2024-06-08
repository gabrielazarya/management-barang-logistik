<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Peminjaman Semua Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ __('Riwayat Peminjaman Semua Pengguna') }}
                    </h3>



                    <div class="container mt-4">
                        <!-- Search input -->
                        <div class="mb-4">
                            <input type="text" id="searchInput" class="form-control"
                                placeholder="Cari nama ID / Nama pengguna / Nama barang...">
                        </div>
                        <!-- Date pickers and search button -->
                        <div class="mb-4 ">
                            <div class="form-group">
                                <label for="startDate">Tanggal Pinjam:</label>
                                <input type="date" id="startDate" class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label for="endDate" class="ml-4" style="margin: 0px;">Tanggal Pengembalian:</label>
                                <input type="date" id="endDate" class="form-control"><br>
                            </div>

                            <button id="checkAvailability" class="btn btn-primary ml-4">Cek Riwayat</button>
                        </div>
                    </div>



                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-responsive min-w-full divide-y divide-gray-200 mt-2" id="peminjamanTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Peminjaman</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Pengguna</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Pengguna</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID Barang</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Barang</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Jumlah</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pinjam</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tanggal Pengembalian</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($pinjams as $index => $pinjam)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->id_pinjam }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->user_id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->barang->id_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->barang->nama_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->jumlah_barang_dipinjam }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->tanggal_pinjam }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->tanggal_pengembalian }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pinjams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input, filter, table, tr, tdBarang, i, txtValueBarang;
            input = document.getElementById('searchInput');
            filter = input.value.toLowerCase();
            table = document.getElementById('peminjamanTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                tdBarang = tr[i].getElementsByTagName('td')[5];
                if (tdBarang) {
                    txtValueBarang = tdBarang.textContent || tdBarang.innerText;
                    if (txtValueBarang.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
            updateNomorUrut();
        });

        document.getElementById('checkAvailability').addEventListener('click', function() {
            var startDate, endDate, table, tr, tdPinjam, tdPengembalian, i, txtValuePinjam, txtValuePengembalian;
            startDate = new Date(document.getElementById('startDate').value);
            endDate = new Date(document.getElementById('endDate').value);
            table = document.getElementById('peminjamanTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                tdPinjam = tr[i].getElementsByTagName('td')[7];
                tdPengembalian = tr[i].getElementsByTagName('td')[8];
                if (tdPinjam && tdPengembalian) {
                    txtValuePinjam = new Date(tdPinjam.textContent || tdPinjam.innerText);
                    txtValuePengembalian = new Date(tdPengembalian.textContent || tdPengembalian.innerText);
                    if ((txtValuePinjam >= startDate && txtValuePinjam <= endDate) || (txtValuePengembalian >=
                            startDate && txtValuePengembalian <= endDate)) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
            updateNomorUrut();
        });

        function updateNomorUrut() {
            var table, rows, i, counter = 1;
            table = document.getElementById('peminjamanTable');
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
</x-app-layout>
