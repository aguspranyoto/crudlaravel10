<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with([
            'students' => Students::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $validate = $request->validated();

        $students = new Students;
        $students->idstudents = $request->idstudents;
        $students->fullname = $request->fullname;
        $students->gender = $request->gender;
        $students->address = $request->address;
        $students->emailaddress = $request->emailaddress;
        $students->phone = $request->phone;
        $students->save();

        return redirect('students')->with('msg','Add New Students Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        return view('students.formedit')->with([
            'idstudents' => $idstudents,
            'fullname' => $data->fullname,
            'gender' => $data->gender,
            'address' => $data->address,
            'emailaddress' => $data->emailaddress,
            'phone' => $data->phone,
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students, $idstudents)
    {
        $data = $students->find($idstudents);
        $data->fullname = $request->fullname;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->emailaddress = $request->emailaddress;
        $data->phone = $request->phone;
        $data->save();

        return redirect('students')->with('msg','Update data dengan nama '.$data->fullname.' berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        $data->delete();
        return redirect('students')->with('msg','Delete data dengan nama '.$data->fullname.' berhasil');
    }
}
