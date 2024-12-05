<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Helpers\ErrorHandler;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\ApiResource;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::get();

        return view('roles.index', compact('data'));
    }

    public function store(RoleRequest $request)
    {
        try {

            Role::create($request->all());

            return response()->json(new ApiResource(true, 200, 'Successfully create data', null), 200);
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return response()->json(new ApiResource(false, $error['code'], 'Failed create data:' . $error['message'], null), $error['code']);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            Role::findOrFail($id)->update($request->all());

            return response()->json(new ApiResource(true, 200, 'Successfully update data', null), 200);
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return response()->json(new ApiResource(false, $error['code'], 'Failed update data:' . $error['message'], null), $error['code']);
        }
    }
}
