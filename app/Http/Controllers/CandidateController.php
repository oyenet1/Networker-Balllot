<?php

namespace App\Http\Controllers;

use App\Office;
use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    //
    public function index(Office $office)
    {
        $candidates = Candidate::with('office')->get();

        return view('candidate.index', compact('office', 'candidates'));
    }

    public function candidate(Office $office)
    {

        $candidates = Candidate::with('office')->get();
        return view('candidate', compact('office', 'candidates'));
    }

    public function create(Office $office)
    {
        $candidates = Candidate::all();

        return view('candidate.create', compact('office', 'candidates'));
    }

    public function store(Office $office, Request $request)
    {


        $data = request()->validate([
            'name' => 'required|unique:candidates',
            'image' => 'required|image|unique:candidates|mimes:jpeg,bmp,png,gif|max:1024',
            'details' => 'required',
            'votes' => '',
        ]);
        if (request()->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $file->move('uploads/candidate/', $imageName);
        }

        $candidates = $office->candidates()->create(array_merge(
            $data,
            ['image' => $imageName]
        ));


        return redirect()->route('offices.show', $office->id)->with('success', $data['name'] . ' has been add to ' . $office->name . ' candidate add more candidate(s) or go back to position');
    }

    public function show(Office $office, Candidate $candidate)
    {

        return view('candidate.show', compact('candidate', 'office'));
    }

    public function edit(Office $office, Candidate $candidate)
    {
        return view('candidate.edit', compact(['office', 'candidate']));
    }

    public function update(Request $request, Office $office, Candidate $candidate)
    {
        $data = request()->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png,gif|max:1024',
            'details' => 'required',
            'votes' => '',
        ]);
        if (request()->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $file->move('uploads/candidate/', $imageName);
        }

        $candidates = $candidate->update(array_merge(
            $data,
            ['image' => $imageName]
        ));
        return redirect()->route('offices.show', $office->id)->with('success', 'Candidate updated successfully');
    }
    public function destroy(Office $office, Candidate $candidate)
    {
        $candidate = $candidate->delete();
        return redirect()->route('offices.show', $office->id)->with('success', 'Candidate has been deleted');
    }
}
