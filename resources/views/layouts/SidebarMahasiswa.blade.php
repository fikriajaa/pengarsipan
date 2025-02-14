<div class="w-64 h-screen bg-gray-900 text-white p-4 fixed top-0 left-0 shadow-lg flex flex-col">
    <!-- Logo/Admin Panel -->
    <div class="flex items-center space-x-2 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.5-2 1.5-2 3s2 1.5 2 3 2-1.5 2-3-2-1.5-2-3z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.44c0 4.51-3.59 8.06-8.01 8.06-4.42 0-8.01-3.55-8.01-8.06C4.98 7.93 8.57 4.38 12.99 4.38c4.42 0 8.01 3.55 8.01 8.06z" />
        </svg>
        <h2 class="text-xl font-semibold">Admin Panel</h2>
    </div>

    <!-- Menu -->
    <ul class="space-y-2 flex-1">
        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10z" />
                </svg>
                <span>Dashboard</span>
            </a>
        </li>
        
        
        <li>
            <a href="{{ route('arsip.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 0 1 9 14h6a4 4 0 0 1 3.879 3.804M7 9a4 4 0 1 1 8 0m5 10a9 9 0 1 0-18 0" />
                </svg>
                <span>Arsip</span>
            </a>
        </li>
        <li>
            <a href="{{ route('kategori.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 0 1 9 14h6a4 4 0 0 1 3.879 3.804M7 9a4 4 0 1 1 8 0m5 10a9 9 0 1 0-18 0" />
                </svg>
                <span>Kategori</span>
            </a>
        </li>
    </ul>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="flex items-center space-x-3 w-full text-left p-3 rounded-lg hover:bg-red-600 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            <span>Logout</span>
        </button>
    </form>
</div>
