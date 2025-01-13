<?php

namespace App\Http\Controllers;

use App\Models\AgeCategory;
use App\Models\PriceCategory;
use App\Models\UnitCategory;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class AllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['UnitCategory'] = UnitCategory::where('is_active', 1)->latest()->get();
        $data['AgeCategory'] = AgeCategory::where('is_active', 1)->latest()->get();
        $data['PriceCategory'] = PriceCategory::where('is_active', 1)->latest()->get();
        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
