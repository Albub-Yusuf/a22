<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Customer;
use App\Models\ShopOwner;
use Exception;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    function index(Request $request){

        $shopOwnerId = $request->header('shopOwnerId');

        $data['campaigns'] = Campaign::where('shop_id',$shopOwnerId)->get();
        $data['title'] = 'Campaign List';

        $data['shopOwnerName'] = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first();
        $data['serial'] = 1;

        return view('pages.campaign.campaign',$data);
    }


    function create(Request $request){

        $data['title'] = 'Create Campaign';
        $shopOwnerId = $request->header('shopOwnerId');
        $data['campaigns'] = Campaign::where('shop_id',$shopOwnerId)->get();
        $data['shopOwnerName'] = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first();

        return view('pages.campaign.create',$data);

    }

    function store(Request $request){

        $shopOwnerId = $request->header('shopOwnerId');

        

        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'url' => 'required'
            
        ]);

     
       
       try{

         Campaign::create([
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'url' => $request->input('url'),
            'shop_id' => $shopOwnerId
           
        ]);


        return redirect(route('campaign.index'));


       }catch(Exception $e){

            return response()->json([
                'status' => 'failed',
                'message' => 'something went wrong!'
            ]);

       }

    }

    function show(Campaign $campaign,Request $request)
    {
        $shopOwnerId = $request->header('shopOwnerId');

        if($campaign->shop_id==$shopOwnerId){
            return $campaign;
        }else{
            return "Campaign information restricted for this shop owner";
        }

    }


    function edit(Campaign $campaign,Request $request)
    {
        $shopOwnerId = $request->header('shopOwnerId');

        if($campaign->shop_id==$shopOwnerId){
            $data['title'] = 'Campaign Edit';
            $data['shopOwnerId'] = $shopOwnerId;
            $data['shopOwnerName'] = ShopOwner::where('id',$shopOwnerId)->select('firstName','lastName')->first();
            $data['campaignDetails'] = $campaign;
            return view('pages.campaign.edit',$data);
        }else{
            return "Campaign information restricted for this shop owner";
        }

        
    }


    function updateCampaign(Request $request, $campaignId)
    {
        $shopOwnerId = $request->header('shopOwnerId');
        $campaignId = $campaignId;

        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'url' => 'required'
            
        ]);

        
       
       try{

         $result = Campaign::where('shop_id',$shopOwnerId)->where('id',$campaignId)->update([
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'url' => $request->input('url')     
           
        ]);

        if($result){
            return redirect(route('campaign.index'));
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


    function deleteCampaign(Request $request,$campaignId)
    {
        $shopOwnerId = $request->header('shopOwnerId');
        
        try{
            

           $result = Campaign::where('shop_id',$shopOwnerId)->where('id',$campaignId)->delete();

            if($result){
               return redirect(route('campaign.index'));
                // return response()->json(['status'=>'success','message'=>'customer information deleted successfully!'],200);
            }else{
                return "access denied!";
            }


        }catch(Exception $e){
            return response()->json(['status'=>'failed','message'=>'something went wrong!']);
        }
    }


    
}
