<?php

namespace App\Http\Controllers;

use App\Models\Junkshop;
use App\Models\JunkshopRate;
use Illuminate\Http\Request;

class JunkshopRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('junkshop.pages.rates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'junkshop_id' => 'required|exists:junkshops,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'required',
        ]);

        $junkshop = Junkshop::where('id', $data['junkshop_id'])->first();
        $junkshop->rates()->create($data);

        return redirect()->route('junkshop.pages.index')->with('success', 'Added rates succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JunkshopRate $junkshopRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JunkshopRate $junkshopRate)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JunkshopRate $junkshopRate)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'unit' => 'required',
        ]);

        $junkshopRate->update($data);

        return redirect()->route('junkshop.pages.index')->with('success', 'Edited rates succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JunkshopRate $junkshopRate)
    {
        $junkshopRate->delete();

        return redirect()->route('junkshop.pages.index')->with('success', 'Deleted rate succesfully');
    }
}
