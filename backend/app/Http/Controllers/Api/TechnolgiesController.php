<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Technology;
use Validator;
use Illuminate\Support\Facades\Storage;

class TechnolgiesController extends Controller
{
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    public function getAllTechnolgy()
    {
        $technolgy = Technology::with('language')->get();
        foreach ($technolgy as $key => $value) {
            $value->skills = json_decode($value->skills);
            $value->image =  url('/').'/uploads/technologies/'.$value->image;
        }
        return $this->sendResponse($technolgy->toArray(), 'Tecnologias obtenidas con exito.');
    }
    public function getTechnolgy($id)
    {
        $technolgy = Technology::with('language')->where('id', $id)->get();
        foreach ($technolgy as $key => $value) {
            $value->skills = json_decode($value->skills);
            $value->image =  url('/').'/uploads/technologies/'.$value->image;
        }
        return $this->sendResponse($technolgy->toArray(), 'Tecnologia obtenida con exito.');
    }

    public function storeTechnolgy(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'branch' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $name_file = time()."_".$file->getClientOriginalName();
            Storage::disk('uploads')->put("uploads/technologies/".$name_file,  \File::get($file));  
         } else {
            $name_file = null;
         }

        $arraySkills = explode(",", $request->skills);
        foreach($arraySkills as $skill)
          {
            $skills[] = $skill;  
          }
        $technology = new Technology;
        $technology->language_id = $request->language_id;
        $technology->name = $request->name;
        $technology->description = $request->description;
        $technology->branch = $request->branch;
        $technology->skills = json_encode($skills);
        $technology->image = $name_file;
        $technology->save();
        return $this->sendResponse($technology->toArray(), 'Technology created successfully.');
    }


    public function editTechnolgy($id, Request $request)
    {
        $technology = Technology::findOrFail($id);
        // $input = $request->all();

        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'branch' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
        $arraySkills = explode(",", $request->skills);
        foreach($arraySkills as $skill)
         {
           $skills[] = $skill;  
         }
        $technology->language_id = $request->language_id;
        $technology->name = $request->name;
        $technology->description = $request->description;
        $technology->branch = $request->branch;
        $technology->skills = json_encode($skills);

        if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $name_file = time()."_".$file->getClientOriginalName();
            Storage::disk('uploads')->put("uploads/technologies/".$name_file,  \File::get($file));  
         } else {
            $name_file = $technology->image;
         }
        $technology->image = $name_file;

        $technology->update();
        return $this->sendResponse($technology->toArray(), 'Technology actualizada con exito.');
    }

    public function updatedImage($id, Request $request)
    {
        $technolgy = Technology::findOrFail($id);
        if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $name_file = time()."_".$file->getClientOriginalName();
            Storage::disk('uploads')->put("uploads/technologies/".$technolgy->name."/".$name_file,  \File::get($file));  
         }
        $technolgy->image = $name_file;
        $technolgy->update();
        return $this->sendResponse($technolgy->toArray(), 'Imagen actualizada');
    }


    public function destroyTechnolgy($id)
    {
        $technolgy = Technology::findOrFail($id);
        $technolgy->delete();
        return $this->sendResponse($technolgy->toArray(), 'Technology deleted successfully.');
    }
}
