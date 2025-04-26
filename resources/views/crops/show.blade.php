@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $crop->name }}</h2>
                    <div>
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
                <div class="card-body">
                    @if($crop->image_path)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $crop->image_path) }}" class="img-fluid rounded" alt="{{ $crop->name }}" style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="mb-4">
                        <h4>Scientific Name</h4>
                        <p>{{ $crop->scientific_name ?? 'Not specified' }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Description</h4>
                        <p>{{ $crop->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Growing Conditions</h4>
                        <p>{{ $crop->growing_conditions }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Harvesting Period</h4>
                        <p>{{ $crop->harvesting_period }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Associated Pests</h4>
                        @if($crop->pests->count() > 0)
                            <div class="list-group">
                                @foreach($crop->pests as $pest)
                                    <a href="{{ route('pests.show', $pest) }}" class="list-group-item list-group-item-action">
                                        {{ $pest->name }}
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <p>No pests associated with this crop yet.</p>
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('crops.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 