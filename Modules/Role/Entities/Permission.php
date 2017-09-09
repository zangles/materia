<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [];

    public function roles()
    {
        return $this->belongsTo('Modules\Role\Entities\Role');
    }
}
