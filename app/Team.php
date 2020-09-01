<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
class Team extends Model
{
    //
    public $table = 'teams';
    use Uuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
