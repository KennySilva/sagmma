<?php

namespace Sagmma\Http\Controllers\Test;

use Illuminate\Http\Request;

use Sagmma\Http\Requests;
use Sagmma\Http\Controllers\Controller;
use PDF;
use Typeofplace;
use Calender;

class CalendarController extends Controller
{
    public function index()
    {
        // $loged = Ayth::user();
        // return view('typetest', compact('loged'));

        $events = [];

        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            '2017-01-4', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
                '2017-01-6', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
                    1//optional event ID
                    // [
                    //     'url' => 'http://full-calendar.io'
                    // ]
                );

                $events[] = \Calendar::event(
                    "Kenyy", //event title
                    true, //full day event?
                    '2017-01-8', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
                        '2017-01-12', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
                            1//optional event ID
                            // [
                            //     'url' => 'http://full-calendar.io'
                            // ]
                        );


                        $calendar = \Calendar::addEvents($events)->setOptions(['firstDay'=>1])->setCallbacks([]);


                        return view('calendar', compact('calendar'));
                    }

                }
