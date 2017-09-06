<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [];

    public function permission()
    {
        return $this->hasMany('Modules\Role\Entities\Permission');
    }
}
