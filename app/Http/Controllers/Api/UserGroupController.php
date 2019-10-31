<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserGropResource;
use App\Model\UserGroup;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data =  UserGropResource::collection(UserGroup::paginate($this->paginateNumber));
       return $this->apiResponse($data);
    }

    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'title' =>'required', 
            'user_id' =>'required',
             'store_id' =>'required',
             'flag' =>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
  
         $userGroup =  UserGroup::create($request->all());
         if( $userGroup ){
            return $this->apiResponse(new UserGropResource($userGroup) ,null , 201);
         }
         return $this->apiResponse(null ,"Un know Error " , 404);
    }


    public function show($id)
    {
        $userGroup = UserGroup::find($id);
        if($userGroup)
        {
           return $this->apiResponse(new UserGropResource($userGroup));
        }

        return $this->NotFound();
    }

   
    public function update(Request $request, $id)
    {
        $userGroup = UserGroup::find($id);
        if (empty($userGroup)){
             return $this->apiResponse(null , 'the category is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'title' =>'required', 
            'user_id' =>'required',
             'store_id' =>'required',
             'flag' =>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $userGroup->update($request->all());
         if( $userGroup ){
            return $this->apiResponse(new UserGropResource($userGroup) ,null , 201);
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
        $userGroup = UserGroup::find($id);
        if (empty($userGroup)){
            return $this->NotFound();
        }elseif($userGroup->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($userGroup);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }
}
