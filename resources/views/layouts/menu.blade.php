
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Super7tech Exam</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{  $page === "admin" ? "active" : "" }} " aria-current="page" href=" {{ route('admin') }} ">Home</a>
                    </li>

                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" role="search" class="m-0 dropdown-item">
                            @csrf
                            @method('DELETE')
                            <button class="nav-link text-capitalize" type="submit"> {{ Auth::user()->name }} : Logout</button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
