<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\Project_Technology;
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

    public function getAllProject(Request $request)
    {
        $projects = Project::foo($request->technology);
        $data = $request->all();
        if (isset($data['name'])) {
            $name = $data['name'];
            $projects->where('name', 'like', "%$name%");
        }
        $projects = $projects->get();
        // $projects = Project::with('technologies')->get();
        foreach ($projects as $key => $valueProject) {
            $valueProject->images = json_decode($valueProject->images);
             if ($valueProject->image_order !== null) {
                $valueProject->image_order = json_decode($valueProject->image_order);
             }
        }
        foreach ($projects as $key => $value) {
            // Get All Images
            foreach ($value->images as $key => $valueImage) {
                $images[] =  url('/').'/uploads/projects/'.$valueImage;
            }
            // Get Images Order
            if ($valueProject->image_order !== null) {
                foreach ($value->image_order as $key => $valueImage) {
                    $image_order[] =  url('/').'/uploads/projects/'.$valueImage;
                }
              } else {
                  $image_order = []; 
              }
            $value->images =  $images;
            $value->image_order =  $image_order;
        }

        return $this->sendResponse($projects->toArray(), 'Proyectos obtenido con exito.');
    }
    public function getProject($id)
    {
        $project = Project::with('technologies')->where('id', $id)->get();
        foreach ($project as $key => $valueProject) {
            $valueProject->images = json_decode($valueProject->images);
            if ($valueProject->image_order !== null) {
                $valueProject->image_order = json_decode($valueProject->image_order);
             }
        }
        foreach ($project as $key => $value) {
            foreach ($value->images as $key => $valueImage) {
                $images[] =  url('/').'/uploads/projects/'.$valueImage;
            }
            // Get Images Order
            if ($valueProject->image_order !== null) {
              foreach ($value->image_order as $key => $valueImage) {
                $image_order[] =  url('/').'/uploads/projects/'.$valueImage;
              }
            } else {
                $image_order = []; 
            }
            $value->images =  $images;
            $value->image_order =  $image_order;
        }
        return $this->sendResponse($project, 'Proyecto obtenido con exito.');
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
                $name_file = time()."_".$file->getClientOriginalName();
                Storage::disk('uploads')->put("uploads/projects/".$name_file,  \File::get($file));  
                $data[] = $name_file;  
            }
         }

          $project = new Project();
          $project->name = $request->get('name');
          $project->description = $request->get('description');
          $project->contribution = $request->get('contribution');
          $project->link = $request->get('link');
          $project->repository = $request->get('repository');
          $project->images = json_encode($data);
          $project->date = $request->get('date');
          $project->save();

         // Save Technologies
         $technologies = $request->get('technologies');
         $technologies = explode(",", $technologies);
         foreach ($technologies as $key => $value) {
           $technologiesProject = new Project_Technology();
           $technologiesProject->project_id = $project->id;
           $technologiesProject->technology_id = $value;
           $technologiesProject->save();
         }

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
                Storage::disk('uploads')->put("files/projects/".$name_file,  \File::get($file));  
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
            // 'technology_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'contribution' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $project = Project::findOrFail($id);
        // Save Technologies
        Project_Technology::where('project_id', $project->id)->delete();
        $technologies = $request->get('technologies');
        $technologies = explode(",", $technologies);
        foreach ($technologies as $key => $value) {
          $technologiesProject = new Project_Technology();
          $technologiesProject->project_id = $project->id;
          $technologiesProject->technology_id = $value;
          $technologiesProject->save();
        }
        // Update project
        $project->update($request->all());
        $project->request = $request->all();

        return $this->sendResponse($project->toArray(), 'Project actualizado con exito.');
    }


    public function destroyProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return $this->sendResponse($project->toArray(), 'Technology deleted successfully.');
    }

    public function updatedOrderImages($id, Request $request)
    {
        $project = Project::findOrFail($id);
        // Update Poster project
        $project->image_order = $request->get('images');
        $project->update();

        return $this->sendResponse($project->toArray(), 'Image poster updated');
    }

    public function updatedPoster($id, Request $request)
    {
        $project = Project::findOrFail($id);
        // Update Poster project
        $project->image_poster = $request->get('image_poster');
        $project->update();

        return $this->sendResponse($project->toArray(), 'Image poster updated');
    }
}
