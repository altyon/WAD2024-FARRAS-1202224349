<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::with('lecturer')->get();
        $nav = 'Student Information';

        return view('student.index', compact('student', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lecturer = Lecturer::all();
        $nav = 'Add Student';
        return view('student.create', compact('lecturer', 'nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nim' => 'required|integer|unique:student,nim',
            'student_name' => 'required|string',
            'email' => 'required|email|unique:student,email,',
            'major' => 'required|string',
            'dosen_id' => 'required|exists:lecturer,id',
        ]);

        $lecturer = Lecturer::find($request->dosen_id); // Find the lecturer by ID
    $student = new Student;
    $student->nim = $request->nim;
    $student->name = $request->student_name;
    $student->email = $request->email;
    $student->major = $request->major;
    $student->dosen_id = $request->dosen_id; // Associate lecturer
    $student->save(); // Save the student to the database

    // Redirect back to the student list with a success message
    return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $nav = 'Student Details - ' . $student->student_name;
        return view('student.show', compact('student', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id); // Find the student by ID
        $lecturer = Lecturer::all(); // Fetch all lecturers for the dropdown
        
        return view('student.edit', compact('student', 'lecturer')); // Pass data to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'nim' => 'required|integer|unique:student,nim,',
            'student_name' => 'required|string',
            'email' => 'required|email|unique:student,email,',
            'major' => 'required|string',
            'dosen_id' => 'required|integer',
        ]);

        $student->update($validatedData);

        return redirect()->route('student.index')->with('success', 'Student successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student successfully removed.');
    }
}
