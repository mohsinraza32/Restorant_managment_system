@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Banner</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $banner->title }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" required>{{ $banner->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="button_text">Button Text</label>
                        <input type="text" name="button_text" class="form-control" id="button_text"
                            value="{{ $banner->button_text }}" required>
                    </div>
                    <div class="form-group">
                        <label for="button_link">Button Link</label>
                        <input type="url" name="button_link" class="form-control" id="button_link"
                            value="{{ $banner->button_link }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        @if ($banner->image_path)
                            <img src="{{ Storage::url($banner->image_path) }}" width="100" class="mt-3">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>



@endsection
