<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index()
    {
    	//$data['siswa']  =\DB::table('t_siswa')
    	// ->orderBy('jenkel', 'ASC')
    	// ->where('nama_lengkap','like','%o%')
    	//->get();
        $data['siswa']  =\App\Siswa::orderBy('jenkel')->get();
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
            'numeric'         =>":attribute harus pake angka",
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
    	// unset($input['_token']);
    	// $status	= \DB::table('t_siswa')->insert($input);

        // $status = \App\Siswa::create($input);
        $siswa              = new \App\Siswa;
        $siswa->nis         =$input['nis'];
        $siswa->nama_lengkap=$input['nama_lengkap'];
        $siswa->jenkel      =$input['jenkel'];      
        $siswa->goldar      =$input['goldar'];
        $status             =$siswa->save();
    	if ($status){
    		return redirect('/siswa')->with(['success' => ' Data Berhasil ditambahkan']);
    	}else{
    		return redirect('/siswa/create')->with(['error' => ' Tidak Berhasil ditambahkan']);
    	}
    }

    public function edit(Request $request, $id)
    {
        $data['siswa']      = \DB::table('t_siswa')->find($id);
        return view('siswa.form', $data);
    }

    public function update(Request $request, $id)
    {

        $pesan  =[
            'required'        =>":attribute nya Tolong diisi ya",
            'string'          =>":attribute Tolong dengan huruf...",
            'min'             =>":attribute Harap isi minimal 3 karakter",
            'max'             =>":attribute Harap diisi maksimal 10 karakter",
            //'alpha'           =>":attribute hanya boleh pake huruf oke",          
            ];


        $rule   =[
            'nis'           => 'required|numeric',
            'nama_lengkap'  => 'required|string',
            'jenkel'        => 'required',
            'goldar'        => 'required',
        ];
        $this->validate($request, $rule,$pesan);

        $input  =$request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_siswa')->where('id', $id)->update($input);

        $siswa  =\App\Siswa::find($id);
        // $status =$siswa->update($input);
        $siswa->nis         =$input['nis'];
        $siswa->nama_lengkap=$input['nama_lengkap'];
        $siswa->jenkel      =$input['jenkel'];      
        $siswa->goldar      =$input['goldar'];
        $status             =$siswa->update();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Diubah');
        } else{
            return redirect('/siswa/create')->with('error', 'Data Gagal Diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $siswa      =\App\Siswa::find($id);
        $status     =$siswa->delete();


        // $status = \DB::table('t_siswa')->where('id', $id)->delete();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('/siswa/create')->with('error', 'Data Gagal Ditambahkan');
        }
    }
}
