<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResoures;
use App\Model\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  CityResoures::collection(City::paginate($this->paginateNumber));
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
            'city_name'=>'required',
            'country_id'=>'required',
             'is_active'=>'required',
            //  'store_id' =>'required',
              'user_id' =>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
  
         $city =  City::create($request->all());
         if( $city ){
            return $this->apiResponse(new CityResoures($city) ,null , 201);
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
        $city = City::find($id);
        if($city)
        {
           return $this->apiResponse(new CityResoures($city));
        }

        return $this->NotFound();
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
        $city = City::find($id);
        if (empty($city)){
             return $this->apiResponse(null , 'the city is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'city_name'=>'required',
            'country_id'=>'required',
             'is_active'=>'required',
            //  'store_id' =>'required',
              'user_id' =>'required'

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $city->update($request->all());
         if( $city ){
            return $this->apiResponse(new CityResoures($city) ,null , 201);
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
        $city = City::find($id);
        if (empty($city)){
            return $this->NotFound();
        }elseif($city->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($city);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }
}
