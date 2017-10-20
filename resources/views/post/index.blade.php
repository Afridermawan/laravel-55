@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @foreach ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a> {{ $post->created_at->diffForHUmans() }}
                            <div class="pull-right">
                                <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-xs btn-danger">Hapus</button>
                                    <a href="{{ route('post.edit', $post->id) }}" 
                                        class="btn btn-xs btn-primary">Edit
                                    </a>           
                                </form>
                            </div>
                        </div>     
                        <div class="panel-body">
                            <p>{{ str_limit($post->content, 100, ' ...') }}</p>
                        </div>
                    </div>
                @endforeach
                {{ $posts->render() }}
            </div>
        </div>
    </div>
@endsection