@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

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

    <!-- Konten Utama -->
    <div class="flex-1 p-6 ml-64">
        <!-- Header (Judul + Tombol Tambah User) -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-bold">Daftar Pengguna</h1>
                <p class="text-gray-500">Dashboard > Data User</p>
            </div>
            <a href="{{ route('users.create') }}" class="border border-gray-500 text-gray-500 px-4 py-2 rounded-lg hover:border-gray-700 hover:text-gray-700 transition">
                + Tambah User
            </a>
        </div>

        <!-- Background Putih -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Search Bar + Filter -->
            <div class="mb-4 flex items-center space-x-3">
                <!-- Search bar yang lebih panjang -->
                <input type="text" id="search" placeholder="Cari pengguna..."
                    class="flex-grow border border-gray-300 rounded px-3 py-2" />

                <!-- Dropdown filter role -->
                <select id="roleFilter" class="border border-gray-300 rounded px-3 py-2">
                    <option value="">Semua Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                    <option value="Dosen">Dosen</option>
                </select>

                <!-- Tombol Filter -->
                <button id="filterButton" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    Filter
                </button>
            </div>

            <!-- Tabel -->
            <div class="overflow-hidden rounded-lg border border-gray-200">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-200 text-black">
                        <tr>
                            <th class="p-3">Nomor</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" id="userTable">
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">{{ $user->role }}</td>
                            <td class="p-3 text-center">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:text-blue-700 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m2-2a2.828 2.828 0 1 1 4 4l-10 10H7v-4l10-10z" />
                                    </svg>
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 mx-2">
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
</div>

<!-- Script Search & Filter -->
<script>
    document.getElementById('search').addEventListener('keyup', filterUsers);
    document.getElementById('filterButton').addEventListener('click', filterUsers);

    function filterUsers() {
        let searchValue = document.getElementById('search').value.toLowerCase();
        let roleValue = document.getElementById('roleFilter').value.toLowerCase();
        let rows = document.querySelectorAll("#userTable tr");

        rows.forEach(row => {
            let name = row.children[1].textContent.toLowerCase();
            let email = row.children[2].textContent.toLowerCase();
            let role = row.children[3].textContent.toLowerCase();

            let matchesSearch = name.includes(searchValue) || email.includes(searchValue);
            let matchesRole = roleValue === "" || role.includes(roleValue);

            row.style.display = (matchesSearch && matchesRole) ? "" : "none";
        });
    }
</script>
@endsection