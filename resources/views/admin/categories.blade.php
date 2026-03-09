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
    <div class="bg-gray-100 flex flex-col min-h-screen items-center pt-5">
        <div class=" bg-white rounded-2xl p-8 shadow-lg w-full max-w-md">
            <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">Add Category</h2>
            <form action="/add-category" method="post" class="space-y-4">
                @csrf
                <div>

                    <input type="text" name="category" id="category" placeholder="Enter Category Name" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('category')
                    <div class="text-red-500">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 rounded-2xl shadow-lg p-2 text-white">Add</button>
                </div>
            </form>
        </div>
        <div class="w-200 mt-5">
            <h1 class="text-2xl text-blue-500">Category List</h1>
            <ul class="border border-gray-200 text-center">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-30">S. No</li>
                        <li class="w-70">Name</li>
                        <li class="w-70">Creator</li>
                        <li class="w-30">Action</li>
                    </ul>
                </li>
                @foreach($categories as $category)
                <li class="even:bg-gray-200 p-2 text-center">
                    <ul class="flex justify-between">
                        <li class="w-30">{{$category->id}}</li>
                        <li class="w-70">{{$category->name}}</li>
                        <li class="w-70">{{$category->creator}}</li>
                        <li class="w-30 text-red-600"><a href="category/delete/{{$category->id}}"><i class="fa fa-trash"></i></a></li>
                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</body>

</html>