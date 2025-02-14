@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Konten Utama -->
    <div class="flex-1 p-6 ml-64">
       <!-- Header Dashboard -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-4xl font-bold">Dashboard Mahasiswa</h1>
            <a href="{{ route('arsip.index') }}" class="border border-gray-500 text-gray-500 px-4 py-2 rounded-lg shadow-md hover:bg-gray-100 transition"> Tambahkan Arsip</a>
        </div>

        <!-- Waktu Sekarang (Status Server) and Statistik Boxes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <!-- Status Server -->
            <div class="bg-gray-900 text-white p-6 rounded-lg shadow-md flex justify-center items-center text-center 
             transition duration-300 transform hover:scale-105 hover:shadow-lg">
                <div>
                    <p class="text-lg text-gray-400">Status Server</p>
                    <div class="text-2xl font-semibold text-green-500">Online</div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
                <h2 class="text-xl font-bold">Total Arsip</h2>
                <p class="text-gray-600">{{ number_format($totalArsip) }}</p>
            </div>
            <!-- Statistik Boxes (Total Kategori & Total Arsip) -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
                <h2 class="text-xl font-bold">Total Kategori</h2>
                <p class="text-gray-600">{{ number_format($totalKategori) }}</p>
            </div>

         
        </div>

        <!-- GIF + Grafik Statistik (Stack vertically on small screens, horizontally on larger screens) -->
        <div class="flex flex-col lg:flex-row gap-6 mt-6">
            <!-- Grafik Statistik -->
            <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-md flex flex-col items-center mb-6 lg:mb-0">
                <h2 class="text-xl font-bold mb-4">Grafik Statistik</h2>
                <div class="w-full h-64">
                    <canvas id="chartContainer"></canvas>
                </div>
            </div>

            <!-- GIF -->
            <div class="w-full lg:w-1/2 flex justify-center">
                <img src="{{ asset('images/dashboard.gif') }}" alt="Dashboard Animation" class="w-full h-64 max-w-md rounded-lg shadow-md">
            </div>
        </div>

    </div>
</div>

<!-- Script untuk Jam Realtime -->
<script>
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString();
        document.getElementById('clock').innerText = timeString;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

<!-- Script untuk Grafik Statistik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById("chartContainer").getContext("2d");

        // Ambil data dari Laravel Blade
        var totalKategori = {{ $totalKategori }};
        var totalBerita = {{ $totalArsip }};

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: [ "Kategori", "Berita"],
                datasets: [{
                    label: "Total Data",
                    data: [ totalKategori, totalBerita], // Data diambil dari Laravel
                    backgroundColor: [ "#10B981", "#F59E0B"],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: Math.ceil(Math.max( totalKategori, totalBerita) / 5) // Agar skala dinamis
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

@endsection
