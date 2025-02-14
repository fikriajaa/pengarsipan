@extends('layouts.app')

@section('content')
<div class="flex">
    @include('layouts.sidebar')

    <div class="flex-1 p-6 ml-64">
        <h2 class="text-2xl font-bold mb-4">Edit Arsip</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <!-- Nama Arsip -->
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Arsip:</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $arsip->nama) }}" 
                       class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"
                          class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">{{ old('deskripsi', $arsip->deskripsi) }}</textarea>
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="kategori_id" class="block text-gray-700 font-bold mb-2">Kategori:</label>
                <select name="kategori_id" id="kategori_id" 
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $arsip->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- File -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">File Arsip:</label>
                @if ($arsip->file)
                    <p class="mb-2"><a href="{{ asset('storage/' . $arsip->file) }}" target="_blank" class="text-blue-500 hover:underline">Lihat File Lama</a></p>
                @endif
                <input type="file" name="file" class="w-full p-2 border border-gray-300 rounded-lg">
                <p class="text-sm text-gray-600">Kosongkan jika tidak ingin mengubah file.</p>
            </div>

            <!-- Tombol Submit -->
            <div class="flex space-x-4">
                <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Simpan Perubahan
                </button>
                <a href="{{ route('arsip.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
