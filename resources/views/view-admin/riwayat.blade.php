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
                    <div class="overflow-x-auto">
                        <table class="table-responsive min-w-full divide-y divide-gray-200 mt-2">
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
                                @foreach ($pinjams as $pinjam)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->id_pinjam }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->barang->id_barang }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $pinjam->barang->nama_barang }}
                                        </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
