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
    <x-navbar name={{$username}}></x-navbar>
    @if(session('category'))
    <div class="bg-green-800 text-white pl-5">{{session('category')}}</div>
    @endif
    <div class="bg-gray-100 flex justify-center pt-10">
        <div class=" bg-white rounded-2xl p-8 shadow-lg w-full max-w-md">
            <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">Add Category</h2>
            <form action="/add-category" method="post" class="space-y-4">
                @csrf
                <div>

                    <input type="text" name="category" id="category" placeholder="Enter Category Name" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">

                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 rounded-2xl shadow-lg p-2 text-white">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>