@extends('admin.layout.layout')
@section('content')
  @include('member.include.navbar_announcement')
  <nav class="navbar py-3" style="background-color: #D6D6D6;">
    <div class="container-fluid">
      <a class="navbar-brand"></a>
      <form class="d-flex" role="search" action="{{ route('search_order') }}" method="GET">
        <input class="form-control me-2" type="search" name="query" placeholder="Search file name" aria-label="Search" style="border: 1px solid #464545;">
        <button class="btn btn-info" type="submit">Search</button>
    </form>
    </div>
  </nav>
  
  <div class="d-flex justify-content-center">
    <ul class="hstack gap-5 navbar-nav fs-3">
      <li class="nav-item">
        <a class="nav-link " href="/memo_announcements" >Memo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/reso_announcements">Resolutions</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="/order_announcements" aria-current="page">Executive Order</a>
      </li>
    </ul>
  </div>
    <div class="container">
      <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">File Name</th>
          <th scope="col">Date Announced</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <br><br><br>
      <tbody>
    
          @foreach ($data as $item)
              
          <tr>
            <td><i class="fa-solid fa-file-pdf"> </i>{{ $item->file }}</td>
            <td>{{ $item->created_at->format('Y-m-d') }}</td>
            <td>
               <a href="{{ url('/download_order', $item->file) }}" class="btn btn-success me-3">Download</a>
            </td> 
         </tr>
         
         
    
          @endforeach
      </tbody>
    </table>
    </div>
    
    <style>
      .active{
        border-bottom: 5px solid #366DDA;
      }
      .nav-link:hover{
        color: #366DDA !important;
      }
    </style>
    @endsection 