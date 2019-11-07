<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResoures;
use App\Model\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CountryResoures::collection(Country::paginate($this->paginateNumber));
        return $this->apiResponse($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'country_name' =>'required',
            'country_currency_id' =>'required',
             'country_postal_code' =>'required',
             'mobile_prefix' =>'required' ,
              'language_id' =>'required' ,
               'user_id'  =>'required',
                'nationality' =>'required',
                'is_active' => 'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
  
         $Country =  Country::create($request->all());
         if( $Country ){
            return $this->apiResponse(new CountryResoures($Country) ,null , 201);
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
        $Country = Country::find($id);
        if($Country)
        {
           return $this->apiResponse(new UserGropResource($Country));
        }

        return $this->NotFound();
    }

   
    public function update(Request $request, $id)
    {
        $Country = Country::find($id);
        if (empty($Country)){
             return $this->apiResponse(null , 'the category is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'country_name' =>'required',
            'country_currency_id' =>'required',
             'country_postal_code' =>'required',
             'mobile_prefix' =>'required' ,
              'language_id' =>'required' ,
               'user_id'  =>'required',
                'nationality' =>'required',
                'is_active' => 'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $Country->update($request->all());
         if( $Country ){
            return $this->apiResponse(new CountryResoures($Country) ,null , 201);
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
          $Country = Country::find($id);
        if (empty($Country)){
            return $this->NotFound();
        }elseif($Country->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($Country);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }
}
