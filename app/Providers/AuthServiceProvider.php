<?php

namespace Sagmma\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use User;
use Permission;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        'Sagmma\Model' => 'Sagmma\Policies\ModelPolicy',
    ];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // $gate->define('update-post', function(User $user, Post $post){
        //     return $user->id == $post->user_id;
        // });

        // $permissions = Permission::with('roles')->get();
        // foreach ($permissions as $permission) {
        //     $gate->define($permission->name, function(User $user) use ($permission){
        //         return $user->hasPermission($permission);
        //     });
        // }
        // $gate->before(function(User $user, $ability)
        // {
        //     if ($user->hasAnyRoles('super-admin')) {
        //         return true;
        //     }
        // });

    }
}
