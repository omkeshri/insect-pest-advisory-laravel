@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Pest: {{ $pest->name }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('pests.update', $pest) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Pest Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $pest->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="scientific_name" class="form-label">Scientific Name</label>
                            <input type="text" class="form-control @error('scientific_name') is-invalid @enderror" id="scientific_name" name="scientific_name" value="{{ old('scientific_name', $pest->scientific_name) }}">
                            @error('scientific_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $pest->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="damage_symptoms" class="form-label">Damage Symptoms</label>
                            <textarea class="form-control @error('damage_symptoms') is-invalid @enderror" id="damage_symptoms" name="damage_symptoms" rows="3" required>{{ old('damage_symptoms', $pest->damage_symptoms) }}</textarea>
                            @error('damage_symptoms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="life_cycle" class="form-label">Life Cycle</label>
                            <textarea class="form-control @error('life_cycle') is-invalid @enderror" id="life_cycle" name="life_cycle" rows="3" required>{{ old('life_cycle', $pest->life_cycle) }}</textarea>
                            @error('life_cycle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prevention_methods" class="form-label">Prevention Methods</label>
                            <textarea class="form-control @error('prevention_methods') is-invalid @enderror" id="prevention_methods" name="prevention_methods" rows="3" required>{{ old('prevention_methods', $pest->prevention_methods) }}</textarea>
                            @error('prevention_methods')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="control_methods" class="form-label">Control Methods</label>
                            <textarea class="form-control @error('control_methods') is-invalid @enderror" id="control_methods" name="control_methods" rows="3" required>{{ old('control_methods', $pest->control_methods) }}</textarea>
                            @error('control_methods')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Pest Image</label>
                            @if($pest->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $pest->image_path) }}" class="img-thumbnail" alt="{{ $pest->name }}" style="max-height: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Pest</button>
                            <a href="{{ route('pests.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 