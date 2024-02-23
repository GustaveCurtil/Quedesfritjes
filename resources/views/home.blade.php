<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="/images/frites.png">
    <script src="js/script.js" defer></script>
    <title>Que des fritjes</title>
</head>
<body>
    <header class="desktop">
        @isset($pages)    
        @foreach ($pages as $page)

        @if ($page->id === $album->id)
        <a href="/{{$page->slug}}" class="current info">{{$page->name}}</a>
        @else
        <a href="{{$page->slug}}" class="info">{{$page->name}}</a>
        @endif
        <div class="description">{{$page->description}}</div>

        @endforeach
        @endisset
    </header>
    <header class="mobile">
        @isset($pages) 
        <a class="info">{{$album->name}}</a>
        <div class="description">{{$album->description}}</div>
        <a  class="dropdown">Albums</a>
        <div class="menu">
            @foreach ($pages as $page)
            @if ($page->id === $album->id)
            <a href="/{{$page->slug}}" class="current">&gt; {{$page->name}} &lt;</a>
            @else
            <a href="/{{$page->slug}}">{{$page->name}}</a>
            @endif
            @endforeach
        </div>
        @endisset
    </header>

    {{-- <header class="desktop">
        @if (isset($albums) && $albums->count() > 0)
            @foreach ($albums as $album)
                @if ($page->id === $album->id)
                    @if ($album->order === 1)
                        <a href="/" class="current">{{$album->title}}</a>
                    @else
                        <a href="/{{$album->slug}}" class="current">{{$album->title}}</a>     
                    @endif 
                @else
                    @if ($album->order === 1)
                        <a href="/">{{$album->title}}</a>
                    @else
                        <a href="/{{$album->slug}}">{{$album->title}}</a>     
                    @endif 
                @endif 
            @endforeach
        @else
        <!-- Handle the case when $albums is null or empty -->
            Que des fritjes
        @endif
    </header> --}}
    <div class="scrollable">
        <main>
            @isset($photos) 
            <div class="column left">
                @foreach ($photos as $photo)
                @if ($photo->column_number === 1)
                <img src="/storage/{{$photo->path}}" title="{{$photo->description}}">
                @endif
                @endforeach
            </div>
            <div class="column middle">
                @foreach ($photos as $photo)
                @if ($photo->column_number === 2)
                <img src="/storage/{{$photo->path}}" title="{{$photo->description}}">
                @endif
                @endforeach
            </div>
            <div class="column right">
                @foreach ($photos as $photo)
                @if ($photo->column_number === 3)
                <img src="/storage/{{$photo->path}}" title="{{$photo->description}}">
                @endif
                @endforeach
            </div>
            @endisset
        </main>
        <footer>
            <p>photos <a href="mailto:oscar.curtil@gmail.com">Oscar</a> 
                <a href="/fritkot" style="text-decoration: none;">🍟</a> 
                site <a href="mailto:Gustave.curtil@tutanota.com">Gustave</a></p>
        </footer>
    </div>
</body>
</html>