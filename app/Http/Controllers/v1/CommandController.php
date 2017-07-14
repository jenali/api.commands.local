<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Command;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class CommandController extends Controller
{

    public $successStatus = 200;

    /**
     * Get list for commands.
     * url: Get api/commands
     *
     */
    public function list()
    {
        $user = Auth::user();

        $data['commands'] = Command::all();
        $data['canEdit'] = false;
        $data['canDelete'] = false;
        $data['canCreate'] = false;
//        if($user->rid == 1) {
            $data['canEdit'] = true;
            $data['canDelete'] = true;
            $data['canCreate'] = true;
//        }

        return response()->json(['success' => true, 'data' => $data, 'code' => 200]);
    }

    /**
     * Get command by id.
     * url: Get api/commands/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function view(int $id)
    {
        $user = Auth::user();

        $data['command'] = Command::find($id);
        $data['canEdit'] = false;
        $data['canDelete'] = false;
        $data['canCreate'] = false;
        if($user->rid == 1) {
            $data['canEdit'] = true;
            $data['canDelete'] = true;
            $data['canCreate'] = true;
        }

        return response()->json(['success' => true, 'data' => $data, 'code' => 200]);
    }

    /**
     * Create command by id.
     * url: Post api/commands
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();

        if($user->rid == 1) {
            $command = Command::create($request->all());

            return response()->json(['success' => true, 'data' => $command, 'code' => 200]);

        }

        return response()->json(['success' => false, 'data' => null, 'code' => 403]);

    }

    /**
     * Update command by id.
     * url: Put api/commands
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $user = Auth::user();

        if($user->rid == 1) {
            $command = Command::findOrFail($id);
            $command->update($request->all());

            return response()->json(['success' => true, 'data' => $command, 'code' => 200]);
        }

        return response()->json(['success' => false, 'data' => null, 'code' => 403]);


    }

    /**
     * Delete command.
     *
     * @param int $id
     *
     * @url: Delete api/commands
     * @return Response
     */
    public function delete(int $id)
    {
        $user = Auth::user();
        if($user->rid == 1) {
            Command::find($id)->delete();

            return response()->json(['success' => true, 'data' => null, 'code' => 200]);
        }

        return response()->json(['success' => false, 'data' => null, 'code' => 403]);
    }
}
