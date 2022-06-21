<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $apiURL;
    public function __construct()
    {
        $this->apiURL = "https://reqres.in/api/users?page=2";
       // $this->apiURL = "https://stageappsp.smashfly.com/contactmanagerservice/v2/ContactManagerRestService.svc/help/operations/SaveContact#request-xml";

    }

    public function index()
    {
        return response()->checkExtention($this->apiURL);
    }
}
