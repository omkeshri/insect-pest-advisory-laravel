@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Crop</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('crops.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Crop Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="scientific_name" class="form-label">Scientific Name</label>
                            <input type="text" class="form-control @error('scientific_name') is-invalid @enderror" id="scientific_name" name="scientific_name" value="{{ old('scientific_name') }}">
                            @error('scientific_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="growing_conditions" class="form-label">Growing Conditions</label>
                            <textarea class="form-control @error('growing_conditions') is-invalid @enderror" id="growing_conditions" name="growing_conditions" rows="3" required>{{ old('growing_conditions') }}</textarea>
                            @error('growing_conditions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harvesting_period" class="form-label">Harvesting Period</label>
                            <textarea class="form-control @error('harvesting_period') is-invalid @enderror" id="harvesting_period" name="harvesting_period" rows="3" required>{{ old('harvesting_period') }}</textarea>
                            @error('harvesting_period')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Crop Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Add Crop</button>
                            <a href="{{ route('crops.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 