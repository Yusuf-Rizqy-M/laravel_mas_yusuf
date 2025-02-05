<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Http\Request;

class GradeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with(['students', 'department'])->latest()->get();
        return view('admin.grade.index', compact('grades'), [
            'title' => 'Grades',
            'grades' => $grades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grade.create', [
            'title' => 'Create New Grade',
            'departments' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id', // Optional jika otomatis
        ]);

        // Jika department_id tidak diisi, otomatis pilih berdasarkan logika tertentu
        if (!$validated['department_id']) {
            // Contoh logika otomatis, cari department berdasarkan nama grade
            $department = Department::where('name', 'LIKE', '%' . $validated['name'] . '%')->first();

            // Jika department ditemukan, set department_id
            if ($department) {
                $validated['department_id'] = $department->id;
            } else {
                // Jika tidak ditemukan, pilih default department atau buat error
                return redirect()->back()->withErrors([
                    'department_id' => 'No matching department found for the grade name.'
                ]);
            }
        }

        // Simpan data grade ke dalam tabel grades
        $grade = Grade::create([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        // Redirect atau response sukses
        return redirect('/admin/grades')->with('success', 'Grade created successfully.');
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
        // Ambil data grade berdasarkan ID
        $grade = Grade::findOrFail($id);

        // Ambil data departments untuk pilihan pada form
        $departments = Department::all();

        // Tampilkan halaman edit dengan data grade dan departments
        return view('admin.grade.edit', [
            'title' => 'Edit Grade Data',
            'grade' => $grade,
            'departments' => $departments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang dikirimkan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'nullable|exists:departments,id', // Optional jika otomatis
        ]);

        // Cari data grade berdasarkan ID
        $grade = Grade::findOrFail($id);

        // Jika department_id tidak diisi, otomatis pilih berdasarkan logika tertentu
        if (!$validated['department_id']) {
            // Contoh logika otomatis, cari department berdasarkan nama grade
            $department = Department::where('name', 'LIKE', '%' . $validated['name'] . '%')->first();

            // Jika department ditemukan, set department_id
            if ($department) {
                $validated['department_id'] = $department->id;
            } else {
                // Jika tidak ditemukan, pilih default department atau buat error
                return redirect()->back()->withErrors([
                    'department_id' => 'No matching department found for the grade name.'
                ]);
            }
        }

        // Update data grade
        $grade->update([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/grades')->with('success', 'Grade updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data grade berdasarkan ID
        $grade = Grade::findOrFail($id);

        // Hapus data grade
        $grade->delete();

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/grades')->with('success', 'Grade deleted successfully.');
    }
}
