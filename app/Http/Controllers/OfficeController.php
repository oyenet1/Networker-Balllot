<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $offices = Office::all();
        return view('offices.index', compact('offices'));
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

        request()->validate(['name' => ['required', 'max:50', 'unique:offices'],]);
        $office = new Office();
        $office->name = request()->name;
        $office->save();

        return redirect()->back()->with('success', $request->name . ' Has been added to position Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        $office->load('candidates')->orderBy('votes', 'desc');
        return view('offices.show', compact('office'));
    }

    public function edit(Office $office)
    {
        return view('offices.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        //
        $data = request()->validate(['name' => 'required']);
        $office->update([
            'name' => $data['name'],
        ]);
        return redirect()->route('offices.index')->with('success', 'Position updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
        $office->delete();
        return redirect()->route('offices.index')->with('success', 'Position has been deleted');
    }
}
