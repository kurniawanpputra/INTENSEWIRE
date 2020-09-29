<?php
    $title = "View Categories";
?> 

@extends('layouts.app')

@section('content')
    <table class="table" style="background-color: #fff; border-radius: 2.5px;">
        <thead>
            <th style="text-align: center;">
                Category name
            </th>
            <th style="text-align: center;">
                Action
            </th>
        </thead>

        <tbody>
            @if($categories->count() > 0)
                @foreach($categories as $category)
                    <tr>
                        <td style="text-align: center;">
                            {{$category->name}}
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info btn-xs">Edit</a>
                            <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-xs" onclick="if (!confirm('Are you sure?')) event.preventDefault();">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center;">
                        No categories found.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div align="center">
        {{ $categories->links() }}
    </div>
@stop
