<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
{
    public function create(Request $request)
    {
        $rules = [
            'name'=>'required|string',
            'course_id'=>'required|integer',
        ];

        //mengambil data dari body
        $data = $request->all();

        $validator = Validator::make($data,$rules);

        if($validator->fails()){
            return response()->json([
                'status'=>'error',
                'message'=>$validator->errors()
            ],400);
        }

        $coursesId = $request->input('course_id');
        $course = Course::find($coursesId);

        if(!$course){
            return response()->json([
                'status'=>'error',
                'message'=>'Course not found'
            ],404);
        }

        $chapter = Chapter::create($data);

        return response()->json([
            'status' => 'success',
            'data'=>$chapter
        ]);

    }
}
