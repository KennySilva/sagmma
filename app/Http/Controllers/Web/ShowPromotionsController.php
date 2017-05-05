<?php

namespace Sagmma\Http\Controllers\Web;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Promotion;


class ShowPromotionsController extends Controller
{
    public function index()
    {
        $slidePromotions = Promotion::orderBy('name', 'desc')->take(4)->get();
        $slidePromotions->each(function($slidePromotions){
            $slidePromotions->product;
            $slidePromotions->trader;
        });
        $allPromotions = Promotion::where('status', true)->get();
        $allPromotions->each(function($allPromotions){
            $allPromotions->product;
            $allPromotions->trader->load('places');
        });
        // dd($allPromotions);
        return view('_frontend.web.showPromotions.promotions', ['slidePromotions' => $slidePromotions, 'allPromotions' => $allPromotions]);
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
