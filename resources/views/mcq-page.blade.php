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
        <h1 class="text-3xl text-center text-green-800 mb-6 font-semibold">{{$quizName}}</h1>
        <h2 class="text-2xl text-center text-green-800 mb-6 font-semibold">Total No. Of Questions {{session('currentQuiz')['totalMcq']}}</h2>
        <h2 class="text-2xl text-center text-green-800 mb-6 font-semibold">{{session('currentQuiz')['currentMcq']}} of {{session('currentQuiz')['totalMcq']}}</h2>
        <div class="mt-2 p-4 bg-white shadow-2xl rounded-xl w-140 ">
            <h3 class="text-green-900 font-bold text-xl mb-1">{{$mcqData->question}}</h3>
            <form class="space-y-3" action="/submit-next/{{$mcqData->id}}" method="post">
                @csrf
                <label for="option_1" class="border p-3 mt-2 rounded-2xl shadow-2xl flex hover:bg-blue-50 cursor-pointer">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_1">
                    <span class="text-green-900 pl-2">{{$mcqData->option_a}}</span>
                </label>
                <label for="option_2" class="border p-3 mt-2 rounded-2xl shadow-2xl flex hover:bg-blue-50 cursor-pointer">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_2">
                    <span class="text-green-900 pl-2">{{$mcqData->option_b}}</span>
                </label>
                <label for="option_3" class="border p-3 mt-2 rounded-2xl shadow-2xl flex hover:bg-blue-50 cursor-pointer">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_3">
                    <span class="text-green-900 pl-2">{{$mcqData->option_c}}</span>
                </label>
                <label for="option_4" class="border p-3 mt-2 rounded-2xl shadow-2xl flex hover:bg-blue-50 cursor-pointer">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_4">
                    <span class="text-green-900 pl-2">{{$mcqData->option_d}}</span>
                </label>
                <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white cursor-pointer mt-2">Submit Answer and Next</button>
            </form>
        </div>

    </div>
    <x-footer-user></x-footer-user>
</body>

</html>