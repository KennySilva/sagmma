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
    public function getStatusAttribute($value)
    {
        if ($value) {
            return true;
        }
        return false;
    }

    public function getGenderAttribute($value)
    {
        if ($value == 'M') {
            return 'Masculino';
        }else {
            return 'Feminino';
        }
    }

    public function getTypeAttribute($value)
    {
        if ($value == 'member') {
            return 'Membro';
        }elseif ($value == 'emp') {
            return 'Funcionário';
        }elseif ($value == 'trad') {
            return 'Comerciante';
        }else {
            return null;
        }
    }

    public function getStateAttribute($value)
    {
        if ($value) {
            $states = array(
                "1" =>'Santatiago',
                "2" =>'Maio',
                "3" =>'Fogo',
                "4" =>'Brava',
                "5" =>'Santo Antão',
                "6" =>'São Niculau',
                "7" =>'São Vicente',
                "8" =>'Sal',
                "9" =>'Boavista'
            );
            return $states[$value];
        }
    }

    public function getCouncilAttribute($value)
    {
        if ($value) {
            # code...
            $councils = array(
                1  =>'Praia',
                2  =>'São Domingos',
                3  =>'Santa Catarina',
                4  =>'São Salvador do Mundo',
                5  =>'Santa Cruz',
                6  =>'São Lourenço dos Órgãos',
                7  =>'Ribeira Grande de Santiago',
                8  =>'São Miguel', 9=>'Tarrafal',
                10 =>'Maio', 11=>'São Filipe',
                12 =>'Santa Catarina do Fogo',
                13 =>'Mosteiros',
                14 =>'Ribeira Grande',
                15 =>'Paul',
                16 =>'Porto Novo',
                17 =>'Ribeira Brava',
                18 =>'Tarrafal de São Nicolau',
                19 =>'São Vicente',
                20 =>'Sal',
                21 =>'Boavista',
                22 =>'Brava',
            );
            return $councils[$value];
        }
    }

    public function getParishAttribute($value)
    {
        if ($value) {
            # code...
            $parishs = array(
                1  =>'Nossa Senhora da Luz',
                2  =>'Nossa Senhora da Graça',
                3  =>'São Nicolau Tolentino',
                4  =>'Santa Catarina',
                5  =>'São Salvador do Mundo',
                6  =>'Santiago Maior',
                7  =>'São Lourenço',
                8  =>'Santíssimo Nome de Jesus',
                9  =>'Santo Crucifixo',
                10 =>'São Miguel Arcanjo',
                11 =>'Santo Amaro Abade',
                12 =>'Nossa Senhora da Conceição',
                13 =>'Nossa Senhora da Ajuda',
                14 =>'São João Baptista',
                15 =>'Nossa Senhora do Monte',
                16 =>'Nossa Senhora do Rosário',
                17 =>'Nossa Senhora do Livramento',
                18 =>'São Pedro Apóstolo',
                19 =>'Santo António das Pombas',
                20 =>'Santo André',
                21 =>'Nossa Senhora da Lapa',
                22 =>'São Francisco',
                23 =>'Nossa Senhora das Dores',
                24 =>'Santa Isabel',
            );
            return $parishs[$value];
        }
    }

    public function getSocialAttribute($value)
    {
        if ($value) {
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

    //Controlo de Permissoes;
    // public function hasPermission(Permission $permission)
    // {
    //     return $this->hasAnyRoles($permission->roles);
    // }
    //
    // public function hasAnyRoles($roles)
    // {
    //     if (is_array($roles) || is_object($roles)) {
    //         foreach ($roles as $role) {
    //             // var_dump($role->name);
    //             // return $this->roles->contains('name', $role->name);
    //             // return $this->hasAnyRoles($roles);
    //             return $roles->intersect($this->roles)->count();
    //         }
    //     }
    //     return $this->roles->contains('name', $roles);
    // }
    //
    // //Função para servir o middleware
    // public function Admin()
    // {
    //     foreach ($this->roles as $TypeUser) {
    //         return $TypeUser->name === 'admin';
    //     }
    // }


}
