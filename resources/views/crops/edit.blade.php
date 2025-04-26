@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Crop: {{ $crop->name }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('crops.update', $crop) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Crop Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $crop->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="scientific_name" class="form-label">Scientific Name</label>
                            <input type="text" class="form-control @error('scientific_name') is-invalid @enderror" id="scientific_name" name="scientific_name" value="{{ old('scientific_name', $crop->scientific_name) }}">
                            @error('scientific_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $crop->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="growing_conditions" class="form-label">Growing Conditions</label>
                            <textarea class="form-control @error('growing_conditions') is-invalid @enderror" id="growing_conditions" name="growing_conditions" rows="3" required>{{ old('growing_conditions', $crop->growing_conditions) }}</textarea>
                            @error('growing_conditions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harvesting_period" class="form-label">Harvesting Period</label>
                            <input type="text" class="form-control @error('harvesting_period') is-invalid @enderror" id="harvesting_period" name="harvesting_period" value="{{ old('harvesting_period', $crop->harvesting_period) }}" required>
                            @error('harvesting_period')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Crop Image</label>
                            @if($crop->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $crop->image_path) }}" class="img-thumbnail" alt="Current image" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Leave empty to keep the current image.</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Crop
                            </button>
                            <a href="{{ route('crops.show', $crop) }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 