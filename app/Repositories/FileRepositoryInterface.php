<?php

namespace App\Repositories;

interface FileRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getYaml();

    public function getData($content,$format);

    /**
     * @return mixed
     */
    public function store( $collect);
}
