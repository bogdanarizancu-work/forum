<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/html.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">


    <!-- Scripts -->
    <script>

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
    <div id="app">
        <!-- Start header -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Forum</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
                        <!-- <li><a href="#">Link</a></li> -->
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form> -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                        <a href="#" data-toggle="modal" data-target="#profile" class="nav-profile-thumbnail">
                            <img src="{{ asset('images/default.png') }}" alt="">
                            <span>Bogdan</span>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Start Edit Profile Modal -->
            <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="profileLabel">Imaginea de profil</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Start uploader -->
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                    <div class="upload jumbotron" id="profileUploader">
                                        Adu imaginea aici sau click
                                    </div>
                                </div>
                            </div>
                            <!-- End uploader -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Inchide</button>
                            <button type="button" class="btn btn-primary btn-sm">Salveaza</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Edit Profile Modal -->



        </nav>
        <!-- End header -->

        <!-- Start container -->
        <div class="container">
            <div class="row">
                <!-- Groups panel -->
                <div class="col-lg-2 col-md-3 col-sm-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grupuri
                        </div>
                        <div class="panel-body groups-list">
                            <!-- All groups -->
                            <div class="col12">
                                <a href="{{ url('/') }}" class="active">Toate grupurile</a>
                            </div>

                            @foreach ($groups as $group)
                                @include('components.groups.groupItem', compact('group'))
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Posts panel -->
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <!-- Create post -->
                    <div class="row thread-content">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <textarea name="thread-content" cols="30" rows="8" placeholder="Incepe o conversatie" class="well"></textarea>
                                <button type="submit" class="btn btn-primary pull-right btn-sm">Posteaza</button>
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
                <div class="col-lg-2 col-md-3 col-sm-3">
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
        <!-- End container -->

    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dropzone.js') }}"></script>

    <script>
        $(document).ready(function(){
            var profileDropzone = new Dropzone("div#profileUploader", {
                url: "{{ route('upload-file', ['_token' => csrf_token()]) }}"
            });
        });
    </script>

</body>
</html>
