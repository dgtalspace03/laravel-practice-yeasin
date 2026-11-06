@props(['note'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Note</title>
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <x-navbar app_name="i-Note"/>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <form action="/note/edit/{{ $note->id }}" method="POST">
            @csrf
     @method('PUT')
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $note->title }}">
    @error('title')
    <div class="text-danger">{{ $message }}</div>
    @enderror
   
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Text Content</label>
     <textarea class="form-control"  name="content" placeholder="Enter your note content" id="floatingTextarea2" style="height: 100px">{{ $note->content }}</textarea>
      @error('content')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Edit</button>
</form>
  </div>
    </div>
</div>
</body>
</html>