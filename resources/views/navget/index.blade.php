@extends('navget.layout.app')

@section('content')
    @if (Session::has('done'))
        <div class="alert alert-success">
            {{ Session::get('done') }}
        </div>
    @endif
    <div class="container col-6 my-5">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($emp as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->salary }}</td>
                            <td><a href="{{ route('emp.edit', $data->id) }}" class="btn btn-info"><i
                                        class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="{{ route('emp.show', $data->id) }}" class="btn btn-warning"><i
                                        class="fa-solid fa-eye"></i></a></a></td>
                            <td>
                                <form action="{{ route('emp.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-regular fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
