<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$user->name}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12 my-3 pt-3 shadow">
            <!-- Accede de esta gracias a la configuracion del Modelo User -->
            <img src="{{ $user->image->url }}" alt="" class="float-left rounded-circle mr-2">
            <h1>{{$user->name}}</h1>
            <h3>{{$user->email}}</h3>
            <!-- Como desde el modelo esta configurada la relacion de profile, se puede acceder de esa forma -->
            <p><strong>Instagram:</strong> {{$user->profile->instagram}}</p><br>
            <p><strong>github:</strong> {{$user->profile->github}}</p><br>
            <p><strong>Web:</strong> {{$user->profile->web}}</p>

            <!-- Accede desde el modelo , gracias a la funcion atraves de.. -->
            <p><strong>Pais: </strong> {{$user->location->country}}</p>
            <p>
                <string>Nivel:</string>
                @if($user->level)

                    <a href="#">{{$user->level->name}}</a>
                @else
                    ---
                @endif
            </p>

            <hr>

            <p>
                <strong>Grupos:</strong>
                <!-- Forelse  => permite validar si no hay iteracion, retorna lo que contenga el metodo empty -->
                @forelse($user->groups as $group)
                    <span class="badge badge-primary">{{$group->name}}</span>

                @empty
                    <em>No pertenece a algun grupo</em>

                @endforelse
            </p>

            <hr>

            <h3>Posts</h3>

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{$post->image->url}}" alt="" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">
                                        {{$post->name}}
                                    </h5>
                                    <h6 class="card-subtitle text-muted">
                                        {{$post->category->name}} |
                                        <!-- comments_count se llama la funcion withCount('funcion del metodo a llamar')-->
                                        {{$post->comments_count}}

                                    <!-- Valida si el segundo parametro es mas de 1, y le añade una S al string al final -->
                                        {{Str::plural('comentario', $post->comments_count)}}
                                    </h6>

                                    <p class="card-text small">
                                        @foreach($post->tags as $tag)
                                            <span class="badge-dark">#{{$tag->name}}</span>
                                        @endforeach
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <hr>

            <h3>Videos</h3>

            <div class="row">
                @foreach($videos as $video)
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{$video->image->url}}" alt="" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title">
                                        {{$video->name}}
                                    </h5>
                                    <h6 class="card-subtitle text-muted">
                                        {{$video->category->name}} |
                                        <!-- comments_count se llama la funcion withCount('funcion del metodo a llamar')-->
                                        {{$video->comments_count}}

                                    <!-- Valida si el segundo parametro es mas de 1, y le añade una S al string al final -->
                                        {{Str::plural('comentario', $video->comments_count)}}
                                    </h6>

                                    <p class="card-text small">
                                        @foreach($video->tags as $video)
                                            <span class="badge-dark">#{{$video->name}}</span>
                                        @endforeach
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

</body>
</html>
