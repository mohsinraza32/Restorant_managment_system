@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Edit Chef</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('our-chef.update', $chef->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" class="form-control" id="full_name" value="{{ old('full_name') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <textarea name="designation" class="form-control" id="designation" required>{{ old('designation') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="url" name="facebook" class="form-control" id="facebook"
                            value="{{ old('facebook') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="url" name="twitter" class="form-control" id="twitter"
                            value="{{ old('twitter') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="url" name="instagram" class="form-control" id="instagram"
                            value="{{ old('instagram') }}" required>
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        @if ($chef->image_path)
                            <img src="{{ Storage::url($chef->image_path) }}" width="100" class="mt-3">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>



@endsection
