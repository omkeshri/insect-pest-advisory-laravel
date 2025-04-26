@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ $pest->name }}</h2>
                    <div>
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
                <div class="card-body">
                    @if($pest->image_path)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $pest->image_path) }}" class="img-fluid rounded" alt="{{ $pest->name }}" style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="mb-4">
                        <h4>Scientific Name</h4>
                        <p>{{ $pest->scientific_name ?? 'Not specified' }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Description</h4>
                        <p>{{ $pest->description }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Damage Symptoms</h4>
                        <p>{{ $pest->damage_symptoms }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Life Cycle</h4>
                        <p>{{ $pest->life_cycle }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Prevention Methods</h4>
                        <p>{{ $pest->prevention_methods }}</p>
                    </div>

                    <div class="mb-4">
                        <h4>Control Methods</h4>
                        <p>{{ $pest->control_methods }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="{{ route('pests.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 