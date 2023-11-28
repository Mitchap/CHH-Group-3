@extends('admin.layout.layout')
@section('content')
  @include('member.include.navbar_announcement')
  <div class="navbar pt-5 pb-4" style="background-color: #D6D6D6;">
  </div>
  <div class="d-flex justify-content-center">
    <ul class="hstack gap-5 navbar-nav fs-3">
      <li class="nav-item">
        <a class="nav-link " href="/memo_announcements" >Memo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link actives" href="/reso_announcements" aria-current="page">Resolutions</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/order_announcements">Executive Order</a>
      </li>
    </ul>
  </div>
  <div class="container">
    <table id="resoTable" class="table table-striped" style="width:100%"> 
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
               <a href="{{ url('/download_reso', $item->file) }}" class="btn btn-success me-3">Download</a>
            </td> 
         </tr>     
    
          @endforeach
      </tbody>
    </table>
    </div>
    
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
    $(document).ready(function() {
      $('#resoTable').DataTable();
    });
  </script>
    @endsection 