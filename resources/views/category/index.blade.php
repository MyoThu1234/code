@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @if(session('article-delete'))
            <div class="alert alert-success">
                {{session('article-delete')}}
            </div>
            @endif
            @if(session('done'))
            <div class="alert alert-success">
                {{session('done')}}
            </div>
            @endif
            @foreach ($categories->articles as $article)
                <div class="card mb-4">
                    <div class="card-header">
                        @auth
                        <a href="{{url("/article/delete/$article->id")}}" class="float-end text-danger" ><i class="fa-solid fa-xmark"></i></a>
                        @endauth
                        <h6 class="text-primary">{{ $article->user->name}}</h6>
                        <small class="d-block">{{ $article->day}}</small>
                        <small >{{ $article->clock}}</small>
                        <small > {{$article->amPm}}</small>
                    </div>
                    <div class="card-body">
                        <p>{{ $article->content }}</p>
                        <div class="m-1 border p-3">
                            <img src="{{ $article->image }}" alt="">
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{url("/like/$article->id")}}" method="post">
                         @csrf
                         <input type="hidden" value="{{$article->id}}" name="article_id">

                         {{-- <input type="submit" class="btn btn-primary" value="{{count($article->like)}}
                         like"> --}}
                         <button class="btn btn-danger"><i class="fa-brands fa-gratipay"></i> {{count($article->like)}}Like</button>
                        </form>
                        <a href="{{ url("/comment/$article->id") }}" class="btn btn-secondary float-end"><i class="fas fa-comment me-1"></i>Comment</a>
                     </div>

                    {{-- <div class="card-footer">
                        <div class="ms-4">
                            <a href="{{ url("/comment/$article->id") }}" class="btn btn-secondary"><i class="fas fa-comment me-1"></i>Comment</a>
                        </div>
                    </div> --}}
                </div>
            @endforeach
        </ul>
    </div>
@endsection
