@extends('layouts.app')

@section('content')
    <div class="col-md-8 pull-center">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">Nume</div>
                    <div class="col-md-8">{{ $user->name }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Adresa de email</div>
                    <div class="col-md-8">{{ $user->email }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Fotografie de profil</div>
                    <div class="col-md-8"><img src="xx" alt=""></div>
                </div>
            </div>
        </div>
    </div>
@endsection
