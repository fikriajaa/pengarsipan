@extends('layouts.app')

@section('content')
<div class="flex">
    @include('layouts.sidebar') 

    <div class="flex-1 p-6 ml-64">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Arsip</h2>

            <!-- Error Handling -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Input -->
            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Arsip:</label>
                    <input type="text" name="nama" id="nama" required 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi:</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" required
                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori_id" class="block text-gray-700 font-semibold mb-2">Kategori:</label>
                    <select name="kategori_id" id="kategori_id" required 
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Upload File -->
                <div>
                    <label for="file" class="block text-gray-700 font-semibold mb-2">Upload File:</label>
                    <input type="file" name="file" id="file" required 
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                           <p class="text-sm text-red-600">Maksimal Ukuran File 5MB.</p>

                </div>

                <!-- Tombol Submit -->
                <div class="flex space-x-4">
                    <button type="submit" 
                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-300">
                        Simpan
                    </button>
                    <a href="{{ route('arsip.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-300">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
