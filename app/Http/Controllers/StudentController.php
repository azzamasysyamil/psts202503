<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('p')) {
            $student = Student::search(request('p'))->paginate(20);
        } else {
           $student = Student::orderBy('name', 'ASC')->paginate(10);
        }
        $data['student'] = $student;
        return view('student_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:laki-laki,perempuan',
            'email' => 'required|email',
            'phone' => 'required',
            'grade' => 'required',
        ]);
        $student = new \App\Models\student();
        $student->name = $requestData['name'];
        $student->gender = $requestData['gender'];
        $student->email = $requestData['email'];
        $student->phone = $requestData['phone'];
        $student->grade = $requestData['grade'];
        $student->save();
        return redirect('/student')->with('pesan', 'Data sudah disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['student'] = \App\Models\Student::findOrFail($id);
        return view("student_edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'gender' => 'required|in:laki-laki,perempuan',
            'email' => 'required|email',
            'phone' => 'required',
            'grade' => 'required',
        ]);
        $student = \App\Models\Student::findOrFail($id);
        $student->name = $requestData['name'];
        $student->gender = $requestData['gender'];
        $student->email = $requestData['email'];
        $student->phone = $requestData['phone'];
        $student->grade = $requestData['grade'];
        $student->save();
        return redirect('/student')->with('pesan', 'Data sudah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {        
        $student = \App\Models\Student::findOrFail($id);
        $student->delete();
        return back()->with('pesan', 'Data sudah dihapus');
    }
}
