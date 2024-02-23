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

        @foreach ($albums as $album)
        <a href="" class="current info">{{$album->name}}</a>
        <div class="description">{{$album->description}}</div>
        @endforeach



        <a href="" class="current info">pagina 1</a>
        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus sapiente, fuga, aliquid vero ipsam necessitatibus quisquam repellendus accusantium rerum quos magnam veniam enim. Aliquid saepe debitis accusantium cum facilis asperiores!</div>
        <a href="" class="info">pagina 2</a>
        <div class="description">os magnam veniam enim. Aliquid saepe debitis accusantium cum facilis asperiores!</div>
        <a href="" class="info">pagina 3</a>
        <div class="description">DDolor sit amet consectetur, adipisicing elit. Accusamus sapiente, fuga, aliquid vero ipsam necessitatibus quisquam repellendus accusantium rerum quos magnam veniam enim. Aliquid saepe debitis accusantium cum facilis asperiores!</div>
        <a href="" class="info">pagina 4</a>
        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus sap</div>
    </header>
    <header class="mobile">
        <a class="info">Album cool</a>
        <div class="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus sapiente, fuga, aliquid vero ipsam necessitatibus quisquam repellendus accusantium rerum quos magnam veniam enim. Aliquid saepe debitis accusantium cum facilis asperiores!</div>
        <a  class="dropdown">Albums</a>
        <div class="menu">
            <a href="/yo">pagina 2</a>
            <a href="/yo" class="current">&gt; Album cool &lt;</a>
            <a href="/yo">Paris seveille</a>
            <a href="/yo">Alz frero</a>
            <a href="/yo">Quel klet</a>
        </div>
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
            <div class="column left">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 1.jpg" title="YO!">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 2.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 3.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 4.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 5.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 6.jpg" alt="">
            </div>
            <div class="column middle">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 7.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 8.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 9.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 10.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 11.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 12.jpg" alt="">
            </div>
            <div class="column right">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 13.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 14.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 15.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 16.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 17.jpg" alt="">
                <img src="\fotos\PHOTO-2024-01-11-08-45-24 18.jpg" alt="">
            </div>
        </main>
        <footer>
            <p>photos <a href="mailto:oscar.curtil@gmail.com">Oscar</a> 
                <a href="/fritkot" style="text-decoration: none;">🍟</a> 
                site <a href="mailto:Gustave.curtil@tutanota.com">Gustave</a></p>
        </footer>
    </div>
</body>
</html>