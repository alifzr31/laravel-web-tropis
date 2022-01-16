<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',
            'judul'     => 'required',
            'short_desc' => 'required',
            'konten'   => 'required'
        ]);

        //upload gambar
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/beritas', $gambar->hashName());

        $berita = Berita::create([
            'gambar'     => $gambar->hashName(),
            'judul'     => $request->judul,
            'short_desc' => $request->short_desc,
            'konten'   => $request->konten
        ]);

        if($berita){
            //redirect dengan pesan sukses
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('berita.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'=>'required',
            'short_desc'=>'required',
            'konten'=>'required'
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->file('gambar') == "") {
            $berita->update([
                'judul' => $request->judul,
                'short_desc' => $request->short_desc,
                'konten' => $request->konten
            ]);
        } else {
            Storage::disk('local')->delete('public/beritas/'.$berita->gambar);

            $gambar = $request->file('gambar');
            $gambar->storeAs('public/beritas', $gambar->hashName());

            $berita->update([
                'gambar'=>$gambar->hashName(),
                'judul' => $request->judul,
                'short_desc' => $request->short_desc,
                'konten' => $request->konten
            ]);
        }

        if($berita){
            //redirect dengan pesan sukses
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Diubah!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('berita.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    public function destroy($id)
    {
    $berita = Berita::findOrFail($id);
    Storage::disk('local')->delete('public/beritas/'.$berita->gambar);
    $berita->delete();

    if($berita){
        //redirect dengan pesan sukses
        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('berita.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
