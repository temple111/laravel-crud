@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="w-100">
                <div class="card">
                    <div class="card-header fw-bold">All your components</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($components as $component)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('components.show', $component->id) }}">{{ $component->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div>
                                                    <a href="{{ route('components.edit', $component->id) }}"
                                                        class="btn btn-primary">
                                                        Edit
                                                    </a>
                                                </div>

                                                <div style="margin-left: 6px">
                                                    <form method="POST"
                                                        action="{{ route('components.destroy', $component->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
