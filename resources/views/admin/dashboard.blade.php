<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dahsboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite('resources/css/app.css')
</head>

<body>

    <nav class=" bg-white shadow-md px-4 py-3 flex justify-between items-center">
        <div class="text-2xl text-gray-700 hover:text-blue-500 cursor-pointer"><a href="/">Quiz Portal</a></div>
        <div class="space-x-4">
            <a href="" class=" text-gray-700 hover:text-blue-500 cursor-pointer">Categories</a>
            <a href="" class=" text-gray-700 hover:text-blue-500 cursor-pointer">Quiz</a>
            <a href="" class=" text-gray-700 hover:text-blue-500 cursor-pointer"><i class="fa fa-user"></i> {{$username}}</a>
            <a href="" class=" text-gray-700 hover:text-blue-500 cursor-pointer">Login</a>
        </div>
    </nav>

</body>

</html>