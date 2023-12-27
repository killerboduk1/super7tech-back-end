@extends('layouts.master')

@section('content')

    @include('layouts.menu',['page' => 'admin'])

    <!-- Begin page content -->
    <main class="container mt-5">

        <h4>Add Employee</h4>
        <a href="{{ route('admin') }}" class="btn btn-primary btn-sm">Back</a>

        <div class="row mt-5">
            <div class="col-lg-5 col-md-12">
                @if ($errors->any())
                    <div class="alert text-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session('message') }}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-warning" role="alert">
                        {{ Session('error') }}
                    </div>
                @endif
                <form action="{{ route('editemployee_post', ["id" => $id]) }}" method="post">
                    @csrf <!-- {{ csrf_field() }} -->
                    <div class="mb-3">
                      <label for="firstname" class="form-label">Firstname</label>
                      <input type="text" class="form-control" name="first_name" id="firstname" value="{{ $employee->first_name }}">
                    </div>
                    <div class="mb-3">
                      <label for="lastname" class="form-label">Lastname</label>
                      <input type="text" class="form-control" name="last_name" id="lastname" value="{{ $employee->last_name }}">
                    </div>
                    <div class="mb-3">
                      <label class="position" for="exampleCheck1">Check me out</label>
                      <select class="form-select" name="position" id="position">
                        @if (Session::get('userRole'))
                        <option value="{{ $employee->position }}">
                            {{ ucwords(Str::replace('_', ' ', $employee->position))  }}
                        </option>
                        @else
                        <option value="{{ $employee->position }}">
                            {{ ucwords(Str::replace('_', ' ', $employee->position))  }}
                            </option>
                        <option value="web_developer">Web Developer</option>
                        <option value="web_designer">Web Designer</option>
                        <option value="manager">Manager</option>
                        @endif
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>

    </main>

@endsection
