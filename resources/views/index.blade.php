<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 13 with Bootstrap</title>

    <!-- Import Bootstrap CSS & JS via Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
 <x-navbar app_name="i-Note"/>
<h2 class="text-center">Hello {{ auth()->user()->name }} Manage All of your notes</h2>
<div class="d-flex w-100 align-items-center justify-content-end my-3 px-4 box-border">
    <a href="/create" class="btn btn-primary">Add Note</a>
</div>
@if ($search)
    <div class=" d-flex align-items-center justify-content-center gap-3">
        <h2>Searching For {{ $search}}</h2> 
        <a href="/" class="btn btn-danger">Clear</a>
    </div>
@endif
<div class="d-flex align-items-center flex-wrap gap-3 w-100 px-4">
  @foreach ($notes as $note)
    <x-card title="{{ $note->title }}"  content="{{ $note->content }}" id="{{ $note->id }}" thumblain="{{ $note->thumblain }}"/>
  @endforeach
</div>
</body>
</html>
