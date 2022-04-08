<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    // function list($id = null){
    //     return $id?Device::find($id):Device::all();
    // }
    function add(Request $req){
        $device = new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;

        $result = $device->save();

        if($result){
            return ["Results" => "Data has been Saved"];
        }else{
            return ["Results" => "Failed!"];
        };
    }

    function update(Request $req){

        $device = Device::find($req -> id);
        $device->name = $req -> name;
        $device->member_id = $req -> member_id;

        $result = $device -> save();

        if($result){
            return ["Result" => "Data has been updated"];
        }else{
            return ["Result" => "Failed to update"];
        }
    }

    function search($name){
        return Device::where("name","like", "%" .$name. "%")->get();
    }

    function delete($id){
        $device = Device::find($id);
        $result = $device->delete();
        if($result){

            return ["Results" => "File has been deleted!"];
        }else{
            return ["Results" => "Failed to delete"];
        }
    }

    function testData(Request $req){
        $rules = array(
            "member_id" => "required|min:2|max:4"
        );

        $validator = Validator::make($req -> all(), $rules);

        if($validator -> fails()){
            return response() -> json($validator->errors(), 401);
        }else{
            $device = new Device;
            $device->name = $req -> name;
            $device->member_id = $req -> member_id;
            $result = $device->save();

            if($result){
                return ["Result" => "Data has been saved"];
            }else{
                return ["Result" => "Failed"];
            }
        }
    }
}
