<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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

    public function getUser()
    {
        $user = User::find(1);
        return $this->sendResponse($user->toArray(), 'Usuario obtenida con exito.');
    }
    public function updatedUser($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->phone = $request->phone;
        $user->studies = $request->studies;
        $user->location = $request->location;
        $user->aboutme = $request->aboutme;
        $user->update();
        $user->request = $request->all();

        return $this->sendResponse($user->toArray(), 'Usuario actualizado.');
    }
    public function updatedPhoto($id, Request $request)
    {
        $file = $request->file('photo');
        $name_file = time()."_".$file->getClientOriginalName();
        Storage::disk('uploads')->put("images/profile/".$name_file,  \File::get($file));
        $user = User::findOrFail($id);
        $user->avatar = $name_file;
        $user->update();
        return $this->sendResponse($user->toArray(), 'Imagen actualizada');
    }
    public function updatedCV($id, Request $request)
    {
        $file = $request->file('cv');
        $name_file = time()."_".$file->getClientOriginalName();
        Storage::disk('uploads')->put("files/cv/".$name_file,  \File::get($file));
        $user = User::findOrFail($id);
        $user->cv = $name_file;
        $user->update();
        return $this->sendResponse($user->toArray(), 'CV actualizado');
    }
}