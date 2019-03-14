<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SpotLightProduct;
use App\Product;
use Lang;
class AdminSpotLightProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = array('pageTitle' => Lang::get("labels.ListingCountries"));    
        $result['products'] =Product::join('products_description','products_description.products_id','=','products.products_id')
                    ->select('products.*','products_description.products_name')
                    ->where('products_quantity','>','0')
                    ->where('products.products_status', '=', 1)
                    ->where('products_description.language_id','=',1)
                    ->groupBy('products.products_id')
                    ->get();
                     
        $spotlightproduct =SpotLightProduct::where('spot_light_products.spot_light_status', '=', 1)
                    ->select('products_id')
                    ->orderBy('spot_light_products.spot_light_id', 'desc')
                    ->get();
        $selected=[];
        foreach ($spotlightproduct as $key => $value) {
             $selected[]=$value->products_id;
        } 
        $result['spotlightproduct']=$selected;                       
         
        return view("admin.spotlightproduct", $title)->with('result', $result);

    }

    public function updateSpotLightProducts(Request $request)
    {
        SpotLightProduct::where('spot_light_status', '=', 1)->update(['spot_light_status'=>0]);
        if( count($request->product_ids)) {

            foreach ($request->product_ids as $key => $value) 
            {
                SpotLightProduct::updateOrcreate(['products_id'=>$value],[
                        'spot_light_status'         =>    1,
                        'products_id'   =>    $value,
                    ]);
            } 
        }

        return redirect()->back()->withSuccess('Product updated successfully.');
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SpotLightProduct  $spotLightProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SpotLightProduct $spotLightProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SpotLightProduct  $spotLightProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SpotLightProduct $spotLightProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SpotLightProduct  $spotLightProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpotLightProduct $spotLightProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SpotLightProduct  $spotLightProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpotLightProduct $spotLightProduct)
    {
        //
    }
}
