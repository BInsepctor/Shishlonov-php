@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <hr>

                    <div class="d-flex flex-column gap-3 mt-4">
                        @auth
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">
                                {{ __('Просмотр постов') }}
                            </a>

                            @if (auth()->user()->hasRole('admin'))
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                    {{ __('Просмотр пользователей') }}
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
