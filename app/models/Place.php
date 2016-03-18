<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'places';

    /**
     * Relationship: Checkins
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function checkins()
    {
        return $this->hasMany('Checkin');
    }
}