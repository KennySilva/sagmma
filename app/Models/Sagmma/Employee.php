<?php

namespace Sagmma\Models\Sagmma;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $guarded = ['id'];

    public function getDates()
    {
        return [];
    }

    //Mutators
    public function getGenderAttribute($value)
    {
        if ($value == 'M') {
            return 'Masculino';
        }else {
            return 'Feminino';
        }
    }

    public function getStateAttribute($value)
    {
        if ($value) {
            $states = array(
                "1" =>'Santiago',
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


    //------------------------------------------------------------
    public function markets()
    {
        return $this->belongsToMany(Market::class, 'employee_market', 'employee_id', 'market_id')->withPivot('author')->withTimestamps();
    }

    public function taxation()
    {
        return $this->belongsTo(Taxation::class, 'id', 'employee_id');
    }

    public function typeofemployees()
    {
        return $this->belongsTo(Typeofemployee::class, 'typeofemployee_id', 'id');
    }
    //------------------------------------------------------------

    public function controls()
    {
        return $this->belongsTo(Control::class, 'id', 'employee_id');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'employee_material', 'employee_id', 'material_id')->withPivot('status', 'author')->withTimestamps();
    }
    // ----------------------------------------------------------
    public function places()
    {
        return $this->belongsToMany(Place::class, 'employee_place', 'employee_id', 'place_id')->withPivot('income', 'type', 'author')->withTimestamps();
    }

}
