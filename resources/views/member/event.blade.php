   @extends('admin.layout.layout')
    @section('content')
      @include('member.include.navbar_event')
  
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      
       
      <!-- Import jQuery and jQuery UI -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  
  
      <!-- Import FullCalendar CSS and JS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  
  
  
      <!-- Your custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/app.css') }} ">

  
    <div class="navbar pt-5 pb-4" style="background-color: #D6D6D6;">
      {{-- <a href="proposal_manager" class="btn btn-success offset-11" >Proposal</a> --}}
    </div>
      <div class="container">
          <br />
          <h1 class="text-center text-primary"><u>Events</u></h1>
          <br />
  
          <div id="calendar"></div>
  
      </div>
  
      <dialog class="p-5 border border-secondary">
          <form id="eventForm" action="" method="POST">
          @csrf
          <h5 class="text-center mb-5">Event Details</h5>
          <i class="fa-solid fa-xmark close-button"></i>
  
          <div class="mb-3 d-flex align-items-center">
              <i class="fa-regular fa-star fa-2xl"></i>
              <input type="text" class="form-control ml-1" id="event_name" placeholder="Title Program">
          </div>
  
          <div class="mb-3 ml-5">
              <div class="d-flex">
                  <p class="h5">Date: </p>
                  <p id="date" class="fs-5 h3 ml-2"></p>
              </div>
  
              <div class="input-group d-flex align-items-center mb-3">
                  <input type="time" id="start_time" class="form-control col-3" placeholder="00" aria-label="00">
                  <i class="fa-solid fa-minus ml-1 mr-1"></i>
                  <input type="time" id="end_time" class="form-control col-3" placeholder="00" aria-label="00">
              </div>
          </div>
  
          <div class="mb-3 ml-1 d-flex align-items-center">
              <i class="fa-solid fa-location-dot fa-2xl mr-2"></i>
              <input type="text" class="form-control ml-1" id="event_type" placeholder="Location">
          </div>
  
          <div class="mb-3 ml-1 d-flex align-items-center">
              <i class="fa-regular fa-calendar fa-xl mr-3"></i>
              <input type="text" class="form-control " id="event_type" placeholder="Event Details">
          </div>
  
          <button id="submit_button" type="submit" class="btn btn-success">Confirm Attendance</button>
      </form>
      </dialog>
  
      <script>
          const dialog = document.querySelector('dialog');
          const date = document.getElementById('date');

          $(document).ready(function() {
  
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
  
              var calendar = $('#calendar').fullCalendar({
                  editable: true,
                  header: {
                      left: 'prev,next today',
                      center: 'title',
                      right: 'month,agendaWeek,agendaDay'
                  },
                  events: '/full-calender',
                  selectable: true,
                  selectHelper: true,
                  select: function(start, end, allDay) {
                 var start = $.fullCalendar.formatDate(start, 'Y-MM-DD');
                dialog.showModal();
                date.innerText = start;
                  },
                  editable: true,
                  eventResize: function(event, delta) {
                      var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                      var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                      var title = event.title;
                      var id = event.id;
                      $.ajax({
                          url: "/full-calender/action",
                          type: "POST",
                          data: {
                              title: title,
                              start: start,
                              end: end,
                              id: id,
                              type: 'update'
                          },
                          success: function(response) {
                              calendar.fullCalendar('refetchEvents');
                              alert("Event Updated Successfully");
                          }
                      })
                  },
                  eventDrop: function(event, delta) {
                      var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                      var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                      var title = event.title;
                      var id = event.id;
                      $.ajax({
                          url: "/full-calender/action",
                          type: "POST",
                          data: {
                              title: title,
                              start: start,
                              end: end,
                              id: id,
                              type: 'update'
                          },
                          success: function(response) {
                              calendar.fullCalendar('refetchEvents');
                              alert("Event Updated Successfully");
                          }
                      })
                  },
  
                  eventClick: function(event) {
                      if (confirm("Are you sure you want to remove it?")) {
                          var id = event.id;
                          $.ajax({
                              url: "/full-calender/action",
                              type: "POST",
                              data: {
                                  id: id,
                                  type: "delete"
                              },
                              success: function(response) {
                                  calendar.fullCalendar('refetchEvents');
                                  alert("Event Deleted Successfully");
                              }
                          })
                      }
                  }
  
          });
  
                      // Handle form submission
                      $('#eventForm').submit(function(event) {
          event.preventDefault();
  
          // Serialize the form data
          var formData = $(this).serialize();
  
          // Send an AJAX request
          $.ajax({
              url: $(this).attr('action'),
              type: 'POST',
              data: formData,
              success: function(response) {
                  // Refresh the calendar after successfully adding an event
                  calendar.fullCalendar('refetchEvents');
                  
                  // Optionally, close the dialog
                  dialog.close();
  
                  alert("Event Created Successfully");
              },
              error: function(error) {
                  console.log(error);
                  alert("Error creating event");
              }
              });
              });
  
          const closeButton = document.querySelector('.close-button');
  
  closeButton.addEventListener('click', function() {
      dialog.close();
  });
  });
  </script>
  
  

    @endsection 
    
