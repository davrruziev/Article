<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <a href="" class="btn btn-primary mr-3 d-none d-lg-block">Get A Quote</a>
        <div class="navbar-nav py-0">
            @if(\Illuminate\Support\Facades\Auth::user())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            @else
                <a href="{{route('login')}}" class="nav-item nav-link active">Login</a>
            @endif
        </div>

    </div>
</nav>
