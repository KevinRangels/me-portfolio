<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use Validator;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
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

    public function getAllProject()
    {
        $project = Project::all();
        return $this->sendResponse($project->toArray(), 'Tecnologias obtenidas con exito.');
    }
    public function getProject($id)
    {
        $project = Project::find($id);
        return $this->sendResponse($project->toArray(), 'Tecnologias obtenida con exito.');
    }

    public function storeProject(Request $request)
    {
        // $validator = Validator::make($input, [
        //     'technology_id' => 'required',
        //     'name' => 'required',
        //     'description' => 'required',
        //     'contribution' => 'required',
        //     'link' => 'required',
        //     'img_url' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error.', $validator->errors());
        // }
        
        if($request->hasfile('images'))
         {
            foreach($request->file('images') as $file)
            {
                $name_file = time().'.'.$file->extension();
                Storage::disk('uploads')->put("files/projects/".$request->get('name')."/".$name_file,  \File::get($file));  
                $data[] = $name_file;  
            }
         }

          $project = new Project();
          $project->technology_id = $request->get('technology_id');
          $project->name = $request->get('name');
          $project->description = $request->get('description');
          $project->contribution = $request->get('contribution');
          $project->link = $request->get('link');
          $project->images = json_encode($data);
          $project->date = $request->get('date');
          $project->save();
        return $this->sendResponse($project->toArray(), 'Project created successfully.');
    }

    public function updatedImagesProject($id, Request $request)
    {
      $project = Project::findOrFail($id);
      if($request->hasfile('images'))
         {
            foreach($request->file('images') as $file)
            {
                $name_file = time().'.'.$file->extension();
                Storage::disk('uploads')->put("files/projects/".$project->name."/".$name_file,  \File::get($file));  
                $data[] = $name_file;  
            }
         }

      $project->images = json_encode($data);
      $project->update();
      return $this->sendResponse($project->toArray(), 'Imagenes actualizadas');
    }


    public function editProject($id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'technology_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'contribution' => 'required',
            'link' => 'required',
            'img_url' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $project = Project::findOrFail($id);
        $project->update($request->all());
        $project->request = $request->all();

        return $this->sendResponse($project->toArray(), 'Technology actualizada con exito.');
    }


    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return $this->sendResponse($project->toArray(), 'Technology deleted successfully.');
    }
}
