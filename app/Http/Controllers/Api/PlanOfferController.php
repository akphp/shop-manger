<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\PlanOffer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PlanOfferResource;


class PlanOfferController extends Controller
{
        use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data =  PlanOfferResource::collection(PlanOffer::paginate($this->paginateNumber) );
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
            'offer_title'=>'required',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'discount_perc_by_year'=>'required',
            'discount_val_by_year'=>'required',
            'flag_active'=>'required',
            'user_id'=>'required' ,
            'discount_val_by_month'=>'required',
            'discount_perc_by_month'=>'required',

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }

         $order =  PlanOffer::create($request->all());
         if( $order ){
            return $this->apiResponse(new PlanOfferResource($order) ,null , 201);
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
        $PlanOffer =PlanOffer::find($id);
        if($PlanOffer)
        {
           return $this->apiResponse(new PlanOfferResource($PlanOffer));
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

        $validation = Validator::make($request->all(),[
            'offer_title'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'discount_perc_by_year'=>'required',
            'discount_val_by_year'=>'required',
            'flag_active'=>'required',
            'user_id'=>'required' ,
            'discount_val_by_month'=>'required',
            'discount_perc_by_month'=>'required',

        ]);

        if ($validation->fails()){
            return $this->apiResponse(null , $validation->errors() , 422);
            // return response()->json(['status'=>'error','errors'=> $validation->errors()],422);
        }
        $offer = PlanOffer::findOrFail($id);
        if (!$offer){
            return $this->NotFound();
       }
        $offer->update($request->all());
        if( $offer ){
            return $this->apiResponse(new PlanOfferResource($offer) ,null , 201);
         }
         return $this->apiResponse(null ,"Un know Error " , 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PlanOffer = PlanOffer::find($id);
        if (empty($PlanOffer)){
            return $this->NotFound();
        }elseif($PlanOffer->delete()){
            // return response()->json(['status'=>'success','data'=>$plan],200);
            return $this->apiResponse($PlanOffer);
        }else{
            return $this->apiResponse(null , "error" , 500);
        }
    }
}
