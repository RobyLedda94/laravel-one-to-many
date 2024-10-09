@extends('layouts.app')

@section('content')
    <div class="container-fluid p-3">
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-12">
                <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title" class="control-label"><strong>Titolo :</strong></label>
                        <input type="text" name="title" id="title" class="form-control form-control-sm" placeholder="Inserisci il titolo" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class=" my-3 col-12">
                    @if (Str::startsWith($post->cover_image, 'https'))
                        <img class="img-fluid" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                    @else
                        <img class="img-fluid" src="{{ asset('./storage/'. $post->cover_image) }}" alt="{{ $post->title }}">
                     @endif
                     <div class=" my-3">
                        <label for="" class="control-label">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control form-control-sm">
                     </div>
                    </div>
                    <div class="form-group my-3">
                        <label for="content" class="control-label"><strong>Contenuto :</strong></label>
                        <textarea class="form-control form-control-sm w-100 textarea-sm" name="content" id="content-post" placeholder="Inserisci il contenuto">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection