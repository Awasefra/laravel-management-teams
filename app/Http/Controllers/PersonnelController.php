<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use Illuminate\Http\Request;
use App\Helpers\ErrorHandler;
use App\Http\Resources\ApiResource;
use App\Http\Requests\PersonalRequest;

class PersonnelController extends Controller
{
    public function index()
    {
        $data = Personnel::get();
        return view('personnels.index', compact('data'));
    }

    public function store(PersonalRequest $request)
    {
    
        try {
            Personnel::create($request->all());

            return response()->json(new ApiResource(true, 200, 'Successfully create data', null), 200);
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return response()->json(new ApiResource(false, $error['code'], 'Failed create data:' . $error['message'], null), $error['code']);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            Personnel::findOrFail($id)->update($request->all());

            return response()->json(new ApiResource(true, 200, 'Successfully update data', null), 200);
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return response()->json(new ApiResource(false, $error['code'], 'Failed update data:' . $error['message'], null), $error['code']);
        }
    }
}
