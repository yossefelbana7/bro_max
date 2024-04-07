@extends('navget.layout.app')

@section('content')
    <div class="container col-6 my-5">
        @if ($errors->any())
            <div class="alert alert-danger mx-auto">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="/emp/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Navget Name</label>
                        <input type="text" class="form-control" name="empName">
                    </div>
                    <div class="form-group">
                        <label>Navget Salary</label>
                        <input type="text" class="form-control" name="empSalary">
                    </div>
                    <button class="btn btn-info">Send data</button>
                </form>
            </div>
        </div>
    </div>
@endsection
