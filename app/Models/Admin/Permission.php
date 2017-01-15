<?php

namespace Sagmma\Models\Admin;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    


}
