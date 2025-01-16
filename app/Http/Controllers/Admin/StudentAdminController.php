<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('grade')->latest()->get();
        return view('admin.student.index', compact('students'), [
            'title' => "Students",
            'students' => $students
            // 'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create', [
            "title" => "Create New Data",
            'grades' => Grade::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required',
            'telepon'   => 'required|string|max:255',
            'address'   => 'required|string|max:255',
        ]);

        // Simpan data student ke dalam tabel students
        $student = Student::create([
            'name'    => $validated['name'],
            'grade_id'=> $validated['grade_id'],
            'email'   => $validated['email'],
            'telepon' => $validated['telepon'],
            'address' => $validated['address'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/students')->with('success', 'Student created successfully.');
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
        // Ambil data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Ambil data grades untuk pilihan pada form
        $grades = Grade::all();

        // Tampilkan halaman edit dengan data siswa dan grades
        return view('admin.student.edit', [
            'title' => 'Edit Student Data',
            'student' => $student,
            'grades' => $grades
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'email'     => 'required|email|max:255',
            'telepon'   => 'required|string|max:255',
            'address'   => 'required|string|max:255',
        ]);

        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Update data siswa
        $student->update([
            'name'     => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'email'    => $validated['email'],
            'telepon'  => $validated['telepon'],
            'address'  => $validated['address'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Hapus data siswa
        $student->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student deleted successfully.');
    }
}
