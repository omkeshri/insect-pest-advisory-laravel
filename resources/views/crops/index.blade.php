@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Crop Management</h1>
        <a href="{{ route('crops.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Crop
        </a>
    </div>

    <div class="row">
        @foreach($crops as $crop)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($crop->image_path)
                        <img src="{{ asset('storage/' . $crop->image_path) }}" class="card-img-top" alt="{{ $crop->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $crop->name }}</h5>
                        <p class="card-text">{{ Str::limit($crop->description, 100) }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('crops.show', $crop) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('crops.edit', $crop) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('crops.destroy', $crop) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this crop?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 