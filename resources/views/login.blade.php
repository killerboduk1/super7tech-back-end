@extends('layouts.master')

@section('content')

    <!-- Begin page content -->
    <main class="container">

        <div class="row">
            <div class="mx-auto col-lg-5 col-md-8 mt-5">
                @if(Session::has('message'))
                    <p class="alert text-info">{{ Session('message') }}</p>
                @endif

                @if(Session::has('error'))
                    <div class="alert text-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert text-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h4> Login </h4>
                <div class="mb-3 card login-card">
                    <div class="card-header">
                    LOGIN
                    </div>
                    <div class="card-body">
                    <form action="{{ route('loginPost') }}" method="post">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary">Login</button></div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
