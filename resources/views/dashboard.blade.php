@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Crops</h2>
            <div class="row">
                @foreach($crops as $crop)
                    <div class="col-md-6 mb-4">
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
                                    <span class="badge bg-primary">
                                        {{ $crop->pests->count() }} Pests
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="col-md-6">
            <h2>Pests</h2>
            <div class="row">
                @foreach($pests as $pest)
                    <div class="col-md-6 mb-4">
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
                                    <span class="badge bg-primary">
                                        {{ $pest->crops->count() }} Crops
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection 