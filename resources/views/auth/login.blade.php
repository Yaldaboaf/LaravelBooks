<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Вход</title>
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   </head>
   <body>
    <div class='login-form'>
       <h2>Вход</h2>

       <form method="POST" action="{{ route('login') }}">
           @csrf
           <div>
               <label for="email">Email</label>
               <input type="email" name="email" id="email" required>
           </div>
           <div>
               <label for="password">Пароль</label>
               <input type="password" name="password" id="password" required>
           </div>
           <button type="submit">Войти</button>
       </form>
    </div>
   </body>
   </html>