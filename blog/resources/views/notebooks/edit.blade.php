@extends('layouts.base')

@section('content')
    <div class="container text-center">
        <h1>
            Edit Notebook
        </h1>
        <form action="{{route('notebooks.update',$notebook->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">
                    NoteBook Name
                </label>
                <input class="form-control" name="name" placeholder="input" type="text">
                </input>
            </div>
            <div class="form-group">
                <lable for="cover">
                    Notebook Cover
                </lable>

                <img alt="Cover" class="img-fluid" src="/dist/img/{{$notebook->avatar}}" style="width: 150px;height: 150px;"/>
                <input type="file" name="avatar">


            </div>
            {{csrf_field()}}
            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
@endsection
