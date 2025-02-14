<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {

            $totalPengguna = User::count();
            $totalKategori = Kategori::count();
            $totalArsip = Arsip::count();
        
            return view('dashboard.admin', compact('totalPengguna', 'totalKategori', 'totalArsip'));

        } elseif ($user->role === 'dosen') {

            $totalPengguna = User::count();
            $totalKategori = Kategori::count();
// Mengambil total arsip berdasarkan user_id
$totalArsip = Arsip::where('user_id', auth()->id())->count();
        
            return view('dashboard.dosen', compact('totalPengguna', 'totalKategori', 'totalArsip'));
        } elseif ($user->role === 'mahasiswa') {

             $totalPengguna = User::count();
            $totalKategori = Kategori::count();
// Mengambil total arsip berdasarkan user_id
$totalArsip = Arsip::where('user_id', auth()->id())->count();
        
            return view('dashboard.mahasiswa', compact('totalPengguna', 'totalKategori', 'totalArsip'));
        }

        return abort(403, 'Unauthorized');
    }
}
