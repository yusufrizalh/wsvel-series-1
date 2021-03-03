@extends('master')

@section('title')
    Update Article
@endsection

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('articles.index')}}" class="btn btn-primary"> Back to Articles </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form action="{{route('articles.update', $article->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card shadow">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('success')}}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">× </button>
                            {{Session::get('failed')}}
                        </div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title"> Update Article </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> Title </label>
                            <input type="text" name="title" class="form-control" id="title" value="@if(!empty($article)) {{$article->title}} @endif">
                            {!!$errors->first("title", "<span class='text-danger'>:message </span>")!!}
                        </div>

                        <div class="form-group">
                            <label for="description"> Description </label>
                            <textarea class="form-control" name="description" id="description">@if(!empty($article)){{$article->description}}@endif</textarea>
                            {!!$errors->first("description", "<span class='text-danger'>:message </span>") !!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success"> Update </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection