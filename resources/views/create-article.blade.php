@extends('master')

@section('title')
    Create New Article
@endsection

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 text-right">
            <a href="{{route('articles.index')}}" class="btn btn-primary">Back to Articles</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
            <form action="{{route('articles.store')}}" method="post">
                @csrf
                <div class="card show">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">x </button>
                            {{Session::get('success')}}
                        </div>
                    @elseif (Session::has('failed'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert">x </button>
                            {{Session::get('failed')}}
                        </div>
                    @endif

                    <div class="card-header">
                        <h4 class="card-title">Create New Article</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                            {!!$errors->first("title", "<span class='text-danger'>:message</span>")!!}
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control">{{old('descripotion')}}</textarea>
                            {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection