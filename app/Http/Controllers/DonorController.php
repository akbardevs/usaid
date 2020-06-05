<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;
use App\Pendonor;
use Yajra\DataTables\Contracts\DataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Redirect,Response;

class DonorController extends Controller
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
            $data = Donor::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->editColumn('pendonor_id', function($row){
                return $row->pendonor->nama;
            })
            ->addColumn('gol_darah', function($row){
                return $row->pendonor->gol_darah;
            })
            ->addColumn('action', function ($row) {
                $action = '<a class="btn btn-success btn-sm" id="edit-donor" data-toggle="modal" data-id='.$row->id.' title="Edit"><i class="far fa-edit"></i> </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-donor" data-id='.$row->id.' class="btn btn-danger delete-donor btn-sm" title="Hapus"><i class="far fa-trash-alt"></i> </a>';

                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $pendonor = Pendonor::latest()->get();

        return view('donor.donor',[ 
            'pendonors' => $pendonor,
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
            'tgl_donor' => 'required',
            'pendonor_id' => 'required',
            
            

        ]);

        
            
            $donor= new Donor;
            $donor->jumlah = $request->jumlah;
            $donor->tgl_donor = $request->tgl_donor;
            $donor->points = $request->points;
            $donor->pendonor_id = $request->pendonor_id;
            $donor->save();
           
            
            
            
            Alert::success('Selamat','Data Berhasil Di tambahkan');
           
            

            
        
        return redirect()->route('donor.index');
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
        $donor = Donor::where($where)->with('pendonor')->first();
        return Response::json($donor);
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
        $r= $request->validate([
            'jumlah' => 'required',
            'tgl_donor' => 'required',
            'pendonor_id' => 'required',
            
            

        ]);
        $uId = $request->donor_id;
        
        
            
            Donor::where('id', $uId)->update(['jumlah' => $request->jumlah, 'tgl_donor' => $request->tgl_donor, 'pendonor_id' => $request->pendonor_id, 'points' => $request->points]);
            Alert::success('Selamat','Data Berhasil Di Edit');
        
        return redirect()->route('donor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donor = Donor::where('id', $id)->delete();
        return Response::json($donor);
    }
}
