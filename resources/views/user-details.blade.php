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
    <div class="flex flex-col min-h-screen items-center bg-gray-100">
        <h1 class="text-4xl font-bold text-green-900 p-5 ">
            User Details
        </h1>

        <div class="w-200 mt-5">
            <ul class="border border-gray-200 text-center">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-50">S. No</li>
                        <li class="w-100">Question</li>
                        <li class="w-50">Status</li>
                    </ul>
                </li>
                @foreach($quizRecord as $key=>$record)
                <li class="even:bg-gray-200 p-2 text-center">
                    <ul class="flex justify-between">
                        <li class="w-50">{{$key+1}}</li>
                        <li class="w-100">{{$record->name}}</li>
                        @if($record->status == 1)
                        <li class="w-50 text-green-500">Completed</li>
                        @else
                        <li class="w-50 text-red-500">Not Completed</li>
                        @endif
                </li>
            </ul>
            </li>
            @endforeach

            </ul>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>

</html>