<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>@yield('title')</title>
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
       <script>
           function logout(event) {
               event.preventDefault(); // Предотвращаем переход по ссылке
               document.getElementById('logout-form').submit(); // Отправляем форму
           }
       </script>
   </head>
   <body>
       <header>
                <div class="nav-left">
                    <a href="{{ route('books.index') }}">Книги</a>
                </div>
                <div class="nav-right">
                    @guest
                        <a href="{{ route('login') }}">Войти</a>
                    @else
                        <a href="#" onclick="logout(event)">Выйти</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
       </header>

       <main>
           @yield('content')
       </main>
   </body>
   </html>