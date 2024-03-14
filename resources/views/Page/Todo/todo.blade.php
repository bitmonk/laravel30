@extends('app')

@section('content')
    <div class="container my-5">
        <form action="{{route('todo.post')}}" method="post">
            <div class="d-flex gap-2 justify-content-center">
                @csrf
                <div>
                    <input type="text" placeholder="Add Task" name="blabla" class="form-control"  id="">
                    @error('blabla')

                    <span class="text-danger">{{$message}}</span>
                        <span>Hello world</span>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
            <div class='my-5'>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tasks</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $data)
                        <tr>
                            <th scope="row">{{$data->id}}</th>
                            <td>{{$data->task}}</td>
                            <td>
                                @if ($data->status==0)
                                <span><a class="badge bg-danger" href="{{route('incomplete', $data->id)}}">Incomplete</a></span>
                                @else
                                <span><a class="badge bg-success" href="">Complete</a></span>
                                @endif
                            </td>
                            <td><a href="{{route('todo.edit', $data->id)}}"><button class="badge bg-success text-white">Edit</button></a></td>
                            <td><a href="{{route('delete', $data->id)}}"><button class="badge bg-danger text-white">Delete</button></a></td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
    </div>
@endsection
