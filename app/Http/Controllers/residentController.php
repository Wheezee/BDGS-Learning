<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class residentController extends Controller
{
    public function addResidents(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'zone' => 'required',
            'birthday' => 'required'
        ]);
        Resident::create($fields);
        return back()->with('message', "<script>alert('Resident added successfully!');</script>");
    }

    public function index() {
        $residents = Resident::all(); // Fetch all residents
        return view('residents', ['residents' => $residents]); // Pass data to the view
    }
}
