@extends('layouts.master')

@section('content')

    @include('layouts.menu',['page' => 'admin'])

    <!-- Begin page content -->
    <main class="container mt-5">
        @if(Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session('message') }}
            </div>
        @endif
        @if(Session::has('warning'))
            <div class="alert alert-warning" role="alert">
                {{ Session('warning') }}
            </div>
        @endif
        <h4>Employee List</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Created At</th>
                        <th>
                            <a href="{{ route('addemployee') }}" class="btn btn-success btn-sm mx-2">Add</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>
                                {{ ucwords(Str::replace('_', ' ', $employee->position))  }}
                            </td>
                            <td>{!! date('M. d, Y', strtotime($employee->created_at)) !!}</td>
                            <td>
                                <a class=" float-start btn btn-warning btn-sm mx-2" href="{{ route("editemployee", ["id" => $employee->id]) }}">Edit</a>

                                <form action="{{ route('deleteemployee_post') }}" method="post">
                                    @csrf <!-- {{ csrf_field() }} -->
                                    <input type="hidden" name="delete" value="{{ $employee->id }}">
                                    <button onclick="popupfunction(event)" type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links('pagination::bootstrap-4') }}
        </div>

    </main>

@endsection

@section('script')
<script>
    function popupfunction(e) {
        if(!confirm("Are you sure?")){
            e.preventDefault();
        }
    }
    </script>
@endsection
