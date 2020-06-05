<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\Contracts\DataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Redirect,Response;

class UsersController extends Controller
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
            $data = User::latest()->get();
            return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $action = '<a class="btn btn-info" id="pass-user" data-toggle="modal" data-id='.$row->id.'>Password</a>
            <a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->id.'>Edit </a>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <a id="delete-user" data-id='.$row->id.' class="btn btn-danger delete-user">Delete</a>';

                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('user.user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'role' => 'required',
            

        ]);

        // $uId = $request->user_id;
        // User::updateOrCreate(['id' => $uId], ['name' => $request->name, 'email' => $request->email]);
        
            
            $user= new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = Hash::make("12345678");
            $user->save();
            
            Alert::success('Selamat','Data Berhasil Di tambahkan');
           
            

            
        
        return redirect()->route('user.index');
    }

     public function update(Request $request)
    {
        $r=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ]);

        $uId = $request->user_id;
        // User::updateOrCreate(['id' => $uId], ['name' => $request->name, 'email' => $request->email]);
        
            $msg = 'User created successfully.';
            User::where('id', $uId)->update(['name' => $request->name, 'email' => $request->email, 'role' => $request->role]);
            Alert::success('Selamat','Data Berhasil Di Edit');
        
        return redirect()->route('user.index');
    }

    public function gPassword(Request $request)
    {
        

        $uId = $request->guser_id;
        User::where('id', $uId)->update(['password' => Hash::make($request->gpassword)]);
        Alert::success('Selamat','Ganti Password Berhasil');
        if (empty($request->guser_id)) {
            $msg = 'User created successfully.';
        } else {
            $msg = 'User data is updated successfully';
        }
        return redirect()->route('user.index');
    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return Response::json($user);
        //return view('user.show',compact('user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function edit($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return Response::json($user);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return Response::json($user);
        //return redirect()->route('user.index');
    }








    // // public function index(){
    // //     $user = User::all();
    // //    if(request()->ajax()){
    // //        return datatables()->of($user)->addColumn('action', function($user){
    // //         return
    // //             '<a type="button" href=""  class="btn btn-success btn-sm""> Edit</a> ' .
    // //             '<a onclick="deleteData('.$user->id.')" type="button"   class="btn btn-danger btn-sm"> Delete</a>';
    // //     })
    // //     ->rawColumns(['action'])->make(true);
    // //    }
    // //     return view('user.user');
    // // }
    // public function index(Request $request){
    //     if ($request->ajax()) {
    //          $data = User::latest()->get();
    //             return Datatables()->of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function($row){

    //             $action = '<a class="btn btn-info" id="show-user" data-toggle="modal" data-id='.$row->id.'>Show</a>
    //             <a class="btn btn-success" id="edit-user" data-toggle="modal" data-id='.$row->id.'>Edit </a>
    //             <meta name="csrf-token" content="{{ csrf_token() }}">
    //             <a id="delete-user" data-id='.$row->id.' class="btn btn-danger delete-user">Delete</a>';

    //             return $action;

    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('user.user');
    // }


    // public function create(){
    //     return view('user.add');
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //        'name'   => 'required',
    //        'email'   => 'required',
    //        'password'   => 'required'
    //     ]);

    //     User::create($request->all());
    //     Alert::success('Selamat','Data Berhasil Di tambahkan');
    //     return redirect('/user');
    // //    Alert::success('Selamat','Data tersimpan');
    // }

    // public function destroy($id){
    //     User::destroy($id);

    // }
}
