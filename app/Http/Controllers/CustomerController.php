<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $shopOwnerId = $request->header('shopOwnerId');

        $customers = Customer::where('shop_id',$shopOwnerId)->get();
        
        return $customers;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "customer create page";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shopOwnerId = $request->header('shopOwnerId');

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status'=>'required',
            
        ]);

     
       
       try{

         Customer::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'shop_id' => $shopOwnerId,
           
        ]);

        return response()->json([

            'status' => 'success',
            'message' => 'Customer added successfully!'

        ],200);


       }catch(Exception $e){

            return response()->json([
                'status' => 'failed',
                'message' => 'something went wrong!'
            ]);

       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer,Request $request)
    {
        $shopOwnerId = $request->header('shopOwnerId');

        if($customer->shop_id==$shopOwnerId){
            return $customer;
        }else{
            return "Customer information restricted for this shop owner";
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer,Request $request)
    {
        $shopOwnerId = $request->header('shopOwnerId');

        if($customer->shop_id==$shopOwnerId){
            return $customer;
        }else{
            return "Customer information restricted for this shop owner";
        }

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCustomer(Request $request, $customerId)
    {
        $shopOwnerId = $request->header('shopOwnerId');
        $customerId = $customerId;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status'=>'required',
            
        ]);

     
       
       try{

         $result = Customer::where('shop_id',$shopOwnerId)->where('id',$customerId)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            
           
        ]);

        if($result){
            return response()->json(['status'=>'success','message'=>'customer information updated successfully!'],200);
        }else{
            return "access denied!";
        }


       }catch(Exception $e){

            return response()->json([
                'status' => 'failed',
                'message' => 'something went wrong!'
            ]);

       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCustomer(Request $request,$customerId)
    {
        $shopOwnerId = $request->header('shopOwnerId');
        
        try{
            

           $result = Customer::where('shop_id',$shopOwnerId)->where('id',$customerId)->delete();

            if($result){
                return response()->json(['status'=>'success','message'=>'customer information deleted successfully!'],200);
            }else{
                return "access denied!";
            }


        }catch(Exception $e){
            return response()->json(['status'=>'failed','message'=>'something went wrong!']);
        }
    }
}
