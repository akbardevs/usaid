<?php

namespace App\Http\Controllers;

use App\User;
use App\Pendonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if ($user -> count() == 0) {
            $users= new User;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->role = $request->role;
            $users->password = Hash::make("12345678");
            $users->save();
            return 2;
         } else if($user ->count() > 0){
            return 1;
         } else {
            return 0;
         }

    }

    public function select(){
        return DB::select('select * from pendonors');

    }

    public function provinsi(Request $request){
        $user = User::where('email', '=',$request->email);
        if ($user -> count() > 0) {
            if($request->req=='prov'){
                return DB::select('select * from provinces');
            }
            else if($request->req=='kab'){
                return DB::table('regencies')->select('id','name')->where('province_id', $request->id)->get();
            } else if($request->req=='kec'){
                return DB::table('districts')->select('id','name')->where('regency_id', $request->id)->get();
            }
        }
    }

    public function profilEdit(Request $request){
        $user = User::where('email', '=',$request->email);
        if ($user -> count() > 0) {
            $updatee=DB::table('pendonors')->updateOrInsert(
                [
                    'users_id' => $user->value("id"),
                ],
                [
                'users_id' => $user->value("id"),
                'nama' => $request->nama, 
                'tgl_lahir' => $request->tgl_lahir, 
                'no_telp' => $request->no_telp, 
                'provinsi' => $request->provinsi, 
                'regensi' => $request->regensi, 
                'kec' => $request->kec, 
                'detail_alamat' => $request->detail_alamat, 
                'gol_darah' => $request->gol_darah, 
                'last_donor' => $request->last_donor, 
                ]
            );
            if($updatee) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function Foto(Request $request){
        $user = User::where('email', '=',$request->email);
        $pendonor = Pendonor::where('users_id', '=',$user->value("id"));
        if($pendonor->count()>0 && $pendonor->value("foto")!=null){
            $path = storage_path()."/uploads/".$pendonor->value("foto");
            unlink($path);
        }
        $b64 = $request->image;
        $bin = base64_decode($b64);
        $size = getImageSizeFromString($bin);
        if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
            die('Base64 value is not a valid image');
          }
          $ext = substr($size['mime'], 6);
        if (!in_array($ext, ['png', 'gif', 'jpeg'])) {
            die('Unsupported image type');
          }
        $img_file = $user->value("id").".{$ext}";
        file_put_contents(storage_path()."/uploads/".$img_file, $bin);
        if($img_file!=null){
            $updateFoto = DB::table('pendonors')
              ->where('users_id', $user->value("id"))
              ->update(['foto' => $img_file]);
              if($updateFoto){
                  return 1;
              } else {
                  return 0;
              }
        }
    }

    public function selectAll(Request $request){
        $user = User::where('email', '=',$request->email);
        $pendonor = Pendonor::where('users_id', '=',$user->value("id"));
        return [
            'id'        => $pendonor->value("id"),
            'name'      => $pendonor->value("nama"),
            'image'     => asset(storage_path()."/uploads/" .$pendonor->value("foto"),),
        ];
        
    }
}
