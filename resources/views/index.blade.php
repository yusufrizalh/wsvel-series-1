@extends('master');

@section('title')
    Articles
@endsection

@section('content')

<div class="row mb-4">
    <div class="col-xl-6">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">x </button>
                {{ Session::get('success') }}
            </div>
        @elseif (Session::has('failed'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">x </button>
                {{ Session::get('failed') }}
            </div>
        @endif
    </div>
    <div class="col-xl-6 text-right">
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Add New Article</a>
    </div>
</div>

    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if (count($articles) > 0)
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->description }}</td>
                        <td>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {!! $articles->links() !!}

@endsection
