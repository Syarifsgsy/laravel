<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
    	$data1['kelas']  =\DB::table('t_kelas')
    	 // ->orderBy('jurusan', 'desc', 'nama_kelas', 'asc')
    	 // ->where('nama_wali_kelas','like','A%')
    	->get();
		return view('kelas',$data1);

    }

    public function create()
    {
    	return view('kelas.form');
    }

    public function store(Request $request)
    {

        $pesan  =[
            'required'        =>":attribute Tolong diisi ya",
            'string'          =>":attribute Tolong dengan huruf...",
            'min'             =>":attribute Harap isi minimal 3 karakter",
            'max'             =>":attribute Harap diisi maksimal 10 karakter",
            //'alpha'           =>":attribute hanya boleh pake huruf oke",          
            ];

        $rule   =[
            'nama_kelas'      => 'required|string|min:3',
            'lokasi_ruangan'  => 'required|string',
            'jurusan'         => 'required|min:3',
            'nama_wali_kelas' => 'required|max:100',
            ];
        $this->validate($request, $rule, $pesan);
        
        

    	$input	=$request->all();
    	unset($input['_token']);
    	$status	= \DB::table('t_kelas')->insert($input);

    	if ($status){
    		return redirect('/kelas')->with(['success' => ' Data Berhasil ditambahkan']);
    	}else{
    		return redirect('/kelas/create')->with(['error' => ' Tidak Berhasil ditambahkan']);
    	}
    }

    public function edit(Request $request, $id)
    {
        $data['kelas']      = \DB::table('t_kelas')->find($id);
        return view('kelas.form', $data);
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
            'nama_kelas'      => 'required|string|min:3',
            'lokasi_ruangan'  => 'required|string',
            'jurusan'         => 'required|min:3',
            'nama_wali_kelas' => 'required|max:100',
        ];
        $this->validate($request, $rule,$pesan);

        $input  =$request->all();
        unset($input['_token']);
        unset($input['_method']);

        $status = \DB::table('t_kelas')->where('id', $id)->update($input);

        if ($status) {
            return redirect('/kelas')->with('success', 'Data Berhasil Diubah');
        } else{
            return redirect('/kelas/create')->with('error', 'Data Gagal Diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $status = \DB::table('t_kelas')->where('id', $id)->delete();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data Berhasil Dihapus');
        }else{
            return redirect('/kelas/create')->with('error', 'Data Gagal Ditambahkan');
        }
    }
}
