<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
class Member extends Model
{
    //
    use Uuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
