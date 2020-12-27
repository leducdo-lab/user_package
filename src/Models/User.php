<?php

namespace TDP\User\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Address() {
        return $this->hasMany('TDP\User\Models\Address', 'user_id', 'local_key');
    }
}
