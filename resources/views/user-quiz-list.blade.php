<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class="bg-gray-100 flex flex-col min-h-screen items-center pt-5">
        <h2 class="text-4xl text-center text-green-800 mb-6 font-semibold">Category Name : {{$category}} </h2>

        <div class="w-200 mt-5">
            <ul class="border border-gray-200 text-center">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-30">Quiz Id</li>
                        <li class="w-110">Name</li>
                        <li class="w-30">Mcq Count</li>
                        <li class="w-30">Action</li>
                    </ul>
                </li>
                @foreach($quizData as $item)
                <li class="even:bg-gray-200 p-2 text-center">
                    <ul class="flex justify-between">
                        <li class="w-30">{{$item->id}}</li>
                        <li class="w-110">{{$item->name}}</li>
                        <li class="w-30">{{$item->mcq_count}}</li>
                        <li class="w-30">

                            <a href="/start-quiz/{{$item->id}}/{{$item->name}}" class="text-green-500 font-bold">Start</a>
                        </li>

                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</body>

</html>