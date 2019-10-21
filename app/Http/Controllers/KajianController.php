<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Resources\KajianCollection;
use App\Http\Resources\KajianItem;
use Illuminate\Http\Request;
use App\Kajian;

class KajianController extends Controller
{
  /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{

    $kajian = Kajian::all();
    //return view('admin.kajian.index',compact('kajian'));
    	//return Response::json($comments,200);
    if(count($kajian) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $kajian;
        return response($res);
    }
    else{
        $res['message'] = "Empty!";
        return response($res);
    }
}


/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
    return view('admin.kajian.create');
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $data = $this->validate($request, [
      'tema_kajian' => 'required',
      'nama_ustad' => 'required',
      'lokasi_kajian' => 'required',
      'waktu' => 'required'
    ]);
    Kajian::create($data);
    return redirect('admin/kajian')->with('alert-success','Berhasil Menambahkan Data!');
}


/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    return new Kajian($kajian);
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $data = Kajian::where('id',$id)->get();
    return view('admin.kajian.edit',compact('data'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    //
    $data = $this->validate($request, [
      'tema_kajian' => 'required',
      'nama_ustad' => 'required',
      'lokasi_kajian' => 'required',
      'waktu' => 'required'
    ]);
    Kajian::find($id)->update($data);
    return redirect('admin/kajian')->with('alert-success','Data berhasil diubah!');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
    $data = Kajian::where('id',$id)->first();
    $data->delete();
    return redirect('admin/kajian')->with('alert-success','Berhasil Menghapus Data!');
  }
}
