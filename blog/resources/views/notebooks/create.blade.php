@extends('layouts.base')

@section('content')
    <div class="container text-center">
        <h1>
            Create Notebook
        </h1>
        <form action="{{route('notebooks.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">
                    NoteBook Name
                </label>
                <input class="form-control" name="name" placeholder="input" type="text" required>
                </input>
            </div>
            <div class="form-group">
                <lable for="cover">
                    Notebook Cover
                </lable>

                    <img alt="Cover" class="img-fluid" src="/dist/img/default.jpg" style="width: 150px;height: 150px;"/>
                <input type="file" name="avatar">


            </div>
            <input type="submit" class="btn btn-primary" value="Done">

        </form>
    </div>
@endsection