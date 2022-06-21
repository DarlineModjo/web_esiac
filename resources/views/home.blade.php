@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} Vous êtes connecté!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <H1 class="display-4">Bienvenue sur votre application de tâches</H1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
