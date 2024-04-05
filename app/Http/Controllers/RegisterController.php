<?php

namespace App\Http\Controllers;
use App\Models\Store;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function store(){
        return view('register');
    }

    function stored(Request $request){
        $data=new Store();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->save();
        return response()->json(['res'=>'SuccessFull Inserted']);
    }

    function read(){
        $data=store::all();
        return response()->json(['data'=>$data]);
    }

    function update($id){
        $data=store::find($id);
        return view('update',['data'=>$data]);
    }

    function updated(Request $request){
        $data=store::find($request->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->save();
        return response()->json(['res'=>'Updated SuccessFully']);
    }

    function delete($id){
        $data=store::find($id);
        $data->delete();
        return back();
    }

    function add(Request $request){
        dd($request);
    }
}
