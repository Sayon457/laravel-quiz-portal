<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="bg-gray-100 flex flex-col min-h-screen items-center pt-5">
        <h1 class="text-4xl text-center text-green-800 mb-6 font-semibold">{{$quizName}} </h1>
        <h2 class="text-lg text-center text-green-800 mb-6 font-semibold">This Quiz contains {{$quizCount}} Questions and no limit to attempt this Quiz</h2>
        <h1 class="text-4xl text-center text-green-800 mb-6 font-semibold">Good Luck</h1>
        @if(session('user'))
        <a href="/user-signup" class=" bg-blue-500 rounded-md px-4 py-2 my-5 text-white">
            Start Quiz
        </a>
        @else
        <a href="/user-login-quiz" class=" bg-blue-500 rounded-md px-4 py-2 my-5 text-white">
            Login to Start Quiz
        </a>
        <a href="/user-signup-quiz" class=" bg-blue-500 rounded-md px-4 py-2 my-5 text-white">
            SignUp to Start Quiz
        </a>
        @endif
    </div>
</body>

</html>