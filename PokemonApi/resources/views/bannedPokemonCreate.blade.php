@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ban Pokemon') }}</div>

                <div class="card-body">
                    <form action="{{ route('banned.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pokemonName">Name</label>
                            <input type="text" name="pokemonName" id="pokemonName" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Ban</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
