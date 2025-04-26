@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Pest Management</h1>
        <a href="{{ route('pests.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Pest
        </a>
    </div>

    <div class="row">
        @foreach($pests as $pest)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($pest->image_path)
                        <img src="{{ asset('storage/' . $pest->image_path) }}" class="card-img-top" alt="{{ $pest->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $pest->name }}</h5>
                        <p class="card-text">{{ Str::limit($pest->description, 100) }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pests.show', $pest) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('pests.edit', $pest) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pests.destroy', $pest) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this pest?')">
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