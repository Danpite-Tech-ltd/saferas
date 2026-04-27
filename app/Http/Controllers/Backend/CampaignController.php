<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('backend.content.campaign.index',compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status', 'Active')->get();
        return view('backend.content.campaign.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'oldprice_title' => 'nullable|string|max:255',
            'price_title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'product_id' => 'required|array',
        ]);

        $campaign = new Campaign();
        $campaign->title = $request->title;
        $campaign->subtitle = $request->subtitle;
        $campaign->oldprice_title = $request->oldprice_title;
        $campaign->price_title = $request->price_title;
        $campaign->description = $request->description;
        $campaign->product_id = json_encode($request->product_id);

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/images/campaign/';
            $image->move($imagePath, $imageName);

            $campaign->image   = $imagePath . $imageName;
        }

        $campaign->save();

        return redirect()->route('admin.campaigns.index')->with('success', 'Campaign Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
