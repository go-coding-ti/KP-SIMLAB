<?php

namespace App\Http\Controllers\KetuaLab;

use App\Http\Controllers\Controller;
use App\progress_penyewaan;
use App\tb_bidang;
use App\tb_laboran;
use App\tb_laboratorium;
use App\tb_layanan;
use App\tb_peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use ZipArchive;

class KetuaLabPeminjamanController extends Controller
{
    public function index($id)
    {
        $check = tb_laboran::where('id_laboratorium', $id)->where('id_user', Auth::user()->id)->where('hak_akses', 'kepala lab')->first();
        if ($check) {
            $menuSidebar = Utilities::sideBarMenu();
            $data = tb_bidang::where('id_laboratorium', $id)->get();
            $arrayData = array();
            for ($i = 0; $i < count($data); $i++) {
                $arrayData[] = $data[$i]['id_bidang'];
            }
            $data = tb_layanan::whereIn('id_bidang', $arrayData)->get();
            for ($i = 0; $i < count($data); $i++) {
                $arrayData[] = $data[$i]['id_layanan'];
            }
            $lab = tb_laboratorium::where('id_laboratorium', $id)->first();
            $data = tb_peminjaman::whereIn('id_layanan', $arrayData)->with('relasiPeminjamanToLayanan', 'relasiPeminjamanToUser')->get();
            return view('KetuaLab.peminjaman', compact('menuSidebar', 'data', 'lab'));
        }
        return redirect()->back();
    }

    public function approval($id)
    {
        $approvalData = tb_peminjaman::find($id);
        $approvalData->keterangan = 4;
        progress_penyewaan::create([
            'id_peminjaman' => $approvalData->id_peminjaman,
            'progress_name' => 'Peminjaman Diterima',
            'progress_detail' => 'Peminjaman telah diterima oleh laboran, silahkan melakukan pembayaran',
        ]);
        $approvalData->save();
        Alert::success('Berhasil', 'Peminjaman berhasil diterima!');
        return redirect()->back();
    }

    public function refuse(Request $request)
    {
        $refuseData = tb_peminjaman::find($request->id_peminjaman);
        $refuseData->keterangan = 3;
        $refuseData->alasan = $request->alasan;
        $refuseData->save();
        Alert::info('Berhasil', 'Peminjaman berhasil ditolak!');
        return redirect()->back();
    }

    public function konfirmasiPembayaran($id)
    {
        $approvalData = tb_peminjaman::find($id);
        $approvalData->keterangan = 2;
        $approvalData->save();
        progress_penyewaan::create([
            'id_peminjaman' => $approvalData->id_peminjaman,
            'progress_name' => 'Pembayaran Dikonfirmasi dan diterima',
            'progress_detail' => 'Pembayaran peminjaman telah dikonfirmasi dan diterima oleh laboran',
        ]);
        Alert::success('Berhasil', 'Pembayaran telah berhasil diterima!');
        return redirect()->back();
    }

    public function menolakPembayaran(Request $request)
    {
        $approvalData = tb_peminjaman::find($request->id_peminjaman);
        $approvalData->keterangan = 3;
        $approvalData->alasan = $request->alasan;
        $approvalData->save();
        progress_penyewaan::create([
            'id_peminjaman' => $approvalData->id_peminjaman,
            'progress_name' => 'Pembayaran Ditolak oleh laboran',
            'progress_detail' => 'Pembayaran ditolak oleh laboran, silahkan tekan tombol Hubungi untuk menghubungi laboran',
        ]);
        Alert::success('Berhasil', 'Pembayaran telah berhasil diterima!');
        return redirect()->back();
    }

    public function pengerjaan($id)
    {
        $pengerjaan = tb_peminjaman::find($id);
        $pengerjaan->keterangan = 5;
        progress_penyewaan::create([
            'id_peminjaman'=> $pengerjaan->id_peminjaman,
            'progress_name'=>'Penyewaan dalam proses pengerjaan oleh laboran',
            'progress_detail'=>'Penyewaan dalam proses pengerjaan oleh laboran',
        ]);
        $pengerjaan->save();
        return redirect()->back()->with('success','Status penyewaan diupdate ke dalam proses pengerjaan!');
    }

    public function on_process($id)
    {
        $pengerjaan = tb_peminjaman::find($id);
        $pengerjaan->is_process = 1;
        progress_penyewaan::create([
            'id_peminjaman'=> $pengerjaan->id_peminjaman,
            'progress_name'=>'Penyewaan dalam proses pengecekan oleh laboran',
            'progress_detail'=>'Penyewaan dalam proses pengecekan oleh laboran, pengecekan memakan waktu 24/7 hari',
        ]);
        $pengerjaan->save();
        return redirect()->back()->with('success','Status penyewaan diupdate ke dalam proses pengecekan!');
    }

    public function perbaikan($id)
    {
        $pengerjaan = tb_peminjaman::find($id);
        $pengerjaan->is_process = 0;
        $pengerjaan->keterangan = 7;
        progress_penyewaan::create([
            'id_peminjaman'=> $pengerjaan->id_peminjaman,
            'progress_name'=>'Penyewaan diminta untuk perbaikan',
            'progress_detail'=>'Penyewaan diminta untuk perbaikan dikarenakan file yang diupload salah ataupun tidak dapat diidentifikasi',
        ]);
        $pengerjaan->save();
        return redirect()->back()->with('success','Status penyewaan diupdate ke dalam proses perbaikan!');
    }

    public function selesai(Request $request){
        $approvalData = tb_peminjaman::find($request->id_peminjaman);
        if($request->hasFile('file')){
            $zipName = time().'.zip';
            $folderName = time();
            $zip = new ZipArchive;
            $public_dir=public_path();

            //Membuat ZIP dan mengupload ZIP
            $zip->open($zipName, ZipArchive::CREATE);
            foreach ($request->file('file') as $file){
                $filename = $file->getClientOriginalName();
                $file->move(public_path().'/'.$folderName.'/', $filename);
                $zip->addFile($folderName.'/'.$filename);
            }
            $zip->close();
            $approvalData->file_hasil = $zipName;

            $approvalData->tgl_selesai = Carbon::now();
            $approvalData->keterangan = 6;
            //Cara Download ZIP
            /*            $headers = array('Content-Type: application/zip',);
                        return Response::download($zipName, 'hasil.zip',$headers);*/

            progress_penyewaan::create([
                'id_peminjaman' => $approvalData->id_peminjaman,
                'progress_name' => 'Penyewaan Laboratorium telah selesai',
                'progress_detail' => 'Pembayaran laboratorium telah selesai, file hasil dapat didownload pada tombol download',
            ]);
            $approvalData->save();
            return redirect()->back()->with('success','Penyewaan berhasil diselesaikan');
        }
        return redirect()->back()->with('errors','Terjadi kesalahan!');
    }
}
