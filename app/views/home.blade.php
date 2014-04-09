@extends('layout')

@section('content')
<div class="jumbotron">
    <form action="/search" method="post">
        <h1>SearchPortal</h1>

        <p><input name="query" id="query" placeholder="What do you want to search for?" class="form-control" /></p>

        <p>
            <select class="form-control" name="slug">
                @foreach($searchengines as $searchengine)
                <option value="{{ $searchengine->slug }}">{{ $searchengine->name }}</option>
                @endforeach
            </select>
        </p>

        <p><input type="submit" value="Search" class="btn btn-lg btn-success"/></p>
    </form>
</div>
@stop