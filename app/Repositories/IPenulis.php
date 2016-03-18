<?php
namespace App\Repositories;

interface IPenulis
{

    public function getlist($num);

    public function create(array $data);
}