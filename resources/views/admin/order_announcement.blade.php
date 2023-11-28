@extends('admin.layout.layout')
@section('content')
  @include('admin.include.navbar_announcement')
  <div class="navbar pt-5 pb-4" style="background-color: #D6D6D6;">
  </div>
<div class="d-flex justify-content-center">
    <ul class="hstack gap-5 navbar-nav fs-3">
      <li class="nav-item">
        <a class="nav-link " href="/memo_announcement" aria-current="page">Memo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/reso_announcement">Resolutions</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link actives" href="/order_announcement">Executive Order</a>
      </li>
    </ul>
  </div>

  <div class="container">
    <table id="membertable" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col">File Name</th>
          <th scope="col">Date Announced</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
  
        @foreach ($data as $item)
            
        <tr>
          <td><i class="fa-solid fa-file-pdf"> </i>{{ $item->file }}</td>
          <td>{{ $item->created_at->format('Y-m-d') }}</td>
          <td>
             <a href="{{ url('/download', $item->file) }}" class="btn btn-success me-3">Download</a>
             <a href="{{ route('delete_order', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?')">Delete</a>
          </td> 
       </tr>
       
        @endforeach
      </tbody>
      </table>
  </div>
<!-- Button to trigger the upload modal -->
<div class="position-fixed bottom-0 end-0 mx-5 my-5 ">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="fa-solid fa-plus"></i> Add New
</button>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title ms-auto" id="exampleModalLabel">Upload Announcement</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

              <form action="{{ route('upload_order') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mt-4 mb-5">
                      {{-- <label for="file" class="form-label">Choose File:</label> --}}
                      <input type="file" name="file" id="file" class="form-control" accept=".pdf">
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

{{-- Upload Success Message --}}
@if(session('success'))
    <style>
        /* Add CSS styles for the success message */
        #success-message {
            opacity: 1;
            transition: opacity 0.5s ease-in-out; /* Adjust the duration and easing as needed */
        }
    </style>
    
    <div id="success-message" class="alert alert-success position-fixed top-0 mt-5  ms-4">
        {{ session('success') }}
    </div>
    
    <script>
        // Function to close the success message
        function closeSuccessMessage() {
            var successMessage = document.getElementById('success-message');
            successMessage.style.opacity = '0';

            // Wait for the transition to complete before hiding or removing the message
            setTimeout(function () {
                successMessage.style.display = 'none'; // or remove the success message from the DOM
            }, 500); // Duration of the transition, should match the CSS transition duration
        }

        // Use pure JavaScript to detect when the modal is closed
        document.getElementById('uploadModal').addEventListener('hidden.bs.modal', function () {
            // Move the success message outside the modal
            document.body.appendChild(document.getElementById('success-message'));

            // Auto-close the success message after 3000 milliseconds (adjust the time as needed)
            setTimeout(closeSuccessMessage, 3000); // 3000 milliseconds = 3 seconds, adjust as needed
        });

        // Close the success message after 3000 milliseconds even if the modal is not closed
        setTimeout(closeSuccessMessage, 3000); // 3000 milliseconds = 3 seconds, adjust as needed
    </script>
@endif



{{-- delete success message --}}
@if(session('delete_success'))
   <style>
      /* Add CSS styles for the delete success message */
      #delete-success-message {
         opacity: 1;
         transition: opacity 0.5s ease-in-out; /* Adjust the duration and easing as needed */
      }
   </style>
   
   <div id="delete-success-message" class="alert alert-success position-fixed top-0 mt-5  ms-4">
      {{ session('delete_success') }}
   </div>
   
   <script>
      // Function to close the delete success message
      function closeDeleteSuccessMessage() {
         var deleteSuccessMessage = document.getElementById('delete-success-message');
         deleteSuccessMessage.style.opacity = '0';

         // Wait for the transition to complete before hiding or removing the message
         setTimeout(function () {
            deleteSuccessMessage.style.display = 'none'; // or remove the delete success message from the DOM
         }, 500); // Duration of the transition, should match the CSS transition duration
      }

      // Auto-close the delete success message after 3000 milliseconds (adjust the time as needed)
      setTimeout(closeDeleteSuccessMessage, 3000); // 3000 milliseconds = 3 seconds, adjust as needed
   </script>
@endif

<style>
  .actives{
    border-bottom: 5px solid #366DDA;
  }
  .nav-link:hover{
    color: #366DDA !important;
  }
</style>
                
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script>
    let table = new DataTable('#membertable');
  </script>
@endsection 