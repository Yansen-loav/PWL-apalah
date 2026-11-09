<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";

        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::with(['major', 'schoolClass'])
            ->select('id', 'nis', 'name', 'gender', 'major_id', 'class_id', 'user_id')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn($query, $class) => $query->where('class_id', $class))
            ->when($major, fn($query, $major) => $query->where('major_id', $major))
            ->paginate(10)
            ->withQueryString();

        $schoolClasses = SchoolClass::all();
        $majors = Major::all();

        return view('students.index', compact(
            'title',
            'students',
            'schoolClasses',
            'majors'
        ));
    }

    public function show(Student $student)
    {
        $title = "Sistem Sekolah - Detail Siswa";

        $student->load(['major', 'schoolClass', 'user']);

        return view('students.show', compact('title', 'student'));
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";

        return view('students.create', [
            'title' => $title,
            'schoolClasses' => SchoolClass::all(),
            'majors' => Major::all(),
        ]);
    }

    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
            'schoolClasses' => SchoolClass::all(),
            'majors' => Major::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major_id' => ['required', 'exists:majors,id'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);

        Student::create($validatedRequest);

        return redirect()->route('students.index');
    }

    public function update(Student $student, Request $request)
    {
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major_id' => ['required', 'exists:majors,id'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);

        $student->update($validatedRequest);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
