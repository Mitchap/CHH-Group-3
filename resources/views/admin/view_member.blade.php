@extends('admin.layout.layout')
@section('content')
  @include('admin.include.navbar_member')

  <nav class="navbar bg-body-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Member</a>
    </div>
  </nav>

  <div>
    <a href="/member" class="btn btn-outline-secondary m-2"><ion-icon name="chevron-back-outline"></ion-icon>BACK</a>

    {{--  BUTTON BACK IN THE CORNER  --}}
    <p class="h2 text-center">
      {{ $member -> first_name }} {{ $member -> last_name }}
    </p>
    <br>
  </div>

   <div class="container">
       <div class="memberfee">
           <label class="textfee fw-bold">Annual Fee: </label><br>
             <p class="h4 ps-4">
                 @if($member->fee == 'Paid')
                     <span class="text-primary">Paid</span>
                 @elseif($member->fee == 'Unpaid')
                     <span class="text-danger">Unpaid</span>
                 @endif
            </p>
      </div>
  

  {{--     PHOTO with CHANGE COLOR in designated status   --}}
  <div class="container d-flex">
    <div class="col-md-3 pb-3">
        
      <div style="text-align: center;">
      <img src="{{ asset($member->photo ? $member->photo : 'assets/profile.png') }}" 
      id="showPhoto"
      class="rounded-circle" alt="photo"
      style="width: 250px; border:
      @if($member->status == 'Under Observation')
                5px solid blue
            @elseif($member->status == 'Active')
                5px solid green
            @elseif($member->status == 'Inactive')
               5px solid red
            @endif;"><br><br>
            {{-- TEXT COLOR CHANGE --}}
            <strong class="text" style="color: 
                @if($member->status == 'Under Observation')
                    blue
                @elseif($member->status == 'Active')
                    green
                @elseif($member->status == 'Inactive')
                    red
                @endif ">
            {{ $member->status }}</strong>
      </div>
    </div>    

    
    <div class="profile">
      <div class="row">

        <div class="col-md-6 pb-3">
          <label>First Name:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> first_name }} </p>       
        </div>

        <div class="col-md-6 pb-3">
          <label>Email:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> email }} </p>
        </div>

        <div class="col-md-6 pb-3">
          <label>Last Name:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> last_name }} </p>
        </div>

        <div class="col-md-6 pb-3">
          <label>Date of Birth:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> date_of_birth }} </p>
        </div>
        
        <div class="col-md-6 pb-3">
          <label>Age:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> age }} </p>          
        </div>

        <div class="col-md-6 pb-3">
          <label>Address:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> address }} </p> 
        </div>
        
        <div class="col-md-6 pb-3">
          <label>Gender:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> gender }} </p>
        </div>
        
        <div class="col-md-6 pb-3">
          <label>Mobile:</label><br>
          <p class="text-primary h4 ps-4"> {{ $member -> mobile }} </p>
        </div>
        
      </div>
    </div>
  </div>



  {{-- INTERNAL CUSTOM CSS --}}
    <style>
        .custom{
            background-color: #366DDA;
        }
        .btn-style{
            border: 2px solid #ff9c5f;
        }
        .btn-style:hover{
            background-color: #ff9c5f !important;
        }


        .profile {
          margin-left: 8%;
          width: 900px;
        }
        .memberstat {
          z-index: 1;
          width: 170px;
          position: absolute;
          margin-top: 270px;
          margin-left: 45px;
        }
        .memberfee {
          z-index: 1;
          width: 170px;
          position: absolute;
          margin-top: 350px;
          margin-left: 105px;
        }
        .textfee {
          margin-left: 15%;
        }

        .pic {
          width: 270px;
        }
        
    </style>

    </div>
  </section>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
@endsection