
$(function () {
    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
    -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();
    //while(reload==false){
    $('#calendar').fullCalendar({
        locale: 'pt',
        height: 450,
        // contentHeight: 250,
        aspectRatio: 0,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia'
        },
        events: { url:"showEvents"},

        editable: true,
        droppable: true,

        drop: function (date, allDay) {
            var originalEventObject = $(this).data('eventObject');
            var copiedEventObject = $.extend({}, originalEventObject);
            allDay=true;
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            if ($('#drop-remove').is(':checked')) {
                $(this).remove();
            }
            var title=copiedEventObject.title;
            var start=copiedEventObject.start.format("YYYY-MM-DD HH:mm");
            var back=copiedEventObject.backgroundColor;

            crsfToken = document.getElementsByName("_token")[0].value;
            $.ajax({
                url: 'saveEvents',
                data: 'title='+ title+'&start='+ start+'&allday='+allDay+'&background='+back,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": crsfToken
                },
                success: function(events) {
                    console.log('Evento creado');
                    $('#calendar').fullCalendar('refetchEvents' );
                },
                error: function(json){
                    console.log("Error al crear evento");
                }
            });
        },

        eventResize: function(event) {
            var start = event.start.format("YYYY-MM-DD HH:mm");
            var back=event.backgroundColor;
            var allDay=event.allDay;
            if(event.end){
                var end = event.end.format("YYYY-MM-DD HH:mm");
            }else{var end="NULL";
        }
        crsfToken = document.getElementsByName("_token")[0].value;
        $.ajax({
            url: 'updateEvents',
            data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id+'&background='+back+'&allday='+allDay,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": crsfToken
            },
            success: function(json) {
                console.log("Updated Successfully");
            },
            error: function(json){
                console.log("Error al actualizar evento");
            }
        });
    },

    eventMouseover: function( event, jsEvent, view ) {
        var start = (event.start.format("HH:mm"));
        var back=event.backgroundColor;
        if(event.end){
            var end = event.end.format("HH:mm");
        }else{var end="Indeterminado";
    }
    if(event.allDay){
        var allDay = "Sim";
    }else{var allDay="Não";
}
var tooltip = '<div class="tooltipevent" style="width:200px;height:100px;color:white;background:'+back+';position:absolute;z-index:10001;">'+'<center>'+ event.title +'</center>'+'Durante o dia: '+allDay+'<br>'+ 'Início: '+start+'<br>'+ 'Fim: '+ end +'</div>';
$("body").append(tooltip);
$(this).mouseover(function(e) {
    $(this).css('z-index', 10000);
    $('.tooltipevent').fadeIn('500');
    $('.tooltipevent').fadeTo('10', 1.9);
}).mousemove(function(e) {
    $('.tooltipevent').css('top', e.pageY + 10);
    $('.tooltipevent').css('left', e.pageX + 20);
});
},

eventMouseout: function(calEvent, jsEvent) {
    $(this).css('z-index', 8);
    $('.tooltipevent').remove();
},

eventDrop: function(event, delta) {
    var start = event.start.format("YYYY-MM-DD HH:mm");
    if(event.end){
        var end = event.end.format("YYYY-MM-DD HH:mm");
    }else{var end="NULL";
}
var back=event.backgroundColor;
var allDay=event.allDay;
crsfToken = document.getElementsByName("_token")[0].value;

$.ajax({
    url: 'updateEvents',
    data: 'title='+ event.title+'&start='+ start +'&end='+ end+'&id='+ event.id+'&background='+back+'&allday='+allDay ,
    type: "POST",
    headers: {
        "X-CSRF-TOKEN": crsfToken
    },
    success: function(json) {
        console.log("Updated Successfully eventdrop");
    },
    error: function(json){
        console.log("Error al actualizar eventdrop");
    }
});
},

dayClick: function(date, jsEvent, view) {
    if (view.name === "month") {
        $('#calendar').fullCalendar('gotoDate', date);
        $('#calendar').fullCalendar('changeView', 'agendaDay');
    }
},

eventClick: function (event, jsEvent, view) {
    crsfToken = document.getElementsByName("_token")[0].value;
    var con=confirm("Realmente queres eliminar esta Tarefa?");
    if(con){
        $.ajax({
            url: 'deleteEvents',
            data: 'id=' + event.id,
            headers: {
                "X-CSRF-TOKEN": crsfToken
            },
            type: "POST",
            success: function () {
                $('#calendar').fullCalendar('removeEvents', event._id);
                console.log("Evento eliminado");
            }
        });
    }else{
        console.log("Cancelado");
    }
},

});

/* AGREGANDO EVENTOS AL PANEL */
var currColor = "#3c8dbc"; //Red by default
//Color chooser button
var colorChooser = $("#color-chooser-btn");
$("#color-chooser > li > a").click(function (e) {
    e.preventDefault();
    //Save color
    currColor = $(this).css("color");
    //Add color effect to button
    $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
});
$("#add-new-event").click(function (e) {
    e.preventDefault();
    //Get value and make sure it is not null
    var val = $("#new-event").val();
    if (val.length == 0) {
        return;
    }

    //Create events
    var event = $("<div />");
    event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
    event.html(val);
    $('#external-events').prepend(event);

    //Add draggable funtionality
    ini_events(event);

    //Remove event from text input
    $("#new-event").val("");
});
});
