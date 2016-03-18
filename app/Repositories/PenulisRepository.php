<?php
namespace AppRepositories;

use App\Models\Penulis;

class PenulisRepository implements IPenulis
{
    public function getList($num = null)
    {
        $query = Penulis::orderBy('cretaed_at', 'desc');

        return !empty($num) ? $query->simplePaginate($num) : $query->get();
    }

    public function create(array $data)
    {
        $penulis = new Penulis();
        $penulis->name = $data['name'];
        $penulis->email = $data['email'];
        return $penulis->save() ? $penulis : false;
    }

}
