<?php
    $title = "Create Post";
?> 

@extends('layouts.app')

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@stop

@section('content')
    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            New post
        </div>

        <div class="panel-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured image</label>
                    <input type="file" class="form-control" name="featured">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" class="form-control" name="category_id">
                        <option value="" disabled selected>-- Choose category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if (old('category_id') == $category->id) {{ 'selected' }} @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: 5px;">
                    <label for="tags">Select tags</label><br/>
                    @foreach($tags as $tag)
                        <div class="checkbox" style="display: inline-block; margin-left: 5px;">
                            <label><input type="checkbox" value="{{ $tag->id }}" name="tags[]" @if(is_array(old('tags')) && in_array($tag->id, old('tags'))) checked @endif>{{ $tag->tag }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control" style="resize: none;">{{old('content')}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Save Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Write something...',
                minHeight: 200,
                maxHeight: 400,
                focus: true
            });
        });
    </script>
@stop
