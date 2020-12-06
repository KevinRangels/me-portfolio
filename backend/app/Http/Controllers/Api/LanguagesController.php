<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Language;
use Validator;
class LanguagesController extends Controller
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

    public function getAllLanguage()
    {
        $language = Language::all();
        return $this->sendResponse($language->toArray(), 'Lenguage obtenidos con exito.');
    }

    public function getLanguage($id)
    {
        $language = Language::find($id);
        return $this->sendResponse($language->toArray(), 'Lenguage obtenidos con exito.');
    }

    public function storeLenguage(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $language = Language::create($input);
        return $this->sendResponse($language->toArray(), 'Lenguage created successfully.');
    }

    public function editLanguage($id, Request $request)
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'name' => 'required'
    ]);

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
    }

    $language = Language::findOrFail($id);
    $language->update($request->all());
    $language->request = $request->all();

    return $this->sendResponse($language->toArray(), 'Lenguage actualizada con exito.');
  }


  public function destroyLanguage($id)
    {
        $language = Language::findOrFail($id);
        $language->delete();
        return $this->sendResponse($language->toArray(), 'Lenguage deleted successfully.');
    }

}
