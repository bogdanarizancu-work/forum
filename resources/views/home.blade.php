@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!-- Groups panel -->
        <div class="col-md-2 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Grupuri
                </div>
                <div class="panel-body groups-list">
                    <!-- All groups -->
                    <div class="col12">
                        <a href="{{ url('/') }}" class="active">Toate grupurile</a>
                    </div>

                    <!-- Individual groups -->
                    @foreach ($groups as $group)
                        @include('components.groups.groupItem', compact('group'))
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Posts panel -->
        <div class="col-md-8 col-sm-6">
            <!-- Create post -->
            <div class="row thread-content">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <textarea name="thread-content" cols="30" rows="10" placeholder="Incepe o conversatie" class="well"></textarea>
                        <button type="submit" class="btn btn-primary pull-right">Posteaza</button>
                    </div>
                </div>
            </div>

            <!-- Lists posts -->
            <div class="row list-posts">
                <!-- Individual groups -->
                <ul class="list-group">
                    @foreach ($posts as $post)
                        @include('components.posts.postItem', compact('post'))
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- Users Panel  -->
        <div class="col-md-2 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Utilizatori
                </div>
                <div class="panel-body groups-list">
                    <!-- Individual user -->
                    @foreach ($users as $user)
                        @include('components.users.userItem', compact('user'))
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
