@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="card">
                    <div class="card-header fw-bold">{{ $component->name }}</div>
                    <div class="card-body">
                        Just a simple component
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
