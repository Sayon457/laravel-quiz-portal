<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite('resources/css/app.css')
</head>

<body>
    <x-navbar name={{$username}}></x-navbar>
    <div class="bg-gray-100 flex flex-col min-h-screen items-center pt-5">
        <div class=" bg-white rounded-2xl p-8 shadow-lg w-full max-w-md">
            @if(!session('quizDetails'))

            <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">Add Quiz</h2>
            <form action="/add-quiz" method="get" class="space-y-4">

                <div>

                    <input type="text" name="quiz" id="category" placeholder="Enter Quiz Name" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">

                </div>
                <div>

                    <select type="text" name="category_id" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                        @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 rounded-2xl shadow-lg p-2 text-white">Add</button>
                </div>
            </form>
            @else
            <span class="text-green-500 font-bold">Quiz : {{session('quizDetails')->name}}</span>
            <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">Add MCQs</h2>
            @endif
        </div>
    </div>
</body>

</html>