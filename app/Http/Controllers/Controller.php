<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

interface BaseControllerInterface {
    function sendExceptionError($exception);
}

class Controller extends BaseController implements BaseControllerInterface
{
    use AuthorizesRequests, ValidatesRequests;

    function sendExceptionError($exception)
    {
        return redirect()->back()->with('message', [
            'status' => 'error',
            'title' => 'As error occured',
            'description' => $exception->getMessage()
        ]);
    }
}
