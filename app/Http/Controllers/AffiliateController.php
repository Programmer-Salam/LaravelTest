<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliate;

class AffiliateController extends Controller
{
    public function insertAffiliate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'players' => 'required|string',
            'commission_type' => 'required|string',
            'commission_rate' => 'required|numeric',
            'currency' => 'required|string',
            'network_type' => 'required|string',
            'network_link' => 'required|url',
            'affiliate_note' => 'nullable|string|min:10',
        ]);

        // Insert the affiliate data into the database
        // $affiliate = new Affiliate();
        // $affiliate->players = $request->input('players');
        // $affiliate->commission_type = $request->input('commission_type');
        // $affiliate->commission_rate = $request->input('commission_rate');
        // $affiliate->currency = $request->input('currency');
        // $affiliate->network_type = $request->input('network_type');
        // $affiliate->network_link = $request->input('network_link');
        // $affiliate->affiliate_note = $request->input('affiliate_note');
        // $affiliate->save();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Affiliate created successfully!');
    }
}
