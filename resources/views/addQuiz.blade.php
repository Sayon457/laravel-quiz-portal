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

                    <input type="text" name="quiz" id="category" placeholder="Enter Quiz Name" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none" required>

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
            <form action="/add-mcq" method="post" class="space-y-4">
                @csrf
                <div>

                    <textarea name="question" id="category" placeholder="Enter your quiz question" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none"></textarea>
                    @error('question')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>

                    <input type="text" name="option_a" id="category" placeholder="Enter first option" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">

                    @error('option_a')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>

                    <input type="text" name="option_b" id="category" placeholder="Enter second option" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">

                    @error('option_b')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>

                    <input type="text" name="option_c" id="category" placeholder="Enter third option" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('option_c')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>

                    <input type="text" name="option_d" id="category" placeholder="Enter fourth option" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('option_d')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>

                    <select name="correct_ans" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                        <option value="">Select Right Answer</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    @error('correct_ans')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="flex flex-col items-center gap-4">
                    <button type="submit" name="submit" value="add-more" class="w-full bg-blue-500 rounded-2xl shadow-lg p-2 text-white">Add More</button>
                    <button type="done" name="submit" class="w-full bg-green-600 rounded-2xl shadow-lg p-2 text-white">Add and Submit</button>
                    <a href="/end-quiz" class="w-full bg-red-600 rounded-2xl shadow-lg p-2 text-white text-center">Finish Quiz</a>
                </div>
            </form>
            @endif
        </div>
    </div>
</body>

</html>