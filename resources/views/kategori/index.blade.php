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

        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Daftar Kategori</h1>
                    <p class="text-gray-500">Dashboard > Data Kategori</p>
                </div>
                <a href="{{ route('kategori.create') }}" class="border border-gray-500 text-gray-500 px-4 py-2 rounded-lg hover:border-gray-700 hover:text-gray-700 transition">
                    + Tambah Kategori
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full rounded-lg shadow-md">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 w-12 text-center">No</th>
                            <th class="px-4 py-3">Nama</th>
                            <th class="px-4 py-3 w-24 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach ($kategori as $key => $item)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-4 py-3 text-center">{{ $key + 1 }}</td>
                                <td class="px-4 py-3">{{ $item->nama }}</td>
                                <td class="px-4 py-3 flex justify-center gap-3">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kategori.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m2-2a2.828 2.828 0 1 1 4 4l-10 10H7v-4l10-10z" />
                                        </svg>
                                    </a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
@endsection
