<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webmenu;


class ApiController extends Controller
{
    public function webmenu()
    {
        $webmenu = Webmenu::all();

             return response() -> json([
                 'success' => true,
                 'message' => 'List Data Web Menu',
                 'webmenu' => $webmenu
             ], 200);
        
    }
}
