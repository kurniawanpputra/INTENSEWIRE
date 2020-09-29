<?php
    $title = "Create Tag";
?> 

@extends('layouts.app')

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
            New tag
        </div>

        <div class="panel-body">
            <form action="{{ route('tag.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Tag name</label>
                    <input type="text" class="form-control" name="tag">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Save Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
