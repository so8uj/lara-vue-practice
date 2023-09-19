<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function all_students(){
        $students = Student::latest()->get();
        return $students;
    }

    public function add_student(Request $request){
        // Form Data Validation
        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'roll' => 'required|integer',
            'department' => 'required|string',
            'batch' => 'required|string',
        ]);

        // Show error if validation fails
        if($validate->fails()){
            $response = [
                'status' => 400,
                'success' =>false,
                'message' => $validate->errors()
            ];
            return response()->json($response,400);
        }
        
        // insert Student data
        Student::insert($request->except('id'));

        $students = Student::latest()->get();
        $response = [
            'status' => 200,
            'success' =>true,
            'message' => [
                'student_added' => [
                    '0'=> 'Student Added Successfully!'
                ]
            ],
            'students'=> $students
        ] ;

        // return response
        return response()->json($response,200);
    }

    public function update_student(Request $request){
        // Validate Data

        $validate = Validator::make($request->all(),[
            'name'=>'required|string',
            'roll'=>'required|integer',
            'department'=>'required|string',
            'batch'=>'required|string',
        ]);

        // Show Errors if validation Fails

        if($validate->fails()){
            $response = [
                'status'=> 400,
                'stuccess'=>false,
                'message'=> $validate->errors()
            ];
            return response()->json($response,400);
        }
        // Update Data
        Student::find($request->id)->update($request->except('id'));
        $students = Student::latest()->get();
        // Return response with Updated Data
        $response = [
            'status' => 200,
            'success' =>true,
            'message' => [
                'student_added' => [
                    '0'=> 'Student Updated!'
                ]
            ],
            'students'=> $students
        ] ;

        // return response
        return response()->json($response,200);

    }
    public function delete_student($id){
        return $id;
    }

}
