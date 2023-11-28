  
<nav class="navbar navbar-expand-lg custom">
    <div class="container-fluid">
        <a class="navbar-brand row">
          <div class="col-2 offset-1"><img src="{{ asset('logo.png') }}" class="img-fluid" alt="logo"></div>
        <div class="col-1 fs-4 my-auto" style="color: #FFFFFF;">Community<br>Helping Hands</div>
    </a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="offset-1">
        <ul class="hstack gap-3 navbar-nav fs-3">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/event" >
                <i class="fa-regular fa-calendar-days" ></i> EVENT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/memo_announcement"><i class="fa-regular fa-bell"></i> ANNOUNCEMENTS</a>
          </li>
          <li class="nav-item" style="border-bottom: 5px solid #366DDA;">
            <a class="nav-link" href="/member" style="color:#000000"><i class="fa-regular fa-user"></i> MEMBERS</a>
          </li>
          {{-- <li class="nav-item ">
            <a class="nav-link" href="/report"><i class="fa-solid fa-chart-simple"></i> REPORTS</a>
          </li> --}}
        </ul>
      </div>
      <ul class="hstack gap-3 navbar-nav fs-3 offset-4">
        <li  class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket text-black"> LOGOUT</i>
            </x-responsive-nav-link>
        </form>
          <a class="nav-link text-end" href="/"></a>
        </li>
      </ul>
        
    </div>
    </div>
    
</nav>
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
  </style>