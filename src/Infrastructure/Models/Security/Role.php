<?php

namespace Src\Infrastructure\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
      protected $table = 'roles';

      public $timestamps = false;

      protected $fillable = [
            'id',
            'code',
            'name',
      ];
}
