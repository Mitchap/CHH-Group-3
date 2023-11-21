<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>CHH</title>
</head>
<body>
    <div class="container col-md-4 mt-5">
        <div class="row">
        <div class="col-3"><img src="logo.png" class="img-fluid" alt="logo"></div>
        <div class="col fs-1" style="color: #0F2984;">Community<br>Helping Hands</div>
    </div>
        <div style="border: 2px solid lightgray; margin: 20px;"></div>
        <div class="card border-2 border-black mt-5" style="border-radius:0;">
            <div class="background-blue" style="">
            <p style="font-size:1.5rem;color: #2949BC;">Admin login</p>
            <p style="color: #526CCA;">Enter the details to login your account </p>
            </div>
    
            



            <x-auth-session-status class="mb-4" :status="session('status')" />      
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mx-auto" style="width: 24rem; padding-bottom: 50px;">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Username')" />
                <x-text-input id="email" class="block mt-1 w-full col-xl-9" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4 ">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 ms-1 w-full col-xl-9"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    

            <div class="my-3 offset-5">
              <input type="submit" class="btn btn-primary px-4" value="Login">
            </div>
          </form> 
        </div>
    </div>

            
            {{-- <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
    
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form> --}}
        

<style>
    .background-blue{
    background-color: #C8EBFB;
        margin: 30px auto;
        padding: 30px 100px 10px 10px;
    }
    @media only screen and (max-width: 600px) {
  .background-blue{
    margin: 20px auto;
    padding: 30px 20px 10px 10px;
  }
  }
</style>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
    <!-- Session Status -->
   


