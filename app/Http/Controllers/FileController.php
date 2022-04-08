<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $req)
    {
        $result = $req->file('file')->store('apiDocs');
        return ["result" => $result ];
    }
}
