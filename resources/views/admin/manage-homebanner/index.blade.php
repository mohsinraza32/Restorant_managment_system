@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Banners</h2>
                <a href="{{ route('banners.create') }}" class="btn btn-primary mb-3">Create Banner</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Button Text</th>
                            <th>Button Link</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $banner->title }}</td>
                                <td>{{ $banner->description }}</td>
                                <td>{{ $banner->button_text }}</td>
                                <td><a href="{{ $banner->button_link }}" target="_blank">{{ $banner->button_link }}</a></td>
                                <td><img src="{{ Storage::url($banner->image_path) }}" width="100"></td>
                                <td>
                                    <a href="{{ route('banners.edit', $banner->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this banner?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
