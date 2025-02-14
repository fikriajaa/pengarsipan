@extends('layouts.app')

@section('content')
<div class="flex">
    @include('layouts.sidebar')

    <div class="flex-1 p-6 ml-64">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-lg mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Tambah Kategori</h1>
            
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">Nama Kategori:</label>
                    <input type="text" name="nama" id="nama" required class="border border-gray-300 p-2 rounded w-full focus:ring-2 focus:ring-gray-500 focus:border-gray-500">
                </div>

                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-600 transition duration-300 w-full">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
