@extends('admin.layout.layout')
@section('content')
  @include('admin.include.navbar_member')
  <div class="navbar pt-5 pb-4" style="background-color: #D6D6D6;">
  </div>
 <div>
        <p class="h3 text-center">
          MEMBER LIST
        </p>
      </div>
    
    <div class="container">
    <table id="membertable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Action</th>
   
            </tr>
        </thead>
        <tbody>

         
          @foreach ($member as $member)
   
        
        <tr>
          <td>
            {{-- Debug: {{ $member->photo }}<br> --}}
            <img src="{{ asset($member->photo ? $member->photo : 'assets/default.png') }}" alt="photo"
            class="rounded-circle img-fluid" style="width: 75px; border:
            @if($member->status == 'Under Observation')
                5px solid blue
            @elseif($member->status == 'Active')
                5px solid green
            @elseif($member->status == 'Inactive')
                5px solid red
            @endif ">
        
        </td>
              
            <td>{{ $member->first_name }}</td>
            <td>{{ $member->last_name }}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->mobile }}</td>
            <td>{{ $member->gender }}</td>
            <td>{{ $member->status }}</td>
            <td>
              <a class="btn btn-success " href="{{ route('edit_member', ['member' => $member]) }}" role="button">Edit</a>
              <a class="btn btn-warning " href="{{ route('view_member', ['member' => $member]) }}" role="button">View</a>
             <form action="{{ route('delete_member', ['member' => $member]) }}" method="post" enctype="multipart/form-data" class="d-inline">
                  @csrf
                  @method('delete')
                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this member?')" >
            </form>
            </td>
          </tr>
           
            @endforeach
        </tbody>
        </table>
    </div>
                  
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
      let table = new DataTable('#membertable');
    </script>

<script>
  $(document).ready (function() {
      $('#example').DataTable({
          pageLength:5
      });
  });
</script>
@endsection 