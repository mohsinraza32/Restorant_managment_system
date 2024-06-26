@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Our Menu</h2>
                <a href="{{ route('our-menu.create') }}" class="btn btn-primary mb-3">Create Menu</a>
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
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $menus)
                            <tr>
                                <td>{{ $menus->title }}</td>
                                <td>{{ Str::limit($menus->description, 50, '...') }}</td>
                                <td><img src="{{ Storage::url($menus->image_path) }}" width="100"></td>
                                <td>
                                    <a href="{{ route('our-menu.edit', $menus->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('our-menu.destroy', $menus->id) }}" method="POST"
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
