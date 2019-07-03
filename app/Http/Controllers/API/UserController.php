<?php
 
 
namespace App\Http\Controllers\API;
 
 
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
 
 
class UserController extends BaseController
{
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'npm'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'no_hp'=>'required',
            'fakultas'=>'required',
            'jurusan'=>'required',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['data'] = $user;


        return $this->sendResponse($user, 'User regiter successfully');
    }

    public function updateUser(Request $request, $id){
 
        $user = User::find($id);
        $user->name = $request->input('name') ? $request->input('name') : $user->name;
        $user->no_hp = $request->input('no_hp') ? $request->input('no_hp') : $user->no_hp;
        $user->save();
 
        $result = [
            'status' => true,
            'code' => 200,
            'message' => "Success Update Data user By Id",
            'data' => $user,
        ];
 
        return $this->generateResponseWithData($result);
    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        $result = [
            'status' => true,
            'code' => 200,
            'message' => "Success Delete Data user By Id",
            'data' => $user,
        ];
 
        return $this->generateResponseWithData($result);

    }

    // Get All User
    public function index(){
        $user = User::all();

        $dataResponse = [
            'content' => $user->toArray()
        ];

        $result = [
            'status' => true,
            'code' => 200,
            'message' => "Get List All",
            'data' => $dataResponse,
        ];

        return $this->generateResponseWithData($result);
    }

    public function show($id){
        $user = User::find($id);

        if(is_null($user)){
            return $this->sendError('User Not Found');
        }

        return $this->sendResponse($user->toArray(), 'User Found');
    }


    public function login(){
        if(Auth::attempt(['npm' => request('npm'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['name'] = $user->name;

            return response()->json(['success' => $success], 200);
        } else{
            return response()->json(['error' => 'Unautorized'], 401);
        }
    }
 
}
