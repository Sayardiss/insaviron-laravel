@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Interface de gestion

                    {{-- Liens pour administrer le site --}}
                    <br />
                    <a href="{{ route('news.create') }}" class="btn btn-primary">Ajouter une news</a>
                    <a href="{{ route('sponsors.create') }}" class="btn btn-primary">Ajouter un sponsor</a>
                    <a href="{{ route('results.create') }}" class="btn btn-primary">Ajouter un résultat</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
