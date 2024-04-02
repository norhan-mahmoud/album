<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Album</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="p-5">
    <h1 class="h1 mb-3 bg-success p-3 rounded text-white">Album</h1>
    @if(session('albumsSec'))
    <div class="alert alert-warning" role="alert">
        <p class="col-12">
            An album contains photos. You can move the photos to another album or delete the album and the photos together
        </p>
        <form class="form-inline" action="{{ route('movePhoto',['id'=>session('id')]) }}" method="POST">
            @csrf
            <div class="row">
            <div class="col-4">
            <select name="album_id" class="form-control ">
                @foreach(session('albumsSec') as $album)
                <option value="{{ $album->id }}">{{ $album->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-primary">Move & Delete</button>
        </div>
    </div>
        </form>

        <a href="{{ route('deleteAllPhotos',['id'=>session('id')]) }}" class="alert-link text-danger">Delete All</a>
    </div>
    @elseif(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row border border-secondary-subtle rounded p-2 my-5">
        <h3 class="h3 text-success">Add new album</h3>
        @error('albumName')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <form action="{{route('createAlbum')}}" method="POST" class="row g-3 align-items-center">
            @csrf
            <div class="col-8 mb-3 ">
                <div class="input-group">
                    <input type="text" class="form-control @error('albumName') is-invalid @enderror" name="albumName"
                        placeholder="Album Name">

                </div>
            </div>

            <div class="col-4 mb-3">
                <button type="submit" class="btn btn-outline-success">Create</button>
            </div>
        </form>
    </div>
    <div class="border  mt-4 p-3 border-secondary-subtle rounded">
        <h2 class="h2 my-3 text-success"> Album List</h2>


        <ul class="list-group list-group-numbered my-5">
            @foreach($albums as $album)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <a href="{{route('photos', ['id' => $album->id])}}" class="text-decoration-none text-reight col-10 bg-secondary text-white p-3 rounded">
                    <div class="ms-2 me-auto ">
                        <div class="fw-bold">{{$album->name}}</div>
                    </div>
                </a>
                <a href="{{route('deleteAlbum',['id'=>$album->id])}}" type="button"
                    class="close badge text-bg-danger rounded-circle text-decoration-none" aria-label="Close">
                    <span>&times;</span>
                </a>
            </li>
            @endforeach



        </ul>
    </div>
</body>

</html>
