<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/fritkot.css">
    <script src="js/fritkot.js" defer></script>
    <title>Fritkot Osdosh</title>
</head>
<body>
    @auth
        
    @include("_partials.header")
    <main class="pages">
        <div class="commands">
            <form action="/fritkot/create" method="POST">
                @csrf
                <input type="text" name="name" minlength="1">
                <button>➕</button>
            </form>
        </div>

        <form action="/albumorder" class="savealbums" method="POST">
            @csrf
            <button>✔️</button>
        <div class="page-wrapper">
            @foreach ($albums as $album)
            @if ($album->visible)
            <div class="page" draggable="true">
            @else
            <div class="page hide" draggable="true">
            @endif
                <a href="/fritkot/{{$album->id}}"><h2>{{$album->name}}</h2></a>
                <span>(12)</span> 
                <form style='display:none'></form>
                <form action="/hide/{{$album->id}}/" method="post" id="hideForm{{$album->id}}">
                    @csrf
                    @method('PUT')
                    <button form="hideForm{{$album->id}}">👁️</button>
                </form>
                <form action="/delete-album/{{$album->id}}"  method="post" id="deleteForm{{$album->id}}">
                    @csrf
                    @method('DELETE')
                    <button form="deleteForm{{$album->id}}">🗑️</button>
                </form>
                <input type="hidden" name="album_order[]" value="{{ $album->id }}">
            </div>
            @endforeach
        </div>
        </form>
    </main>

    @else

    <main class="login">
        <form action="/fritkot/login" method="post">
            @csrf
            <input type="password" name="password">
            <button>Manger les frites</button>
        </form>
    </main>

    @endauth
    
</body>
</html>