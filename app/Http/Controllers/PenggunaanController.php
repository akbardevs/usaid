<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penggunaan;
use App\Donor;
use Yajra\DataTables\Contracts\DataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Redirect,Response;

class PenggunaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = Penggunaan::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $action = '<a class="btn btn-success btn-sm" id="edit-penggunaan" data-toggle="modal" data-id='.$row->id.' title="Edit"><i class="far fa-edit"></i> </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-penggunaan" data-id='.$row->id.' class="btn btn-danger delete-penggunaan btn-sm" title="Hapus"><i class="far fa-trash-alt"></i> </a>';

                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        // Data Terpakai
        $terpakai = Penggunaan::all();
        $ap = 0;
            $am = 0;
            $bp = 0;
            $bm = 0;
            $abp = 0;
            $abm = 0;
            $op = 0;
            $om = 0;
        foreach ($terpakai as $value) {
            
            if ($value->gol_darah == 'A+') {
                $ap = $ap + $value->jumlah;
            } else if ($value->gol_darah == 'A-') {
                $am = $am + $value->jumlah;
            } else if ($value->gol_darah == 'B+') {
                $bp = $bp + $value->jumlah;
            } else if ($value->gol_darah == 'B-') {
                $bm = $bm + $value->jumlah;
            } else if ($value->gol_darah == 'AB+') {
                $abp = $abp + $value->jumlah;
            } else if ($value->gol_darah == 'AB-') {
                $abm = $abm + $value->jumlah;
            } else if ($value->gol_darah == 'O+') {
                $op = $op + $value->jumlah;
            } else {
                $om = $om + $value->jumlah;
            }
            
        }
        $terpakais = array('ap' => $ap, 'am' => $am, 'bp' => $bp, 'bm' => $bm, 'abp' => $abp, 
        'abm' => $abm, 'op' => $op,'om' => $om);


        //Data Tersedia
        $donor = Donor::all();
        $tap = 0;
            $tam = 0;
            $tbp = 0;
            $tbm = 0;
            $tabp = 0;
            $tabm = 0;
            $top = 0;
            $tom = 0;
        foreach ($donor as $value) {
            
            if ($value->pendonor->gol_darah == 'A+') {
                $tap = $tap + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'A-') {
                $tam = $tam + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'B+') {
                $tbp = $tbp + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'B-') {
                $tbm = $tbm + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'AB+') {
                $tabp = $tabp + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'AB-') {
                $tabm = $tabm + $value->jumlah;
            } else if ($value->pendonor->gol_darah == 'O+') {
                $top = $top + $value->jumlah;
            } else {
                $tom = $tom + $value->jumlah;
            }
            
        }
        $tersedias = array('ap' => $tap, 'am' => $tam, 'bp' => $tbp, 'bm' => $tbm, 'abp' => $tabp, 
        'abm' => $tabm, 'op' => $top,'om' => $tom);






        return view('penggunaan.penggunaan',[
            'terpakais' => $terpakais,
            'tersedias' => $tersedias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'jumlah' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            
            

        ]);

        
            
            $penggunaan= new Penggunaan;
            $penggunaan->jumlah = $request->jumlah;
            $penggunaan->nama = $request->nama;
            $penggunaan->alamat = $request->alamat;
            $penggunaan->gol_darah = $request->gol_darah;
            $penggunaan->save();
           
            
            
            
            Alert::success('Selamat','Data Berhasil Di tambahkan');
           
            

            
        
        return redirect()->route('penggunaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $penggunaan = Penggunaan::where($where)->first();
        return Response::json($penggunaan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $r=  $request->validate([
            'jumlah' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'gol_darah' => 'required',
            
            

        ]);
        $uId = $request->penggunaan_id;
        
        
            
            Penggunaan::where('id', $uId)->update(['jumlah' => $request->jumlah, 'nama' => $request->nama,
             'alamat' => $request->alamat, 'gol_darah' => $request->gol_darah]);
            Alert::success('Selamat','Data Berhasil Di Edit');
        
        return redirect()->route('penggunaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penggunaan = Penggunaan::where('id', $id)->delete();
        return Response::json($penggunaan);
    }
}
