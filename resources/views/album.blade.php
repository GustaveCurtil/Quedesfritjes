<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/fritkot.css">
    <script src="../js/fritkot.js" defer></script>
    <title>Fritkot Osdosh</title>
</head>
<body>
    @auth
        
    @include("_partials.header")
    <main class="photos">
        <div class="right">
            <div class="commands">
                <form action="/fritkot/{{$album->id}}/update-album" method="POST" class="albumeditor">
                    @csrf
                    <input type="text" name="name" minlength="1" value="{{$album->name}}">
                    <textarea name="description" placeholder="description">{{$album->description}}</textarea>
                    @method('PUT')
                    <button>✏️</button>
                </form>
            </div>
            <form action="/photoorder/{{$album->id}}" method="post" class="savealbums">
                @csrf
                <button>✔️</button>
                <div class="columnwrapper">
                    @for ($column = 1; $column <= 3; $column++)
                        <div class="column{{ $column }}" id="{{ $column }}">
                            @foreach ($photos->where('column_number', $column) as $photo)
                            <div class="foto">
                                <img src="/storage/{{ $photo->path }}" alt="{{ $photo->description }}" draggable="true">
                                <input type="hidden" name="column{{ $column }}_row[]" value="{{ $photo->id }}">
                            </div>
                            @endforeach
                        </div>
                    @endfor
                </div>
            </form>
        </div>
        <div class="left">
            <div class="commands">
                <form action="/fritkot/{{$album->id}}/add-photos" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="upload[]" multiple>
                    <button>📷</button>
                </form>
            </div>
            <div class="editor">
                @foreach ($photos as $photo)
                <div class="photoeditor">
                <img src="/storage/{{$photo->path}}" alt="">     
                <form action="/edit/{{$photo->id}}" method="post">
                    @csrf
                <textarea name='description'>{{$photo->description}}</textarea>
                @method('PUT')
                <button>✏️</button></form>
                <form action="/delete-photo/{{$photo->id}}" method="post" class="delete">
                    @csrf
                    @method('DELETE')
                <button>🗑️</button></form>
                </div>
                @endforeach
            </div>
        </div>
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