<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ShopOwner;
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

        $data['customers'] = Customer::where('shop_id',$shopOwnerId)->get();
        $data['title'] = 'Customer List';

        $data['shopOwnerName'] = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first();
        $data['serial'] = 1;

        
        return view('pages.customer.customer',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['title'] = 'Add Customer';
        $shopOwnerId = $request->header('shopOwnerId');
        $data['customers'] = Customer::where('shop_id',$shopOwnerId)->get();
        $data['shopOwnerName'] = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first();

        return view('pages.customer.create',$data);
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

        // return response()->json([

        //     'status' => 'success',
        //     'message' => 'Customer added successfully!'

        // ],200);

        return redirect(route('customer.index'));


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
            $data['title'] = 'Customer Edit';
            $data['shopOwnerId'] = $shopOwnerId;
            $data['shopOwnerName'] = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first();
            $data['customerDetails'] = $customer;
            return view('pages.customer.edit',$data);
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
            return redirect(route('customer.index'));
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
               return redirect(route('customer.index'));
                // return response()->json(['status'=>'success','message'=>'customer information deleted successfully!'],200);
            }else{
                return "access denied!";
            }


        }catch(Exception $e){
            return response()->json(['status'=>'failed','message'=>'something went wrong!']);
        }
    }
}
