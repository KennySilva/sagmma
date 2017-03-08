<?php

namespace Sagmma\Http\Controllers\PluginsControllers;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use Carbon\Carbon;
use Calendarevent;

class CalendareventsController extends Controller
{
    public function index()
    {
        $data = array();
        $id = Calendarevent::all()->lists('id');
        $title = Calendarevent::all()->lists('title');
        $start = Calendarevent::all()->lists('start');
        $end = Calendarevent::all()->lists('end');
        $allDay = Calendarevent::all()->lists('all_day');
        $background = Calendarevent::all()->lists('color');
        $count = count($id);

        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$title[$i],
                "start"=>$start[$i],
                "end"=>$end[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$background[$i],
                "id"=>$id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
        json_encode($data);
        return $data;
    }

    public function create(){
        //Valores recibidos via ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $back = $_POST['background'];

        $event=new Calendarevent();
        $event->start = $start;

        //$event->fechaFin=$end;
        $event->all_day = true;
        $event->color = $back;
        $event->title = $title;
        $event->save();
    }

    public function update(){
        //Valores recibidos via ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        $back = $_POST['background'];

        $event=Calendarevent::find($id);
        if($end=='NULL'){
            $event->end=NULL;
        }else{
            $event->end=$end;
        }
        $event->start=$start;
        $event->all_day=$allDay;
        $event->color=$back;
        $event->title=$title;
        //$event->fechaFin=$end;

        $event->save();
    }

    public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];

        Calendarevent::destroy($id);
    }

}
