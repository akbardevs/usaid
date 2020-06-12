<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiUser extends Controller
{
    //
    public function index(){
        return User::all();
    }

    public function create(Request $request){
        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make("12345678");
        $user->save();
        
        return 'Selamat, Data Berhasil Di tambahkan';
    }
    public function delete($id){
        $user = User::find($id);
        $user -> delete();
        return $id." Berhasil dihapus";
    }

    public function CekLogin(Request $request){
        $user = User::where('email', '=',$request->email);
        if ($user === null) {
            $user= new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = Hash::make("12345678");
            $user->save();
         }
        return $id." Berhasil dihapus";
    }
}
