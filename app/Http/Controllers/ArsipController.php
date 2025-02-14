<?php
namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{


    public function index()
    {
        $kategoris = Kategori::all();
        
        if (Auth::user()->role == 'mahasiswa' || Auth::user()->role == 'dosen') {
            // Jika mahasiswa atau dosen, hanya tampilkan arsip miliknya
            $arsip = Arsip::with('user', 'kategori')
                          ->where('user_id', Auth::id()) // Filter berdasarkan user yang login
                          ->latest()
                          ->get();
        } else {
            // Jika role adalah admin, tampilkan semua arsip
            $arsip = Arsip::with('user', 'kategori')
                          ->latest()
                          ->get();
        }
        
    
        return view('arsip.index', compact('arsip', 'kategoris'));
    }


    public function create()
    {
        $kategoris = Kategori::all();
        return view('arsip.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'kategori_id' => 'required|exists:kategori,id',
            'file' => 'required|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,mp4,mov,avi'
        ]);

        $filePath = $request->file('file')->store('berkas', 'public');

        Arsip::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
            'user_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan.');
    }

    public function edit(Arsip $arsip)
    {
        $kategoris = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategoris'));
    }

    public function update(Request $request, Arsip $arsip)
    {

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'kategori_id' => 'required|exists:kategori,id',
            'file' => 'nullable|file|max:5120|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png,mp4,mov,avi'
        ]);

        if ($request->hasFile('file')) {
            Storage::delete('public/' . $arsip->file);
            $arsip->file = $request->file('file')->store('berkas', 'public');
        }

        $arsip->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy(Arsip $arsip)
    {
        Storage::delete('public/' . $arsip->file);
        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }
    public function validasi($id)
{
    $arsip = Arsip::findOrFail($id);
    $arsip->validasi = 'Tervalidasi';
    $arsip->save();

    return redirect()->back()->with('success', 'Arsip berhasil divalidasi.');
}

}
