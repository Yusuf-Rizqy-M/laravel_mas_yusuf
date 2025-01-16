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
        $students = Student::all();
        $students->load('grade.department'); // supaya efesien query nya

        return view('student', [
            'title' => 'Students',
            'students' => $students
            // 'students' => $students
            // 'students' =>[
            //     [
            //         'id' => 1,
            //         'nama' => 'Andhika Eka Santosa',
            //         'kelas' => '11 PPLG 2',
            //         'email' => 'andhikaeka@gmail.com',
            //         'alamat' => 'Kudus'
            //     ],
            //     [
            //         'id' => 2,
            //         'nama' => 'Raymond Aaron',
            //         'kelas' => '11 PPLG 2',
            //         'email' => 'aaron@gmail.com',
            //         'alamat' => 'Makassar'
            //     ],
            //     [
            //         'id' => 3,
            //         'nama' => 'Adlialfakhri Ziyadatullah',
            //         'kelas' => '11 PPLG 2',
            //         'email' => 'cheirne243@gmail.com',
            //         'alamat' => 'Semarang'
            //     ],
            //     [
            //         'id' => 4,
            //         'nama' => 'Yusuf Rizqy',
            //         'kelas' => '11 PPLG 2',
            //         'email' => 'usop@gmail.com',
            //         'alamat' => 'Kudus'
            //     ],
            //     [
            //         'id' => 5,
            //         'nama' => 'Narayana Cokro',
            //         'kelas' => '11 PPLG 2',
            //         'email' => 'ricokro@gmail.com',
            //         'alamat' => 'Kediri'
            //     ],
            // ]

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
