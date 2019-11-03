<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\language;
use App\Http\Resources\languageResources;
use Illuminate\Support\Facades\Validator;



class LanguageController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data =  languageResources::collection(language::paginate($this->paginateNumber));
       return $this->apiResponse($data);
    }

    

    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'language_name' =>'required',
            'is_active' =>'required',
             'user_id' =>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
        $request->user_id = 1 ;
        // dd( $request->user_id);
         $language =  language::create($request->all());
         if( $language ){
            return $this->apiResponse(new languageResources($language) ,null , 201);
         }
         return $this->apiResponse(null ,"Un know Error " , 404);
    }

   
    public function show($id)
    {
        $language = language::find($id);
        if($language)
        {
           return $this->apiResponse(new languageResources($language));
        }

        return $this->NotFound();
    }

    

    public function update(Request $request, $id)
    {
        $language = language::find($id);
        if (empty($language)){
             return $this->apiResponse(null , 'the language is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'language_name' =>'required',
            'is_active' =>'required',
             'user_id' =>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $language->update($request->all());
         if( $language ){
            return $this->apiResponse(new languageResources($language) ,null , 201);
         }
         return $this->NotFound();
    }

    
    public function destroy($id)
    {
        $language = language::find($id);
        if (empty($language)){
            return $this->NotFound();
        }elseif($language->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($language);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }
}
