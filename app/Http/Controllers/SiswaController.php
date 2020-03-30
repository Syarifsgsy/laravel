<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
    	$data['siswa']  =\DB::table('t_siswa')
    	->orderBy('jenkel', 'ASC')
    	// ->where('nama_lengkap','like','%o%')
    	->get();
		return view('belajar',$data);
    
    	}

    public function index1()
    {
        //rute 1
        echo "Ini route ke-1 ya";
        return view('rute1');   

    }    


    public function index2()
    {
        //rute 2
        $rute= "Ini rute ke-2 ya";
        echo $rute;
        return view('rute2');

    }    



    public function index3()
    {
        //rute 3
        for ($i=0; $i < 14; $i++) { 
        echo "ini rute ke-3 ya"."</br>";
        
        }
        return view('rute3');
        

    }    



    public function create()
    {
    	return view('siswa.form');
    }

    public function store(Request $request)
    {
         $pesan  =[
            'required'        =>":attribute nya Tolong diisi ya",
            'string'          =>":attribute Tolong dengan huruf...",
            'min'             =>":attribute Harap isi minimal 3 karakter",
            'max'             =>":attribute Harap diisi maksimal 10 karakter",
            //'alpha'           =>":attribute hanya boleh pake huruf oke",          
            ];

        $rule   =[
            'nis'           => 'required|numeric|unique:t_siswa',
            'nama_lengkap'  => 'required|string',
            'jenkel'        => 'required',
            'goldar'        => 'required',
            ];
        $this->validate($request, $rule, $pesan);
        
        

    	$input	=$request->all();
    	unset($input['_token']);
    	$status	= \DB::table('t_siswa')->insert($input);

    	if ($status){
    		return redirect('/siswa')->with(['success' => ' Data Berhasil ditambahkan']);
    	}else{
    		return redirect('/siswa/create')->with(['error' => ' Tidak Berhasil ditambahkan']);
    	}
    }
}
