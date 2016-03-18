<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Penulis;
use Mockery as m;

class PenulisTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();
        $this->penulis = factory(Penulis::class);
        $this->repo_penulis = app()->make('App\Repositories\IPenulis');
    }

    public function testCreate()
    {
        $model = $this->penulis->make();

        $expected = [
            'id' => 1,
            'name' => $model->name,
            'email' => $model->email,
        ];

        $return = $this->repo_penulis->create($model->toArray());
        $this->assertInstanceOf(Illuminate\Database\Eloquent\Model::class, $model);
        $this->assertEquals($expected, $return->toArray());
    }

    public function testGetList()
    {
        $list_push = factory(Penulis::class, 12)->create()->each(function ($u) {
            $u->save();
        });

        $return = $this->penulis_repo->getList(10);

        $this->assertEquals($return->count(), 10);
        $this->assertEquals($list_push->count(), 12);
    }
}
