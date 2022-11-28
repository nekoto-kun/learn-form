<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi');
    }

    public function prosesForm(Request $request)
    {
        $rules = [
            'npm' => 'required|size:10',
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => ''
        ];

        $messages = [
            'required' => ':attribute harus diisi',
            'size' => ':attribute harus sebanyak :size karakter',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'email' => ':attribute harus berupa alamat email yang valid',
            'in' => ':attribute invalid'
        ];

        // $validated = $request->validate($rules);
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/registrasi')->withErrors($validator)->withInput();
        } else {
            echo $request->npm . "<br>";
            echo $request->nama . "<br>";
            echo $request->email . "<br>";
            echo $request->jenis_kelamin . "<br>";
            echo $request->jurusan . "<br>";
            echo $request->alamat . "<br>";
        }
    }
}
