@extends('admin.layout.layout')
@section('content')
@include('member.include.navbar_registration')

{{--    INSERT THIS CODE   --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{--    INSERT THIS CODE   --}}

<nav class="navbar py-3 mb-5" style="background-color: #D6D6D6;">
    <div class="container-fluid">
      <h4 class="mx-auto">Sign Up</h4>
      <a class="btn btn-light btn-outline-primary" href="/events">Cancel</a>

    </div>  
    
  </nav>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error )
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
    
@endif

  {{--          Registration Form          --}}
    <form method="POST" action="{{ route('submit') }}" enctype="multipart/form-data">
        @csrf
        @method('post')

      {{--    PICTURE UPLOAD   --}}
      <div class="container d-flex">
        <div class="col-md-3 pb-3">          
          <img id="showPhoto" style="width: 250px; height: 250px" class="rounded-circle pb-3" src="{{ asset('assets/default.png') }}" alt="photo"/>
          <input type="file" name="photo" id="photo" class="form-control" onchange="previewImage(this);">
        </div>


            {{--    REGISTRATION FORM   --}}
        <div class="profile">
          <div class="row">

          <div class="col-md-6 pb-3">
              <label>First Name:</label><br>
              <input class="col-12" type="text" name="first_name" placeholder="First Name" required/>
          </div>   
          
          <div class="col-md-6 pb-3">
              <label>Email:</label><br>
              <input class="col-12" type="text" name="email" placeholder="Email" required/>
          </div>

          <div class="col-md-6 pb-3">
              <label>Last Name:</label><br>
              <input class="col-12" type="text" name="last_name" placeholder="Last Name" required/>
          </div>

          <div class="col-md-6 pb-3">
              <label>Date of Birth:</label><br>
              <input class="col-12" type="date" name="date_of_birth" placeholder="Date of Birth" required/>
          </div>

          <div class="col-md-6 pb-3">
              <label>Age:</label><br>
              <input class="col-12" type="number" name="age" placeholder="Age" required/>
          </div>
          
          <div class="col-md-6 pb-3">
              <label>Address:</label><br>
              <input class="col-12" type="text" name="address" placeholder="Address" required/>
          </div>

          <div class="col-md-6 pb-3">
              <label>Gender:</label><br>
              <input class="col-12" type="text" name="gender" placeholder="Gender" required/>
          </div>   

          <div class="col-md-6 pb-3">
            <label for="mobile">Mobile:</label><br>
            <input class="col-12" type="tel" id="mobile" name="mobile" placeholder="910-123-4567" 
            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="12" required>                   
            </div>       

           <input type="text" name="status" value="Under Observation" hidden required/>
            <input type="text" name="fee" value="Unpaid" hidden required/>

        </div>
      </div>
    </div>
  </div>



{{--        BUTTON SIGN UP          --}}
        <div class="buttonSignup">            
            <input type="submit" class="btn btn-primary" value="Sign Up" />            
        </div>
        <script>
          // JavaScript function to preview the selected image
          function previewImage(input) {
              var file = input.files[0];
              if (file) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#showPhoto').attr('src', e.target.result);
                  }
                  reader.readAsDataURL(file);
              }
          }
      </script>

</form>

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
    .profile1 {
      
      margin-left: 5%;
      width: 900px;
    }
    
    .button {
      float: right;
      margin-top: 5%;
      margin-right: 16%;
    }
    .button > .buttonCancel {
      background-color: white;
      border: 2px solid blue;
      color: blue;
    }
    .circle {
        height: 300px;
        width: 300px;
        background-color: #D9D9D9;
        border-radius: 50%;
    }
    .profile {
      margin-left: 8%;
      width: 900px;
    }
    .buttonSignup {
        float: right;
        margin-top: 2%;
        margin-right: 6%;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    }

    .uploadPhoto {
        align-items: center;
        margin-left: 12%;
    }

    .text {
        margin-left: 50%;
    }
    .cancel {
    margin-left: 32%;
}

</style>    

@endsection 
