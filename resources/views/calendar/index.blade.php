@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel="stylesheet" type="text/css" href="{{ asset('asset/main.css') }}">
<script src="{{ asset('asset/main.js') }}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      editable: true,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        @foreach($sheets as $sheet)
        {
          title: '{{ $sheet->name }}',
          start: '{{ $sheet->date_create }}',
          url: '{{ route('sheet.show', $sheet->id) }}'
        },
        @endforeach
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>
  

</body>
</html>
@endsection

