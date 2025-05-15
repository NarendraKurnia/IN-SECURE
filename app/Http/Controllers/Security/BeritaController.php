<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Berita_model;
use App\Models\Unit;

class BeritaController extends Controller
{
    // index
    public function index(Request $request)
    {
        $query = Berita_model::with('unit')->orderBy('id_berita', 'DESC');

        if ($request->has('keywords')) {
            $keywords = $request->keywords;
            $query->where(function($q) use ($keywords) {
                $q->where('judul', 'like', "%{$keywords}%")
                  ->orWhere('isi', 'like', "%{$keywords}%");
            });
        }

        $berita = $query->paginate(10);

        $data = [ 
            'title'   => 'Data Berita',
            'berita'  => $berita,
            'unit'    => null, // tidak perlu lagi ambil unit berdasarkan session
            'content' => 'security/berita/index'
        ];

        return view('security/layout/wrapper', $data);
    }
    // tambah
    public function tambah()
    {
        $units = Unit::select('id_unit', 'nama')->get();

        $data = [
            'title'   => 'Tambah Data Berita',
            'units'   => $units,
            'content' => 'security/berita/tambah'
        ];
        return view('security/layout/wrapper', $data);
    }
    // Proses tambah
    public function proses_tambah(Request $request)
    {
        $m_berita = new Berita_model();

        $request->validate([
            'judul'   => 'required',
            'isi'     => 'required',
            'gambar'  => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
            'unit_id' => 'required|exists:units,id_unit'
        ]);

        $image = $request->file('gambar');

        if ($image) {
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $input['nama_file'] = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'admin/upload/berita/';
            $image->move($destinationPath, $input['nama_file']);

            $data = [
                'judul'     => $request->judul,
                'isi'       => $request->isi,
                'unit_id'   => $request->unit_id,
                'gambar'    => $input['nama_file']
            ];
        } else {
            $data = [
                'judul'     => $request->judul,
                'isi'       => $request->isi,
                'unit_id'   => $request->unit_id
            ];
        }

        $m_berita->tambah($data);
        return redirect('security/berita')->with(['sukses' => 'Data Telah Ditambah']);
    }
    // edit
    public function edit($id_berita)
    {
        $m_berita = new Berita_model();
        $berita   = $m_berita->detail($id_berita);

        $units = Unit::select('id_unit', 'nama')->get();

        $data = [
            'title'   => 'Edit Berita',
            'berita'  => $berita,
            'units'   => $units,
            'content' => 'security/berita/edit'
        ];

        return view('security/layout/wrapper', $data);
    }
    // proses edit
    public function proses_edit(Request $request)
    {
        $m_berita = new Berita_model();

        $request->validate([
            'judul'    => 'required',
            'isi'      => 'required',
            'unit_id'  => 'required|exists:units,id_unit',
            'gambar'   => 'nullable|file|image|mimes:jpeg,png,jpg|max:8024',
        ]);

        $id_berita = $request->id_berita;
        $image     = $request->file('gambar');

        $data = [
            'id_berita' => $id_berita,
            'judul'     => $request->judul,
            'isi'       => $request->isi,
            'unit_id'   => $request->unit_id,
        ];

        if ($image) {
            $old = $m_berita->detail($id_berita);
            if (!empty($old->gambar)) {
                $oldPath = public_path('admin/upload/berita/' . $old->gambar);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $filename  = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $nama_file = Str::slug($filename, '-') . '-' . time() . '.' . $image->getClientOriginalExtension();
            $destPath  = public_path('admin/upload/berita/');
            $image->move($destPath, $nama_file);

            $data['gambar'] = $nama_file;
        }

        $m_berita->edit($data);
        return redirect('security/berita')->with(['sukses' => 'Data Telah Diedit']);
    }
    // delete
    public function delete($id)
    {
        $m_berita = new Berita_model();
        $data = ['id_berita' => $id];
        $m_berita->hapus($data);   

        return redirect('security/berita')->with(['sukses' => 'Data Telah Dihapus']);
    }
}
