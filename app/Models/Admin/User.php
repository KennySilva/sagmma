<?php

namespace Sagmma\Models\Admin;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    // use Authenticatable, Authorizable, CanResetPassword;
    use EntrustUserTrait;
    
    protected $table = 'users';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token'];






    //Mutators nova experneriencia keli ^kel senas sobre mutatords ki nu sa mesteba
    //------------------------------------------------------------------------------
    public function getStatusAttribute($value)  /*pa nu txoma nome di culuna nu ta usa es expressao li geNomediculunaAtribute*/
    {
        if ($value) {  /*li nu sa fala ma si status ê 1 pe ritorna verdadiro e si nau pe ritorna falso*/
            return true;
        }
        return false;
    }
    //-------------------------------------------------------------------------------

    //Relacionamentos;
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    // }
    //
    // //Controlo de Permissoes;
    // public function hasPermission(Permission $permission)
    // {
    //     return $this->hasAnyRoles($permission->roles);
    // }
    //
    // public function hasAnyRoles($roles)
    // {
    //
    //     if (is_array($roles) || is_object($roles)) {
    //         foreach ($roles as $role) {
    //             // var_dump($role->name);
    //             // return $this->roles->contains('name', $role->name);
    //             // return $this->hasAnyRoles($roles);
    //             return $roles->intersect($this->roles)->count();
    //         }
    //
    //     }
    //     return $this->roles->contains('name', $roles);
    // }
    //
    //Função para servir o middleware
    public function Admin()
    {
        foreach ($this->roles as $TypeUser) {
            return $TypeUser->name === 'admin';
        }
    }


}
