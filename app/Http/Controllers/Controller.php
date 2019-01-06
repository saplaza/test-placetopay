<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login()
    {
    	return config("app.PSE.login");
    }

    public function url()
    {
    	return config("app.PSE.url");
    }

    public function tran_key()
    {
    	return config("app.PSE.tran_key");
    }
}
