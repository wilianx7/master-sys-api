<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\Student\StudentResource;
use App\Http\Resources\Student\StudentResourceCollection;
use App\Models\Address;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        return new StudentResourceCollection(Student::with(['address'])->get());
    }

    public function show($id)
    {
        $student = Student::query()->with(['address'])->find($id);

        if ($student) {
            return new StudentResource($student);
        }

        return response([], 404);
    }

    public function store(StudentRequest $request)
    {
        $address = Address::query()->create($request->input('address_data'));

        $studentData = $request->input('student_data');
        $studentData['address_id'] = $address->id;

        $student = Student::query()->create($studentData);

        return new StudentResource($student);
    }

    public function update(StudentRequest $request, $id)
    {
        $student = Student::query()->find($id);

        if ($student) {
            if ($request->input('address_data')) {
                $student->address()->update($request->input('address_data'));
            }

            $studentData = $request->input('student_data');

            if (!array_key_exists('address_id', $studentData)) {
                $studentData['address_id'] = $student->address->id;
            }

            $student->update($studentData);

            return new StudentResource($student);
        }

        return response([], 404);
    }

    public function destroy(Request $request, $id)
    {
        $student = Student::query()->find($id);

        if ($student) {
            $student->delete();
            return response([], 200);
        }

        return response([], 404);
    }
}
