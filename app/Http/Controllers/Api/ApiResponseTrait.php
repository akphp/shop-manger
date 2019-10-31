<?php

namespace App\Http\Controllers\Api;

trait  ApiResponseTrait{
	public $paginateNumber = 10;

	public function apiResponse($data = null , $error= null , $code =200)
	{
		$array = [
			'data'   => $data,
			'status' => in_array($code , $this->successCode())  == 200 ?true : false,
			'error'  => $error ,
		];
		return response($array , $code);
	}


	public function successCode()
	{
		return  [
			200 , 201 , 207
		];
		
	}
	 
	public function NotFound()
	{
		return $this->apiResponse(null , 'Not Found' , 404);
	}


}