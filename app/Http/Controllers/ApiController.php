<?php

namespace App\Http\Controllers;

use App\Repositories\FileRepositoryInterface;
use App\Traits\FileTrait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use FileTrait;

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

        $usersArray = $this->mapping($repository->getData(file_get_contents($this->apiURL),$fileFormat->getData()),$repository->getYaml());

        return response()->json($repository->store($usersArray));

    }
}
