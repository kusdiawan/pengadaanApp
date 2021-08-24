<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import lib session
use Illuminate\Support\Facades\Session;

//import lib JWT
use \Firebase\JWT\JWT;

//import lib Response
use Illuminate\Response;

//import lib validasi
use Illuminate\Support\Facades\Validator;

//import fungsi encrypt
use Illuminate\Contracts\Encrytion\DecryptException;

//import model admin
use App\M_Admin;

class Admin extends Controller
{
    //
    public function index(){
    	return view('admin.login');
    }

    // contoh untuk generate saat data awal
    // public function adminGenerate(){
    // 	M_Admin::create([
    // 	'nama' => "Admin",
    // 	'email' => "admin@mail.com",
    // 	'alamat' => "Jl Alamat",
    // 	'password' => encrypt("admin@mail.com")
    // 	]);
    // }

    public function loginAdmin(Request $request){
    	$this->validate($request,
    		[
    		   'email' => 'required',
    		   'password' => 'required'
    		]
    	);
    	$cek = M_Admin::where('email',$request->email)->count();
    	$adm = M_Admin::where('email',$request->email)->get();

    	if($cek > 0){
    		foreach($adm as $ad){
    			if (decrypt($ad->password) == $request -> password){
    				$key = env('APP_KEY');
    				$data = array("id_admin" => $ad->id_admin,
    			    );

    			    $jwt = JWT::encode($data, $key);

    			    M_Admin::where('id_admin', $ad->id_admin)->update(["token" => $jwt,
    			]);
    			Session::put('token', $jwt);

                return redirect('/listAdmin')->with('berhasil',"Selamat datang kembali");

    			echo "Kamu berhasil login";


    			}else{
    		       return redirect ('/masukAdmin')->with('gagal','Password Anda Salah');		
    			}
    		}

    	}else{
    		return redirect ('/masukAdmin')->with('gagal','Email Tidak Terdaftar');
        }
    }

    
   public function keluarAdmin(){
    $token = Session::get('token');
    if(M_Admin::where('token',$token)->update(
        
        [
            'token' => 'keluar',
        ]

    )){
        Session::put('token',"");
        return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silakan login kembali');
    }else{
        return redirect ('/masukAdmin')->with('gagal','Anda gagal logout');
    }
   }

   public function listAdmin(){
   $token = Session::get('token');

   $tokenDb = M_Admin::where('token', $token)->count();

   if($tokenDb > 0){
      $data['adm'] = M_Admin::where('token', $token)->first(); 
      $data['admin'] = M_Admin::where('status','1')->paginate(15);
     // print_r($data);
      return view('admin.list', $data);
   }else{
        return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silakan login kembali');
    
   }
   }

   public function tambahAdmin(Request $request){
    $this->validate($request,
            [
               'nama' => 'required',
               'email' => 'required',
               'alamat' => 'required',
               'password' => 'required'
            ]
        );

    $token = Session::get('token');
    $tokenDb = M_Admin::where('token', $token)->count();

    if($tokenDb > 0){
        if (M_Admin::create([
        "nama" => $request->nama,
        "email" => $request->email,
        "alamat" => $request->alamat,
        "password" => encrypt($request->password)
    ])){
        return redirect('/listAdmin')->with('berhasil', 'Data berhasil disimpan');
    }else{
        return redirect('/listAdmin')->with('gagal', 'Data gagal disimpan');
    }    
    }else{
        return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silakan login kembali');
    }
    
   }

    public function ubahAdmin(Request $request){
    $this->validate($request,
            [
               'u_nama' => 'required',
               'u_email' => 'required',
               'u_alamat' => 'required',
            ]
        );

    $token = Session::get('token');
    $tokenDb = M_Admin::where('token', $token)->count();

    if($tokenDb > 0){
        if (M_Admin::where("id_admin",$request->id_admin)->update([
        "nama" => $request->u_nama,
        "email" => $request->u_email,
        "alamat" => $request->u_alamat,
    ])){
        return redirect('/listAdmin')->with('berhasil', 'Data berhasil diubah');
    }else{
        return redirect('/listAdmin')->with('gagal', 'Data gagal diubah');
    }    
    }else{
        return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silakan login kembali');
    }    
   }

     public function hapusAdmin($id){
   
    $token = Session::get('token');
    $tokenDb = M_Admin::where('token', $token)->count();

    if($tokenDb > 0){
        if (M_Admin::where("id_admin",$id)->delete()){

        return redirect('/listAdmin')->with('berhasil', 'Data berhasil dihapus');
    }else{
        return redirect('/listAdmin')->with('gagal', 'Data gagal dihapus');
    }    
    }else{
        return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silakan login kembali');
    }
    
   }

   public function ubahPassword(Request $request){
        $token = Session::get('token');
        $tokenDb = M_Admin::where('token', $token)->count();

      if($tokenDb > 0){
              $key = env('APP_KEY');

      $sup = M_Admin::where('token', $token)->first();

      $decode = JWT::decode($token, $key, array('HS256'));
      $decode_array = (array) $decode; 

      if(decrypt($sup->password) == $request->passwordlama){
      if(M_Admin::where('id_admin',$decode_array['id_admin'])->update(
        [
            "password" => encrypt($request->password)
        ]
      )){
        return redirect('/masukAdmin')->with('gagal', 'Password berhasil diupdate');  
      }else{
        return redirect('/pengajuan')->with('gagal', 'Password gagal diupdate');   
      }
    }else{
        return redirect('/pengajuan')->with('gagal', 'Password gagal diupdate');
      }
   }else{
    return redirect('/masukAdmin')->with('gagal', 'Anda sudah logout, silakan login kembali');
   } 

   }
}
