<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Portal</title>
    <title>Admin Dahsboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>
    <div class="flex flex-col min-h-screen items-center bg-gray-100">
        <h1 class="text-4xl font-bold text-green-900 p-5 ">
            Check Your Skills
        </h1>
        <div class="w-full max-w-md">
            <div class="relative">
                <form action="/search-quiz" method="get">
                    <input type="text" name="search" placeholder="Search quiz..." class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow">
                    <button class="absolute right-2 top-3"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="w-200 mt-5">
            <h1 class="text-2xl text-green-900 text-center my-5">Category List</h1>
            <ul class="border border-gray-200 text-center">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-30">S. No</li>
                        <li class="w-70">Name</li>
                        <li class="w-70">Total Quiz</li>
                        <li class="w-30">Action</li>
                    </ul>
                </li>
                @foreach($categories as $key=>$category)
                <li class="even:bg-gray-200 p-2 text-center">
                    <ul class="flex justify-between">
                        <li class="w-30">{{$key+1}}</li>
                        <li class="w-70">{{$category->name}}</li>
                        <li class="w-70">{{$category->quizzes_count}}</li>
                        <li class="w-30 flex gap-2 justify-center">

                            <a href="user-quiz-list/{{$category->id}}/{{$category->name}}"><i class="fa fa-eye text-blue-500"></i></a>
                        </li>
                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>

</html>