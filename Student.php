<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_we;

class studentController extends Controller
{
    function showStudents(){
        $data = student_we::all();
        return response()->json(['student_details',$data],200);
    } 

    // function showStudent($id){
    //     $data = stuudent_we::all()-where ('id',$id);
    //     return response()->json(['student_details',$data],200);
    // } 
    function showStudent($id){
        // $data = student_we::all()-find ('id',$id);
        $data = student_we::where('id', $id)->get();

        if($data){
            return response()->json(['student_details'=>$data],200);
        }
        else{
            return response()->json(['student_details' => "Data not found for the ID"], 404);

        }
    } 

    function deleteStudentDetails($id){
        $data = student_we::find($id);
       
        if($data){
            $data->delete();
            return response()->json(['student_details_deleted'=>"Data success fully Deleted"],200);}
            else{
                return response()->json(['student_details_deleted'=>"Data not  Deleted"],200);}
    
            }


            function storeStudentDetails(Request $request){
                $data = new student_we;
                $data->name = $request->name;
                $data->nic = $request->nic;
                $data->course = $request->course;
                $data->phone = $request->phone;

                $data->save();
                return response()->json(['Student Details Add'=>"Student Data Successfully Added"],200);
            } 
}
