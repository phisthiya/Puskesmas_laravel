<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\obats;
use App\pegawai;
use App\poli;
use App\TAN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application ~~dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::table('users')->get();
        return view('admin.dashboard', compact('sql'));
    }

    //fungsi dokter
    public function showDokter()
    {
        $sql = DB::table('dokters')->get();
        return view('admin.dokter', compact('sql'));
    }

    public function showEditDokterForm(Dokter $dokter)
    {
        return view('admin/editdokter', compact('dokter'));
    }

    public function updateDokter(Request $request, Dokter $dokter)
    {
        $dokter->update($request->all());
        Session::flash('update', 'Data berhasil diupdate!');
        return redirect('admin/dokter');
    }

    public function deleteDokter(Dokter $dokter)
    {
        $dokter->delete();
        Session::flash('delete', 'Data berhasil dihapus!');
        return back();
    }

    public function createDokter(Dokter $dokter)
    {
        return view('admin/createdokter');

    }

    public function storeDokter(Request $request)
    {
        $dokter = new dokters;
        $dokter->nama = $request->nama;
        $dokter->jk = $request->jk;
        $dokter->spesialis = $request->spesialis;
        $dokter->alamat = $request->alamat;
        $dokter->no_telp = $request->no_telp;
        $dokter->save();

        return redirect('/admin/dokter');
    }

    //Karyawan
    public function showKaryawan()
    {
        $sql = DB::table('pegawais')->get();
        return view('admin.karyawan', compact('sql'));
    }

    public function showEditKaryawanForm(pegawai $pegawai)
    {
        return view('admin/editkaryawan', compact('pegawai'));
    }

    public function updateKaryawan(Request $request, pegawai $pegawai)
    {
        $pegawai->update($request->all());
        Session::flash('update', 'Data berhasil diupdate!');
        return redirect('admin/karyawan');
    }

    public function deleteKaryawan(pegawai $pegawai)
    {
        $pegawai->delete();
        Session::flash('delete', 'Data berhasil dihapus!');
        return back();
    }

    //fungsi obat
    public function create()
    {
        return view('admin/c_obat');
    }

    public function store(Request $request)
    {
        $obat = new obats;
        $obat->nama = $request->nama;
        $obat->jenis = $request->jenis;
        $obat->stok = $request->stok;
        $obat->fungsi = $request->fungsi;
        $obat->berat = $request->berat;
        $obat->save();

        return redirect('/obat');
    }

    public function editobat($id)
    {
        $obat = obats::find($id);

        return view('admin/editobat', compact('obat'));
    }

    public function updateobat(Request $request, $id)
    {
        $obat = obats::find($id);
        $obat->nama = $request->nama;
        $obat->jenis = $request->jenis;
        $obat->stok = $request->stok;
        $obat->fungsi = $request->fungsi;
        $obat->berat = $request->berat;
        $obat->save();


        return redirect('obat');
    }

    public function delobat(obats $id)
    {
        $id->delete();
        return redirect('obat');
    }

    public function showObat()
    {
        $sql = DB::table('obats')->get();
        return view('admin.obat', compact('sql'));
    }

    //poli umum
    public function showUmum(TAN $TAN)
    {
        $sql = DB::table('t_a_ns')->where('namapoli', 'umum')->get();
        return view('admin.umum', compact('sql'));
    }

    public function showEditUmumForm(TAN $TAN)
    {
        return view('admin/editumum', compact('TAN'));
    }

    public function updateUmum(Request $request, TAN $TAN)
    {
        $TAN->update($request->all());
        Session::flash('update', 'Data berhasil diupdate!');
        return redirect('admin/umum');
    }

    public function showGigi()
    {
        $sql = DB::table('t_a_ns')->where('namapoli', 'gigi')->get();
        return view('admin.gigi', compact('sql'));
    }

    public function showInap()
    {
        $sql = DB::table('t_a_ns')->get();
        return view('admin.obat', compact('sql'));
    }

    public function showJalan()
    {
        $sql = DB::table('t_a_ns')->get();
        return view('admin.obat', compact('sql'));
    }

    public function showKia()
    {
        $sql = DB::table('t_a_ns')->where('namapoli', 'kia')->get();
        return view('admin.kia', compact('sql'));
    }

    public function showLansia()
    {
        $sql = DB::table('t_a_ns')->where('namapoli', 'lansia')->get();
        return view('admin.lansia', compact('sql'));
    }

    public function showRujukan()
    {
        $sql = DB::table('rujukan')->get();
        return view('admin.rujukan', compact('sql'));
    }
}
