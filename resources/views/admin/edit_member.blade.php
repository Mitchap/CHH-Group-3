@extends('admin.layout.layout')
@section('content')
  @include('admin.include.navbar_member')
  <div class="navbar pt-5 pb-4" style="background-color: #D6D6D6;">
  </div>

  <nav class="navbar bg-body-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Members</a>
    </div>
  </nav>

  {{--        second Navbar    --}}
  <div>
    <p class="h4 text-center">
      {{ $member -> first_name }} {{ $member-> last_name }}
    </p>
  </div>

  

    <form method="POST" action="{{ route('update_member', ['member' => $member]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')

        {{--        Dropdown  Member Status  --}}

        <div class="infos">
          <div class="container">
            
            <div class="dropdown, memberstat">
              <label for="status">Member Status</label><br>
              <select id="myDropdownMemberStatus" class="dropdown-content" name="status" value="{{ $member->status }}">
                  <option name="status" {{ $member->status == "Under Observation" ? 'selected' : '' }} value="Under Observation">Under Observation</option>
                  <option name="status" {{ $member->status == "Active" ? 'selected' : '' }} value="Active">Active</option>
                  <option name="status" {{ $member->status == "Inactive" ? 'selected' : '' }} value="Inactive">Inactive</option>
              </select>
            </div>


      {{--        Dropdown   Annual Fee    --}}
          <div class="memberfee">
            <label for="fee">Annual Fee</label><br>
              <select id="myDropdownAnnualFee" class="dropdown-content" name="fee" value="{{ $member->fee }}">
                <option name="fee" {{ $member->fee == "Unpaid" ? 'selected' : '' }} value="Unpaid">Unpaid</option>
                <option name="fee" {{ $member->fee == "Paid" ? 'selected' : ''}} value="Paid">Paid</option>
              </select>
          </div> 
        </div>
      </div>


      {{--        PICTURE    --}}
      <div class="container d-flex">
        <div class="col-md-3 pb-3">          
          <img src="{{ asset($member->photo ? $member->photo : 'assets/default.png') }}" id="showPhoto" style="width: 250px; height: 250px" 
          class="rounded-circle pb-3" alt="photo"/>
          <input type="file" name="photo" id="photo" class="form-control" onchange="previewImage(this);">
        </div>



          <div class="profile1">
            <div class="row">
              {{--        Form    --}}

        <div class="col-md-6 pb-3">
            <label>First Name:</label><br>
            <input class="col-12" type="text" name="first_name" placeholder="First Name" value="{{ $member -> first_name }}" required/>
        </div>

        <div class="col-md-6 pb-3">
          <label>Email:</label><br>
          <input class="col-12" type="text" name="email" placeholder="Email" value="{{ $member -> email }}" required/>
        </div>

        <div class="col-md-6 pb-3">
            <label>Last Name:</label><br>
            <input class="col-12"type="text" name="last_name" placeholder="Last Name" value="{{ $member -> last_name }}" required/>
        </div>

        <div class="col-md-6 pb-3">
          <label>Date of Birth:</label><br>
          <input class="col-12"type="date" name="date_of_birth" placeholder="Date of Birth" value="{{ $member -> date_of_birth }}" required/>
      </div>

        <div class="col-md-6 pb-3">
            <label>Age:</label><br>
            <input class="col-12" type="number" name="age" placeholder="Age" value="{{ $member -> age }}" required/>
        </div>

        <div class="col-md-6 pb-3">
          <label>Address:</label><br>
          <input class="col-12" type="text" name="address" placeholder="Address" value="{{ $member -> address }}" required/>
        </div>

        <div class="col-md-6 pb-3">
          <label>Gender:</label><br>
          <input class="col-12" type="text" name="gender" placeholder="Gender" value="{{ $member -> gender }}" required/>
        </div>  

        <div class="col-md-6 pb-3">
            <label>Mobile:</label><br>
            <input class="col-12" type="tel" name="mobile" placeholder="910-123-4567" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{ $member -> mobile }}" required/>
        </div>        
        
            </div>
          </div>
        </div>
      </div>

        
          <div class="button">
            <input class="btn btn-outline-primary waves-effect waves-light" type="submit" value="Cancel"/>
            <input class="btn btn-primary waves-effect waves-light" type="submit" value="Save"/>
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
        .memberstat {
          z-index: 1;
          width: 170px;
          position: absolute;
          margin-top: 320px;
          margin-left: 45px;
        }
        .memberfee {
          z-index: 1;
          width: 170px;
          position: absolute;
          margin-top: 400px;
          margin-left: 45px;
        }
        .button {
          float: right;
          margin-top: 5%;
          margin-right: 16%;
        }

    </style>


      <script type="text/javascript">

      $(document).ready(function(){
          $('#photo').change(function(e){
              var reader = new FileReader();
              reader.onload = function(e){
                  $('#showPhoto').attr('src', e.target.result);
              }
              reader.readAsDataURL(e.target.files[0]);
          });
      });

      </script>
@endsection