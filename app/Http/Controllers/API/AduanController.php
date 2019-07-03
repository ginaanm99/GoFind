<?php
 
 
namespace App\Http\Controllers\API;
 
 
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\PostAduan;
use Illuminate\Support\Facades\Auth;
use Validator;
 
 
class AduanController extends BaseController
{
    public function postAduan(Request $request){

        $validator = Validator::make($request->all(), [
            'npm'=>'required',
            'nama_barang'=>'required',
            'deskripsi'=>'required',
            'lokasi'=>'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        } 
        
        $input = $request->all();
        
        $input['no_aduan'] = 'BRG-HLNG-' . rand(0, 9999);

        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $filename=$file->getClientOriginalName();
            $request->file('foto')->move('image',$filename);
            $input['foto']=$filename;
        }      
        
        $input['status'] = 'Waiting';
        
        $aduan = PostAduan::create($input);
        $success['data'] = $aduan;
        
        return $this->sendResponse($aduan, 'Data addedd successfully');
    }

    public function updateAduan(Request $request, $id){
 
        $input= PostAduan::find($id);
        $input->npm = $request->input('npm') ? $request->input('npm') : $input->npm;
        $input->nama_barang = $request->input('nama_barang') ? $request->input('nama_barang') : $input->nama_barang;
        $input->deskripsi = $request->input('deskripsi') ? $request->input('deskripsi') : $input->deskripsi;
        $input->lokasi = $request->input('lokasi') ? $request->input('lokasi') : $input->lokasi;
        if($request->hasFile('foto')){
            $file=$request->file('foto');
            $filename=$file->getClientOriginalName();
            $request->file('foto')->move('image',$filename);
            $input['foto']=$filename;
        } 
        $input->save();
 
        $result = [
            'status' => true,
            'code' => 200,
            'message' => "Success Update Data user By Id",
            'data' => $input,
        ];
 
        return $this->generateResponseWithData($result);
    }
}
