@extends('app')
@section('content')

<div class="container">
    <form action="{{route('todo.update', $user->id)}}" method="post">
        @csrf
    <div class="my-5 d-flex gap-4 justify-content-center">
        <input type="text" name="task" value="{{$user->task}}" class="form-control w-25">
        <div>
            <button class="btn btn-primary">Edit</button>
        </div>
    </div>
    {{$user->task}}
</form>
</div>

@endsection