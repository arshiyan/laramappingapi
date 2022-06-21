<?php

namespace App\Repositories;

use App\Models\User;
use Symfony\Component\Yaml\Yaml;

class FileRepository implements FileRepositoryInterface
{

    public function getYaml()
    {
        try {
            $value = Yaml::parseFile(public_path('/map.yaml'));

        } catch (ParseException $exception) {
            printf('Unable to parse the YAML string: %s', $exception->getMessage());
        }

    }

    public function toCollect($collect)
    {

    }

    /**
     *
     */
    public function store($collect)
    {


       return $collect;
    }
}
