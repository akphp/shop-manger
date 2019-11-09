<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConstantResoures;
use App\Model\Constant;
use Illuminate\Support\Facades\Validator;

class ConstantController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  ConstantResoures::collection(Constant::paginate($this->paginateNumber));
        return $this->apiResponse($data);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'parent_id'=>'required',
            'name'=>'required', 
            'user_id'=>'required',
            'is_active'=>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
  
         $Constant =  Constant::create($request->all());
         if( $Constant ){
            return $this->apiResponse(new ConstantResoures($Constant) ,null , 201);
         }
         return $this->apiResponse(null ,"Un know Error " , 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $constant = Constant::find($id);
        if($constant)
        {
           return $this->apiResponse(new ConstantResoures($constant));
        }

        return $this->NotFound();
    }

   
    public function update(Request $request, $id)
    {
        $constant = Constant::find($id);
        if (empty($userGroup)){
             return $this->apiResponse(null , 'the constant is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'parent_id'=>'required',
            'name'=>'required', 
            'user_id'=>'required',
            'is_active'=>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $constant->update($request->all());
         if( $constant ){
            return $this->apiResponse(new ConstantResoures($constant) ,null , 201);
         }
         return $this->NotFound();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $constant = Constant::find($id);
        if (empty($constant)){
            return $this->NotFound();
        }elseif($constant->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($constant);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }
    
}
