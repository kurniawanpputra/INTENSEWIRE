<?php
    $title = "View Tags";
?> 

@extends('layouts.app')

@section('content')
    <table class="table" style="background-color: #fff; border-radius: 2.5px;">
        <thead>
            <th style="text-align: center;">
                Tag name
            </th>
            <th style="text-align: center;">
                Action
            </th>
        </thead>

        <tbody>
            @if($tags->count() > 0)
                @foreach($tags as $tag)
                    <tr>
                        <td style="text-align: center;">
                            {{$tag->tag}}
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-info btn-xs">Edit</a>
                            <a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-xs" onclick="if (!confirm('Are you sure?')) event.preventDefault();">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center;">
                        No tags found.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div align="center">
        {{ $tags->links() }}
    </div>
@stop
