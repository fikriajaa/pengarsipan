@extends('layouts.app')

@section('content')
<div class="flex">
    @include('layouts.sidebar')

    <div class="flex-1 p-6 ml-64">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Tambah User</h1>

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

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold">Nama:</label>
                        <input type="text" name="name" id="name" required class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                        <input type="email" name="email" id="email" required class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-semibold">Password:</label>
                        <input type="password" name="password" id="password" required class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    <div>
                        <label for="role" class="block text-gray-700 font-semibold">Role:</label>
                        <select name="role" id="role" class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                            <option value="admin">Admin</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="mt-6 bg-gray-500 text-white px-6 py-2 rounded shadow hover:bg-gray-600 transition duration-300">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
