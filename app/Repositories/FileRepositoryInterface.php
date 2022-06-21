<?php

namespace App\Repositories;

interface FileRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getYaml();

    /**
     * @return mixed
     */
    public function toCollect($collect);

    public function store( $collect);
}
