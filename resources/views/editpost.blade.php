@extends('layout')

@section('content')
    <div class="container">
        @if ($errors->any())
            <h2>{{ $errors->first() }}</h2>
        @endif
        <form action="{{ route('post.edit', $post->id) }}" method="get">

            <input class="form" type="hidden" id="id" name="Id" value="{{ $request->id }}">
            <div class='title'>
                <label for="Title">Title</label>

                <input class="form" type="text" id="title" name="Title"
                    value="{{ $post->title }}{{ $request->title }}">
            </div>
            <br><br>
            <div class='des'>
                <label for="Description">Description</label>
                <textarea id="form" name="Description">{{ $request->description }}{{ $post->description }}</textarea>
                <br><br>
            </div>
            <div class='body'>
                <label for="Body">Body</label>
                <textarea id="form" name="Body">{{ $request->body }}"{{ $post->body }}"</textarea>
                <input class="form" type="submit" value="Submit">
            </div>
        </form>

    </div>
@endsection
