<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil method
use App\Guru;

class GuruController extends Controller
{
    public function index()
    {
    	//ambil data guru
    	$guru 		=Guru::orderBy('nama_guru','ASC')->get();

    	//mengirim data guru ke view guru
    	return view('guru', ['guru' => $guru]);
    }

    public function create()
    {
    	return view('guru.form');
    }

    public function store(Request $request)
    {
         $pesan  =[
         	'numeric'	      =>":attribute harus pake angka",
            'required'        =>":attribute nya Tolong diisi ya",
            'string'          =>":attribute Tolong dengan huruf...",
            'min'             =>":attribute Harap isi minimal 11 karakter",
            'max'             =>":attribute Harap diisi maksimal 10 karakter",
            //'alpha'           =>":attribute hanya boleh pake huruf oke",          
            ];

        $rule   =[
            'nip'           => 'required|numeric|min:11|unique:t_guru',
            'nama_guru'  	=> 'required|string',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            ];
        $this->validate($request, $rule, $pesan);
        
        

    	$input	=$request->all();
    	// unset($input['_token']);
    	// $status	= \DB::table('t_guru')->insert($input);

        // $status = \App\Guru::create($input);
        $guru              		  = new \App\Guru;
        $guru->nip         		  =$input['nip'];
        $guru->nama_guru   		  =$input['nama_guru'];
        $guru->jenis_kelamin      =$input['jenis_kelamin'];      
        $guru->alamat      		  =$input['alamat'];
        $status             	  =$guru->save();
    	if ($status){
    		return redirect('/guru')->with(['success' => ' Data Berhasil ditambahkan']);
    	}else{
    		return redirect('/guru/create')->with(['error' => ' Tidak Berhasil ditambahkan']);
    	}
    }

    public function edit(Request $request, $id)
    {
        $data['guru']      = \DB::table('t_guru')->find($id);
        return view('guru.form', $data);
    }

    public function update(Request $request, $id)
    {

        $pesan  =[
        	'integer'		  =>":attribute harusnya tuh pake angka",	
        	'numeric'	      =>":attribute harusnya tuh pake angka",
            'required'        =>":attribute nya Tolong diisi ya",
            'string'          =>":attribute Tolong dengan huruf...",
            'min:11'          =>":attribute Harap diisi minimal 11 karakter",
            'max'             =>":attribute Harap diisi maksimal 10 karakter",
            //'alpha'           =>":attribute hanya boleh pake huruf oke",          
            ];


        $rule   =[
            'nip'           => 'required|integer|min:11',
            'nama_guru'  	=> 'required|string',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
        ];
        $this->validate($request, $rule,$pesan);

        $input  =$request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_siswa')->where('id', $id)->update($input);

        $guru  =\App\Guru::find($id);
        // $status =$siswa->update($input);
        $guru->nip         		  =$input['nip'];
        $guru->nama_guru   		  =$input['nama_guru'];
        $guru->jenis_kelamin      =$input['jenis_kelamin'];      
        $guru->alamat      		  =$input['alamat'];
        $status             	  =$guru->update();

        if ($status) {
            return redirect('/guru')->with('success', 'Data Berhasil Diubah');
        } else{
            return redirect('/guru/create')->with('error', 'Data Gagal Diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $guru      =\App\Guru::find($id);
        $status     =$guru->delete();


        // $status = \DB::table('t_siswa')->where('id', $id)->delete();

        if ($status) {
            return redirect('/guru')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('/guru/create')->with('error', 'Data Gagal Ditambahkan');
        }
    }

}
