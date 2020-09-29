<?php
    $title = "Edit Category";
?> 

@extends('layouts.app')

@section('content')

@include('admin.includes.error')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit category
        </div>

        <div class="panel-body">
            <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Update Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@stop
