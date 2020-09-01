<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class Task extends Model
{
    //
    use Uuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
    protected $fillable = ['Title', 'Description', 'AssignedId','Status'];
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
