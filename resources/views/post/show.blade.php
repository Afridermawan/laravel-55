@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }} | <small>{{ $post->category->name }}</small>
                    </div>     
                    <div class="panel-body">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>       
               <div class="panel panel-default">
                    <div class="panel-heading">Tambahkan Komentar</div>
                    @foreach ($post->comments()->get() as $comment)
                        <div class="panel-body">
                            <h3>{{ $comment->user->name }} - <small>{{ $comment->created_at->diffForHUmans() }}</small></h3>
                            <p>{{ $comment->message }}</p>
                        </div>                             
                    @endforeach     
                    <div class="panel-body">
                        <form action="{{ route('post.comment.store', $post->id) }}" class="form-horizontal has-feedback{{ $errors->has('message') ? 'has-error' : '' }}" method="post">
                            {{ csrf_field() }}
                                <textarea name="message" id="" cols="30" rows="5" value="{{ old('message') }}" class="form-control" placeholder="Tulis Komentar ...">
                                </textarea>
                                <input type="submit" value="Komentar" class="btn btn-primary">
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('message') }}</p>
                                    </span>
                                @endif
                        </form>
                    </div>
                </div>                                          
            </div>
        </div>
    </div>
@endsection