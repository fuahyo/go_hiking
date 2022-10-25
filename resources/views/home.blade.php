

@extends('layouts.main')
@section('container')
    <div class="container" mt-4>
    <div class="row justify-content-center mb-3">
        <h1 class="text-center mb-2 mt-2"></h1>
        <div class="row justify-content-md-center" px-3>
            <script>
                const csrfToken = document.head.querySelector("[name=csrf-token][content]").content
                document.addEventListener('DOMContentLoaded', function() {
                    
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {

                        
                        
                        selectable: true,
                        initialView: 'dayGridMonth',
                        eventSources: [{
                            url:'/fetchCalenderEvents',
                        }],
                        select: function(startDate){
                            //console.log(startDate.startStr);
                            let eventDate = startDate.startStr
                            let title = prompt('Add new event')
                            if (title===null || title== ''){
                                return;
                            }
                            fetch('/create', {
                                method: 'post',
                                body: JSON.stringify({title, eventDate}),
                                headers:{
                                    'Content-Type' : 'application/json',
                                    'X-CSRF-TOKEN' : csrfToken
                                },
                            })
                            .then(e=>{
                                console.log('succes cuy');
                            })  
                        },
                        events: [
                        {
                            id: 'a',
                            title: 'my event A',
                            start: '2022-09-05'
                        },
                        ]
                    });
                    calendar.render();
                });
            </script>
            
            <div class="row">
                <div class="col-lg-12 col-xl-12 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            ALL CAPA
                        </div>
                        <div class="card-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection