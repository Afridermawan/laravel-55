@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Post</div>

                    <div class="panel-body">
                        <form class="", action="{{ route('post.update', $post->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH ') }}
                            <div class="form-group">
                                <label for="title">Category*</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                            @if ($category->id === $post->category_id)
                                                selected 
                                            @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('title') ? ' has-error' : '' }}" >
                                <label for="title">Title*</label>
                                <input value="{{ $post->title }}" type="text" name="title" class="form-control" placeholder="Write title ..">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('title') }}</p>
                                    </span>
                                @endif                               
                            </div>

                            <div class="form-group has-feedback{{ $errors->has('content') ? 'has-error' : '' }}">
                                <label for="title">Content**</label>
                                <textarea name="content" rows="8" class="form-control" placeholder="Write content ..">{{ $post->content }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <p>{{ $errors->first('content') }}</p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>                     
            </div>
        </div>
    </div>
@endsection