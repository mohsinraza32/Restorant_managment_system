@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Our Chef</h2>
                <a href="{{ route('our-chef.create') }}" class="btn btn-primary mb-3">Create Chef</a>
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
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chef as $chefs)
                            <tr>
                                <td>{{ $chefs->full_name }}</td>
                                <td>{{ Str::limit($chefs->designation, 50, '...') }}</td>
                                <td><a href="{{ $chefs->facebook }}" target="_blank">{{ $chefs->facebook }}</a></td>
                                <td><a href="{{ $chefs->twitter }}" target="_blank">{{ $chefs->twitter }}</a></td>
                                <td><a href="{{ $chefs->instagram }}" target="_blank">{{ $chefs->instagram }}</a></td>
                                <td><img src="{{ Storage::url($chefs->image_path) }}" width="100"></td>
                                <td>
                                    <a href="{{ route('our-chef.edit', $chefs->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('our-chef.destroy', $chefs->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this chef?')">Delete</button>
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
