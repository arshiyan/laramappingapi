<?php

namespace App\Repositories;

use App\Models\User;
use App\Traits\FileTrait;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Yaml\Yaml;

class FileRepository implements FileRepositoryInterface
{

    use FileTrait;
    public function getYaml()
    {
        try {
            $value = Yaml::parseFile(public_path('/map.yaml'));
            return collect($value);
        } catch (ParseException $exception) {
            printf('Unable to parse the YAML string: %s', $exception->getMessage());
        }

    }

    public function getData($content, $format)
    {

        if($format == "json")
        {
           return json_decode($content, true)['data'];
        }
        elseif ($format == "xml")
        {
            return $this->xmlToArray($content);
        }
        else
        {
            echo "format not supported";
        }

    }

    /**
     *
     */
    public function store($collect)
    {

       foreach ($collect as $user)
       {

           $newUser = new User();
           $newUser->password = Hash::make($user['name']."@".$user['email']);
           $newUser->email = $user['email'];
           $newUser->name = $user['name'];
           $newUser->save();
       }

       return (User::all());
    }
}
