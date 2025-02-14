@extends('layouts.app')

@section('content')
<div class="flex">
    @include('layouts.sidebar')

    <div class="flex-1 p-6 ml-64">
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
        @endif

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold">Daftar Arsip</h1>
                <p class="text-gray-500">Dashboard > Data Arsip</p>
            </div>
            <a href="{{ route('arsip.create') }}" class="border border-gray-500 text-gray-500 px-4 py-2 rounded-lg hover:border-gray-700 hover:text-gray-700 transition">
                + Tambah Arsip
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg p-4">
            <div class="mb-4 flex items-center space-x-3">
                <!-- Search bar -->
                <input type="text" id="search" placeholder="Cari Arsip..."
                    class="flex-grow border border-gray-300 rounded px-3 py-2" />

                <!-- Dropdown filter kategori -->
                <select id="kategoriFilter" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoris as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endforeach
                </select>

                <!-- Dropdown filter validasi -->
                <select id="validasiFilter" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">Semua Status</option>
                    <option value="Tervalidasi">Tervalidasi</option>
                    <option value="Belum Validasi">Belum Validasi</option>
                </select>

                <!-- Tombol Filter -->
                <button id="filterButton" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Filter
                </button>
            </div>

            <table class="w-full border-collapse border border-gray-300" id="arsipTable">
                <thead class="bg-gray-200 text-black">
                    <tr>
                        <th class="py-3 px-4 border">No</th>
                        <th class="py-3 px-4 border">Nama</th>
                        <th class="py-3 px-4 border">Deskripsi</th>
                        <th class="py-3 px-4 border">Kategori</th>
                        <th class="py-3 px-4 border">User</th>
                        <th class="py-3 px-4 border">File</th>
                        <th class="py-3 px-4 border">Validasi</th> <!-- Tambahan Kolom Validasi -->
                        <th class="py-3 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arsip as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border">{{ $item->nama }}</td>
                        <td class="py-3 px-4 border">{{ $item->deskripsi }}</td>
                        <td class="py-3 px-4 border kategori">{{ $item->kategori->nama }}</td>
                        <td class="py-3 px-4 border">{{ $item->user->name ?? 'Tidak Diketahui' }}</td>
                        <td class="py-3 px-4 border">
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="text-blue-500 hover:underline">
                                Lihat File
                            </a>
                        </td>
                        <td class="py-3 px-4 border validasi">
                            @if ($item->validasi === 'Tervalidasi')
                                <span class="text-green-500 font-semibold">Tervalidasi</span>
                            @else
                                <span class="text-red-500 font-semibold">Belum Validasi</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 border flex space-x-2">
                            <a href="{{ route('arsip.edit', $item) }}" class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m2-2a2.828 2.828 0 1 1 4 4l-10 10H7v-4l10-10z" />
                                </svg>
                            </a>
                            <form action="{{ route('arsip.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus arsip ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search");
        const kategoriFilter = document.getElementById("kategoriFilter");
        const validasiFilter = document.getElementById("validasiFilter");
        const filterButton = document.getElementById("filterButton");
        const tableRows = document.querySelectorAll("#arsipTable tbody tr");

        function filterTable() {
            const searchValue = searchInput.value.toLowerCase();
            const kategoriValue = kategoriFilter.value.toLowerCase();
            const validasiValue = validasiFilter.value.toLowerCase();

            tableRows.forEach(row => {
                const namaArsip = row.children[1].textContent.toLowerCase();
                const kategoriArsip = row.querySelector(".kategori").textContent.toLowerCase();
                const validasiArsip = row.querySelector(".validasi").textContent.toLowerCase();

                const matchSearch = searchValue === "" || namaArsip.includes(searchValue);
                const matchKategori = kategoriValue === "" || kategoriArsip.includes(kategoriValue);
                const matchValidasi = validasiValue === "" || validasiArsip.includes(validasiValue);

                if (matchSearch && matchKategori && matchValidasi) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        searchInput.addEventListener("input", filterTable);
        filterButton.addEventListener("click", filterTable);
    });
</script>

@endsection
