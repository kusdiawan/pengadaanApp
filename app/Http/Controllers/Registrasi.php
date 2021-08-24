<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import lib validasi
use Illuminate\Support\Facades\Validator;

//import fungsi encrypt
use Illuminate\Contracts\Encrytion\DecryptException;


//import model supplier
use App\M_Suplier;

//import lib session
use Illuminate\Support\Facades\Session;


class Registrasi extends Controller
{
    //
    public function index(){
        //$key = env('APP_KEY');

        $token = Session::get('token');

        $tokenDb = M_Suplier::where('token', $token)->count();

        if($tokenDb > 0){
            $data['token'] = $token;
        }else{
            $data['token'] = "kosong";
        }

       	return view('registrasi.registrasi', $data);
    }

    public function regis(Request $request){
    	$this->validate($request,
    	[
    		   'nama_usaha' => 'required',
    		   'email' => 'required',
    		   'alamat' => 'required',
    		   'npwp' => 'required',
    		   'password' => 'required'
    	]
    	);

    	if (M_Suplier::create(
    		[
    			'nama_usaha' => $request->nama_usaha, 
    			'email' => $request->email,
    			'alamat' => $request->alamat,
    			'no_npwp' => $request->npwp,
    			'password' => encrypt($request->password)
    		]

    	)){
	        return redirect('/registrasi')->with('berhasil', 'Data berhasil disimpan');
    	}else{
    		return redirect('/registrasi')->with('gagal', 'Data gagal disimpan');

    	}

    }
}
