@extends('layouts.app')

@section('content')
	<div class="container">
		<form class="", action="{{ route('post.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Category*</label>
				<select name="category_id" id="" class="form-control">
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group has-feedback{{ $errors->has('title') ? 'has-error' : '' }}">
				<label for="title">Title*</label>
				<input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Write title ..">
				@if ($errors->has('title'))
					<span class="help-block">
						<p>{{ $errors->first('title') }}</p>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('content') ? 'has-error' : '' }}">
				<label for="content">Content**</label>
				<textarea name="content" rows="8" class="form-control" placeholder="Write content ..">{{ old('content') }}</textarea>
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
@endsection