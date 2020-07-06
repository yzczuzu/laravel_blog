@extends('layouts.base')

@section('content')
    <div class="container text-center">
        <h1 class="pull-xs-left">
            Your Notebooks
        </h1>
        <div class="pull-xs-right">
            <a class="btn btn-primary" href="{{route('notebooks.create')}}" role="button">
                New NoteBook +
            </a>
        </div>
        <div class="clearfix">
        </div>
        <!-- notebook view -->
        <div class="row notebooks">
            @foreach($notebooks as $notebook)
                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-block">
                            <a href="{{route('notebooks.show',$notebook->id)}}">
                                <h4 class="card-title">
                                    {{$notebook->name}}
                                </h4>
                            </a>
                        </div>
                        <a href="{{route('notebooks.show',$notebook->id)}}">
                            <img alt="Responsive image" class="img-fluid" src="dist/img/{{$notebook->avatar}}"
                                 onmouseenter="this.src='dist/img/{{$notebook->avatarcopy}}'"
                            onmouseleave="this.src='dist/img/{{$notebook->avatar}}'"/>
                        </a>
                        <div class="card-block">
                            <a class="card-line" style="text-decoration: none" href="{{route('notebooks.edit',$notebook->id)}}">
                                <input class="btn btn-sm btn btn-success" type="submit" value="Edit">
                                </input>
                            </a>
                            
                            <a  href="{{URL::to('pdf')}}" style="text-decoration: none">
                                <input class="btn btn-sm btn btn-primary" type="submit" value="PDF">
                                </input>
                            </a>
                            {{-- <a class="card-link" href="#"> --}}
                            {{-- delete form --}}
                            <form style="display:inline" action="{{route('notebooks.destroy',$notebook->id)}}" class="pull-xs-right5 card-link" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                </input>
                            </form>
                            {{-- </a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
