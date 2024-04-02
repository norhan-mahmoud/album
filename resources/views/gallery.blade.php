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
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

</head>

{{-- <body class="p-5">
    @if(session('error'))
    {{session('error')}}
    @endif
    <h1 class="h1 mb-3 bg-success p-3 rounded text-white">Albume: <span class="text-warning">{{$album->name}}</span></h1>
<div class="row justify-content-center mt-5" >
    <form action="{{ route('upload', ['id' => $album->id]) }}" method="POST" enctype="multipart/form-data" class="col-8 border border-success rounded p-5">
        <h4 class="h4">Add photos</h4>
        @csrf
        <input type="file" name="filepond[]" id="filepond" class="filepond" accept="image/*"  multiple >
        <div class="row justify-content-end">
        <button type="submit" class="btn btn-success">Upload</button>
    </div>
    </form>
</div>
<hr class="text-success m-5">


</body> --}}

<body class="p-5">
    @if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="h1 mb-3 bg-success p-3 rounded text-white">Album: <span class="text-warning">{{ $album->name }}</span></h1>
    <div class="row justify-content-center mt-5">
        <form action="{{ route('upload', ['id' => $album->id]) }}" method="POST" enctype="multipart/form-data"
            class="col-8 border border-success rounded p-5">
            <h4 class="h4">Add photos</h4>
            @csrf
            <input type="file" name="filepond[]"  class="filepond" accept="image/*" multiple>
            <div class="row justify-content-end mt-3">
                <button type="submit" class="btn btn-success ">Upload</button>
            </div>
        </form>
    </div>
    <hr class="text-success m-5">


    <div class="container">
        <div class="row">
            @foreach($album->photos as $photo)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <img src="{{ asset($photo->path) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photo->name }}</h5>
                       <a href="{{route('deletePhoto',['id'=>$photo->id])}}" class="btn btn-danger text-white form-control"> delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>


</html>
