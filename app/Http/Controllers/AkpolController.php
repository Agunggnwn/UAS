<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use App\Akpol;

class AkpolController extends Controller
{

  public function create(Request $request)
  {
    $validation = Validator::make($request->all(), [
      'dinas' => 'required',
      'keterangan' => 'required',
    ]);

    if ($validation->fails()) {
      $error = $validation->errors();
      return [
        'status'=>'error',
        'message'=>$error,
        'result'=>null
      ];
    }

    $result = \App\Akpol::create($request->all());
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil ditambahkan',
        'result'=>$result
      ];
    }else {
      return[
        'status'=>'error',
        'message'=>'Data gagal di tambahkan',
        'result'=>null
      ];
    }
  }

public function read(Request $request)
{
  $result = \App\Akpol::all();
  return [
    'status'=>'success',
    'message'=>'',
    'result'=>$result
  ];
}

public function update(Request $request, $id)
{
    $validation = Validator::make($request->all(), [
      'dinas'=>'required',
      'keterangan'=>'required',
    ]);

    if ($validation->fails()) {
      $errors = $validation->errors();
      return [
        'status'=>'error',
        'message'=>$errors,
        'result'=>null
      ];
    }

    $akpol = \App\Akpol::find($id);
    if (empty($akpol)) {
      return [
        'status'=>'error',
        'message'=>'Data tidak ditemukan',
        'result'=>null
      ];
    }

    $result= $akpol->update($request->all());
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil diubah',
        'result'=>$result
      ];
    }else {
      return [
        'status'=>'error',
        'message'=>'Data gagal diubah',
        'result'=>null
      ];
    }
}

public function delete(Request $request, $id)
{

    $akpol = \App\Akpol::find($id);
    if (empty($akpol)) {
      return [
        'status'=>'error',
        'message'=>'Data tidak ditemukan',
        'result'=>null
      ];
    }

    $result= $akpol->delete($id);
    if ($result) {
      return [
        'status'=>'success',
        'message'=>'Data berhasil dihapus',
        'result'=>$result
      ];
    }else {
      return [
        'status'=>'error',
        'message'=>'Data gagal dihapus',
        'result'=>null
      ];
    }
}

  public function detail($id)
  {
    $akpol = Akpol::find($id);

    if(empty($akpol)){
      return [
        'status'=>'error',
        'message'=>'Data gagal ditemukan',
        'result'=>null
      ];
    }
      return [
        'status'=>'success',
        'result'=>$akpol
      ];

  }

}



?>
