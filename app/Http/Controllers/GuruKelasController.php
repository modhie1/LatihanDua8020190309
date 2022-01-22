<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Auth;
use \App\Kelas as model;
use Illuminate\Http\Request;

class GuruKelasController extends Controller
{
    public function index()
    {
        $data['model'] = Model::where('user_id', Auth::user()->id)->latest()->get();
        return view('guru.kelas_index', $data);
    }

    public function create()
    {
        
        $data['model'] = new Model();
        $data['method'] = 'POST';
        $data['url'] = url('guru/kelas');
        $data['namaTombol'] = "Simpan";
        return view('guru.kelas_form', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                     'nama' => 'required',
                     'deskripsi' => 'nullable',
                     'kode' => 'required|unique:kelas'
            ]);

        $request->merge(['user_id' => Auth::user()->id]); 
        Model::create($request->all());
        flash('Data sudah disimpan')->success();
        return back();
    }

    public function edit($id)
    {
       
        $data['model'] = Model::findOrFail($id);
        $data['method'] = 'PUT';
        $data['url'] = url('guru/kelas/' . $id);
        $data['namaTombol'] = "Update";
        return view('guru.kelas_form', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                     'nama' => 'required',
                     'deskripsi' => 'nullable',
                     'kode' => 'required|unique:kelas,kode,' . $id,
            ]);

        $request->merge(['user_id' => Auth::user()->id]); 
        Model::where('id',$id)->update($request->except(['_method', '_token']));
        flash('Data sudah diupdate')->success();
        return back();
    }

    public function destroy($id)
    {
        $model = Model::findOrFail($id);
        $model->delete();
        flash('Data sudah dihapus')->error();
        return back();
    }
}
