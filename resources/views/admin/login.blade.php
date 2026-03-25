<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>

<body class=" bg-gray-100 flex justify-center items-center min-h-screen ">
    <div class=" bg-white rounded-2xl p-8 shadow-lg w-full max-w-md">
        <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">Admin Login</h2>
        <form action="/admin-login" method="post" class="space-y-4">
            @csrf
            <div>

                <label for="admin-name" class=" font-semibold text-gray-600 mb-1">Admin name</label>
                <input type="text" name="username" id="admin-name" placeholder="Enter Admin Name" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                @error('username')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="admin-password" class=" font-semibold text-gray-600 mb-1">Password</label>
                <input type="password" name="password" id="admin-password" placeholder="Enter Admin Password" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                @error('password')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            @error('user')
            <div class="text-red-500 text-center">{{$message}}</div>
            @enderror

            <div class="flex justify-center">
                <button type="submit" class="w-1/2 bg-blue-500 rounded-2xl shadow-lg p-2 text-white">Login</button>
            </div>
        </form>
    </div>
</body>

</html>