<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() 
    {
    $title = "Sistem Sekolah - Daftar Siswa";
    $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
    
    ->get();
    return view('students.index', [
        'title'=> $title,
        'students'=> $students
    ]);

    }

    public function show(Student $student)
    {
        
    
        $title = "Sistem Sekolah - Halaman Siswa";

        return view('students.show', [
            'title'=> $title,
            'student' => $student
        ]);
        
    }

    public function create() 
    {
    $title = "Sistem Sekolah - Tambah Siswa";
    return view('students.create', [
        'title'=> $title
    ]);

    }

    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        return view('students.edit', [
            'title'=> $title,
            'student' => $student
        ]);
    }

    public function store (StoreRequest $request)
    {
        $validatedRequest = $request->validated();

        Student::create($validatedRequest);

        return redirect()->route('students.index');
    }

    public function update (Student $student, UpdateRequest $request)

    {
      $validatedRequest = $request->validated();

        $student->update($validatedRequest);

        return redirect()->route('students.index');
    }

    public function destroy (Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
