<?php
 
 
namespace App\Http\Controllers\API;
 
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
 
 
class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'code' => 200,
            'status' => "true",
            'message' => $message,
            'data'    => $result,
        ];
 
 
        return response()->json($response, 200);
    }
   
 
 
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'status' => false,
            'message' => $error,
        ];
 
 
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
 
 
        return response()->json($response, $code);
    }
 
    public function generateResponseWithData(array $data)
    {
        return response()->json([
            'code' => $data['code'],
            'status' => $data['status'],
            'message' => $data['message'],
            'data' => $data['data']
        ]);
    }
 
    public function generateResponseWithoutData(array $data)
    {
        return response()->json([
            'code' => $data['code'],
            'status' => $data['status'],
            'message' => $data['message']
        ]);
    }
}