<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepositoryInterface;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $apiURL;

    public function __construct()
    {
        $this->apiURL = "https://reqres.in/api/users";
        //$this->apiURL = "http://127.0.0.1:8000/api/xml";

    }

    /**
     * @return mixed
     */
    public function index(FileRepositoryInterface $repository)
    {
        $fileFormat =  response()->checkExtention($this->apiURL);
        $collct = $repository->toCollect(file_get_contents($this->apiURL));
        $getYamel = $repository->getYaml();

    }
}
