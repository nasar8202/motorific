
@extends('backend.admin.layouts.app')
@section('title','view Seat Material List')
@section('secton')

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>You Can Set Live Sell Time </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Meetings</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div id="calender"></div>
            </div>
            <div class="card-body">
             
            </div>
        </div>

    </section>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<script>
// $("#calender").fullCalendar()
      var data = @php echo $orders @endphp;
      console.log(data);
    var cal_data = data?.map(element => {
        // var event = calendar.getEventById(element.id) // an event object!
        return {
            id: element.id,
            start:  element.meeting_date_time
        }

    });
    console.log(cal_data,"call data");
    $("#calender").fullCalendar({
        timeZone: 'UTC',
        events: [...cal_data]

    });
    // var event = calendar.getEventById('a') // an event object!
    var start = event.start // a property (a Date object)
    // console.log(start.toISOString())
// $("#calender").fullCalendar()
</script>
@endsection
