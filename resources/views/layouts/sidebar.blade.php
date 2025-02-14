<div class="w-64 h-screen bg-gray-900 text-white p-4 fixed top-0 left-0 shadow-lg flex flex-col">
    <!-- Logo/Admin Panel -->
    <div class="flex items-center space-x-2 mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.5-2 1.5-2 3s2 1.5 2 3 2-1.5 2-3-2-1.5-2-3z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.44c0 4.51-3.59 8.06-8.01 8.06-4.42 0-8.01-3.55-8.01-8.06C4.98 7.93 8.57 4.38 12.99 4.38c4.42 0 8.01 3.55 8.01 8.06z" />
        </svg>
        <h2 class="text-xl font-semibold">Dashboard</h2>
    </div>

    <!-- Menu -->
    <ul class="space-y-2 flex-1">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
            <svg class="w-[30px] h-[30px] text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
</svg>


                <span>Dashboard</span>
            </a>
        </li>
        
        @php
            $userRole = Auth::user()->role;
        @endphp

        <!-- Manajemen User (hanya untuk role tertentu) -->
        @if($userRole !== 'mahasiswa' && $userRole !== 'dosen')
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                <svg class="w-[30px] h-[30px] text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
</svg>


                    <span>Manajemen User</span>
                </a>
            </li>
        @endif

        <!-- Kategori -->
        <li>
            <a href="{{ route('kategori.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
            <svg class="w-[30px] h-[30px] text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
</svg>


                <span>Kategori</span>
            </a>
        </li>

        <!-- Arsip -->
        <li>
            <a href="{{ route('arsip.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
            <svg class="w-[30px] h-[30px] text-white-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M5 4a2 2 0 0 0-2 2v1h10.968l-1.9-2.28A2 2 0 0 0 10.532 4H5ZM3 19V9h18v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm9-8.5a1 1 0 0 1 1 1V13h1.5a1 1 0 1 1 0 2H13v1.5a1 1 0 1 1-2 0V15H9.5a1 1 0 1 1 0-2H11v-1.5a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
</svg>


                <span>Arsip</span>
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
