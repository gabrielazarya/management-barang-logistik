<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Konfirmasi Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        {{ __('Daftar Peminjaman yang Perlu Dikonfirmasi') }}
                    </h3>
                    @if (session('success'))
                        <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mt-4 p-4 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="mt-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID Pinjam</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User ID</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Peminjam</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID Barang</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Barang</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jumlah Barang</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal Pinjam</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal Pengembalian</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($borrowedItems as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->id_pinjam }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->user->user_id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->id_barang }}
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->barang->nama_barang }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->jumlah_barang_dipinjam }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->tanggal_pinjam }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->tanggal_pengembalian }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->status }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <form
                                                    action="{{ route('confirmBorrowing', ['id' => $item->id_pinjam]) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                                </form>
                                                <form
                                                    action="{{ route('rejectBorrowing', ['id' => $item->id_pinjam]) }}"
                                                    method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Tolak</button>
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
</x-app-layout>
