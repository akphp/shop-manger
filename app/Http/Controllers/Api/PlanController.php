<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlanResource;
use App\Model\Plan;

class PlanController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  PlanResource::collection(Plan::paginate($this->paginateNumber));
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
            'plan_title'=>'required',
            'plan_modules'=>'required',
            'price_month'=>'required',
            'price_year'=>'required',
            'currency_id'=>'required',
            'plan_level'=>'required',
            'no_inventory'=>'required',
            'no_pos'=>'required',
            'no_emp'=>'required',
            'no_item'=>'required',
            'flag'=>'required',
            'hasoffer'=>'required',
            'user_id'=>'required',
            'description'=>'required',

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
  
         $plan =  Plan::create($request->all());
         if( $plan ){
            return $this->apiResponse(new PlanResource($plan) ,null , 201);
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
         $plan =Plan::find($id);
        if($plan)
        {
           return $this->apiResponse(new PlanResource($plan));
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
        $plan = Plan::find($id);
        if (empty($plan)){
             return $this->apiResponse(null , 'the category is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'plan_title'=>'required',
            'plan_modules'=>'required',
            'price_month'=>'required',
            'price_year'=>'required',
            'currency_id'=>'required',
            'plan_level'=>'required',
            'no_inventory'=>'required',
            'no_pos'=>'required',
            'no_emp'=>'required',
            'no_item'=>'required',
            'flag'=>'required',
            'hasoffer'=>'required',
            'user_id'=>'required',
            'description'=>'required',

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $plan->update($request->all());
         if( $plan ){
            return $this->apiResponse(new PlanResource($plan) ,null , 201);
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
         $plan = Plan::find($id);
        if (empty($plan)){
            return $this->NotFound();
        }elseif($plan->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($plan);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }


     public function AcivePlan(Request $request, $id)
    {
        $plan = Plan::find($id);
        if (empty($plan)){
             return $this->apiResponse(null , 'the category is not found' , 404);
        }
         $validation = Validator::make($request->all(),[
            'flag'=>'required',
        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

        $plan->update($request->all());
         if( $plan ){
            return $this->apiResponse("Success acive Plan" ,null , 201);
         }
         return $this->NotFound();
    }
}
