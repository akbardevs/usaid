<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Redirect,Response;
use App\Berita;
use File;

class BeritaController extends Controller
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
            $data = Berita::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->editColumn('foto', function ($row) {
                $url= asset('berita_file/'.$row->foto);
                return '<img width="100px" src="'.$url.'" class="rounded mx-auto d-block" />';
            })
            ->addColumn('action', function ($row) {
                $action = '<a class="btn btn-info btn-sm" id="edit-gambar" data-toggle="modal" data-id='.$row->id.' title="Show"><i class="far fa-image"></i></a>
            <a class="btn btn-success btn-sm" id="edit-berita" data-toggle="modal" data-id='.$row->id.' title="Edit"><i class="far fa-edit"></i> </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-berita" data-id='.$row->id.' class="btn btn-danger delete-berita btn-sm" title="Hapus"><i class="far fa-trash-alt"></i> </a>';

                return $action;
            })
            ->rawColumns(['action','foto'])
            ->make(true);
        }
       
       

        return view('berita.berita');
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

    // public function drop(){
    //     $req = Input::get('provinsi');
    //     $regencies = Regencie::where('province_id','=', $req)
    //         ->get();
    
    //     return Response::json($regencies);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
            'waktu_posting' => 'required',
            
            

        ]);

            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'berita_file';
		    $file->move($tujuan_upload,$nama_file);
            
            $berita= new Berita;
            $berita->judul = $request->judul;
            $berita->foto = $nama_file;
            $berita->deskripsi = $request->deskripsi;
            $berita->waktu_posting = $request->waktu_posting;
            $berita->save();
            
            Alert::success('Selamat','Data Berhasil Di tambahkan');
           
            

            
        
        return redirect()->route('berita.index');
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
        $berita = Berita::where($where)->first();
        return Response::json($berita);
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
         $r=$request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu_posting' => 'required',
            
            

        ]);

        $uId = $request->berita_id;
        
            
           
        
        
            
            Berita::where('id', $uId)->update(['judul' => $request->judul, 'deskripsi' => $request->deskripsi, 'waktu_posting' => $request->waktu_posting]);
            Alert::success('Selamat','Data Berhasil Di Edit');
        
        return redirect()->route('berita.index');
    }


    public function gambar(Request $request)
    {
         $r=$request->validate([
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $uId = $request->berita_id;
        $cari = Berita::where('id',$uId)->first();
            File::delete('berita_file/'.$cari->foto);

            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'berita_file';
		    $file->move($tujuan_upload,$nama_file);
            
            Berita::where('id', $uId)->update(['foto' => $nama_file]);
            Alert::success('Selamat','Gambar Berhasil Di Ganti');
        
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::where('id', $id)->delete();
        return Response::json($berita);
    }
}
