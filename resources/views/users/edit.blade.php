@extends('layouts.app')

@section('content')
<div class="flex">
    @include('layouts.sidebar')

    <div class="flex-1 p-6 lg:ml-64 ml-16 transition-all">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">Edit User</h2>

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
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Nama:</label>
                    <input type="text" name="name" value="{{ $user->name }}" 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 transition" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Email:</label>
                    <input type="email" name="email" value="{{ $user->email }}" 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 transition" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Password (Kosongkan jika tidak ingin diubah):</label>
                    <input type="password" name="password" 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 transition">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold">Role:</label>
                    <select name="role" 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 transition">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="dosen" {{ $user->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                        <option value="mahasiswa" {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                    </select>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition">
                        💾 Update
                    </button>
                    <a href="{{ route('users.index') }}" 
                       class="px-6 py-3 bg-gray-500 text-white font-semibold rounded-lg hover:bg-gray-600 transition">
                        ❌ Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
