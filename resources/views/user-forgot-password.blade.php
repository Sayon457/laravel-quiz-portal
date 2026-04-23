<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar></x-user-navbar>

    <div class=" bg-gray-100 flex justify-center items-center min-h-screen ">
        <div class=" bg-white rounded-2xl p-8 shadow-lg w-full max-w-md">
            <h2 class="text-4xl text-center text-gray-800 mb-3 font-semibold">Reset Password</h2>
            <form action="/user-forgot-password" method="post" class="space-y-4">
                @csrf

                <div>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" class="w-full px-4 border border-gray-300 rounded-lg py-2 outline-none">
                    @error('email')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>

                @error('user')
                <div class="text-red-500 text-center">{{$message}}</div>
                @enderror

                <div class="flex justify-center">
                    <button type="submit" class="w-1/2 bg-blue-500 rounded-2xl shadow-lg p-2 cursor-pointer text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>