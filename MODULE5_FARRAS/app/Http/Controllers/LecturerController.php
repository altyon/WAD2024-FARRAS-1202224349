<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturer = Lecturer::all();
        $nav = 'Lecturer Information';

        return view('lecturer.index', compact('lecturer', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Add Lecturer';
        return view('lecturer.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'lecturer_code' => 'required|string|max:3',
            'lecturer_name' => 'required|string',
            'nip' => 'required|integer|unique:lecturer,nip',
            'email' => 'required|email|unique:lecturer,email',
            'telephone_number' => 'required|integer',
        ]);

        try {
            // Attempt to insert the data
            Lecturer::create($validatedData);
            return redirect()->route('lecturer.index')->with('success', 'Lecturer successfully added');
        } catch (QueryException $exception) {
            // Check if it's a duplicate entry error
            if ($exception->errorInfo[1] == 1062) { // Error code 1062 is for duplicate entry
                return redirect()->back()->with('error', 'The NIP you entered already exists. Please use a unique NIP.');
            }
    
            // Handle other query exceptions
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        $nav = 'Lecturer Details - ' . $lecturer->lecturer_name;
        return view('lecturer.show', compact('lecturer', 'nav'));
    }

    public function edit($id)
    {
        $lecturer = Lecturer::findOrFail($id); //
        return view('lecturer.edit', compact('lecturer'));
    }

    public function update(Request $request, $id)
{
    $lecturer = Lecturer::findOrFail($id);

    // Validate incoming data
    $validatedData = $request->validate([
        'lecturer_code' => 'required|string|max:3',
        'lecturer_name' => 'required|string',
        'nip' => 'required|integer', // Ignore the current lecturer's NIP
        'email' => 'required|email',
        'telephone_number' => 'required|integer',
    ]);

    // Update the lecturer using the validated data
    $lecturer->update($validatedData);

    return redirect()->route('lecturer.index')->with('success', 'Lecturer updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();

        return redirect()->route('lecturer.index')->with('success', 'Lecturer successfully removed.');
    }
}
