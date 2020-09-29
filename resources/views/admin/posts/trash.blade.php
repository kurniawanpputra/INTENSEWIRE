<?php
    $title = "Trash Bin";
?> 

@extends('layouts.app')

@section('content')

    <table class="table table-hover" style="background-color: #fff; border-radius: 2.5px;">
        <thead>
            <th style="text-align: center;">
                Thumbnail
            </th>
            <th style="text-align: center;">
                Title
            </th>
            <th style="text-align: center;">
                Trashed at
            </th>
            <th style="text-align: center;">
                Action
            </th>
        </thead>
        <tbody>
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <tr>
                        <td style="text-align: center;">
                            <img data-src="{{ asset($post->featured) }}" alt="{{$post->slug}}.jpg" height="75" width="auto" style="border-radius: 2.5px;" class="lozad">
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{$post->title}}<br/>
                            [Tag(s):
                                @if(count($post->tags) > 0)
                                    @foreach($post->tags as $tag)
                                        @if(!$loop->last)
                                            {{$tag->tag}},
                                        @else
                                            {{$tag->tag}}]
                                        @endif
                                    @endforeach
                                @endif
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{$post->deleted_at->format('d/m/y - H:i')}}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-success btn-xs">Restore</a>
                            <a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-xs" onclick="if (!confirm('Are you sure?')) event.preventDefault();">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center;">
                        No trashed post.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div align="center">
        {{ $posts->links() }}
    </div>

@stop
