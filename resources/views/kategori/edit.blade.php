@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Konten Utama --}}
    <div class="flex-1 p-8 bg-gray-100">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Edit Kategori</h1>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <strong>Error!</strong> Periksa kembali input Anda.
                    <ul class="list-disc ml-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Kategori:</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $kategori->nama) }}" 
                        class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500" required>
                </div>

                <button type="submit" class="w-full bg-gray-600 text-white px-4 py-2 mt-2 rounded-lg hover:bg-gray-700 transition">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
