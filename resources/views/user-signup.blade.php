<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User SignUp</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class=" bg-gray-100 flex justify-center items-center min-h-screen ">
        <div class=" bg-white rounded-2xl p-8 shadow-lg w-full max-w-md">
            <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">User SignUp</h2>
            <form action="/user-signup" method="post" class="space-y-4">
                @csrf
                <div>

                    <label for="name" class=" font-semibold text-gray-600 mb-1">User Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter User Name" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('name')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>

                    <label for="email" class=" font-semibold text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter User Email" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('email')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="user-password" class=" font-semibold text-gray-600 mb-1">Password</label>
                    <input type="password" name="password" id="user-password" placeholder="Enter User Password" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('password')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class=" font-semibold text-gray-600 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter User Password" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">

                </div>
                @error('user')
                <div class="text-red-500 text-center">{{$message}}</div>
                @enderror

                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 rounded-2xl shadow-lg p-2 cursor-pointer text-white">SignUp</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>