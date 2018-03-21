   @if (Route::has('login'))

   <ul class="nav justify-content-center">
     @auth
  <li class="nav-item">
    <a class="nav-link active" href="{{ url('/home') }}">Home</a>
  </li>
    @else
  <li class="nav-item">
    <a class="nav-link" href="{{ route('login')">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">Register</a>
  </li>
  @endauth
                
@endif
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>

