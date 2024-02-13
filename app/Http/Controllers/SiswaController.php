<?php

namespace App\Http\Controllers;

use App\Http\Requests\siswaInput;
use App\Models\siswa;
use http\Env\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public static function index()
    {
        $data = siswa::all();
        $msgJSON = [
            "message"=>"success gathering all data",
            "data"=>$data
        ];
        return response()->json($msgJSON,201);
    }

    public static function store(siswaInput $req) {
        $data = $req->validated();
        $input = Siswa::create($data);
        $jsonData = [
            "isSuccess"=>true,
            "message"=> "succesfully added data",
            "data"=>$input
        ];
        return response()->json($jsonData,201);
    }

    public static function update(siswaInput $request)
    {
        $id = $request->input("id");
        try {
            $siswa = Siswa::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            $msgJSON = [
                "message" => "ID not found",
                "id" => $id
            ];
            return response()->json($msgJSON, 404);
        }

        $data = $request->validated(); // Use validated() instead of validate()

        try {
            $result = $siswa->update($data);
            $msgJSON = [
                "message" => "Successfully updated data",
                "data" => $siswa
            ];
            return response()->json($msgJSON, 200);
        } catch (\Exception $e) {
            $msgJSON = [
                "message" => "Failed to update data",
                "error" => $e->getMessage()
            ];
            return response()->json($msgJSON, 500);
        }
    }

    public static function delete(Request $request) {
        $id = $request->input("id");
        try {
            $siswa = Siswa::findOrFail($id)->delete();
            $msgJSON = [
                "message" => "successfully delete data",
                "id" => $id
            ];
            return response()->json($msgJSON, 200);
        } catch (ModelNotFoundException $e) {
            $msgJSON = [
                "message" => "ID not found",
                "id" => $id
            ];
            return response()->json($msgJSON, 404);
        }
    }

    public static function show(Request $request)
    {
        $id = $request->input("id");
        try {
            $siswa = Siswa::findOrFail($id);
            $msgJSON = [
                "message" => "success get 1 data",
                "id" => $id,
                "data"=>$siswa
            ];
            return response()->json($msgJSON, 201);
        } catch (ModelNotFoundException $e) {
            $msgJSON = [
                "message" => "ID not found",
                "id" => $id
            ];
            return response()->json($msgJSON, 404);
        }
    }
}
