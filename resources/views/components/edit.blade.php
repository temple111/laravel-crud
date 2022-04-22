@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit component</div>
                    <div class="card-body">
                          <form action="{{ route('components.update', $component->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Component name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $component->name }}">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
