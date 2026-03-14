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

    <div class="bg-gray-100 flex flex-col min-h-screen items-center pt-5">
        <h2 class="text-4xl text-center text-gray-800 mb-6 font-semibold">All Current Quiz MCQ's <a href="/add-quiz" class="text-yellow-500 text-sm">Back</a></h2>

        <div class="w-200 mt-5">
            <ul class="border border-gray-200 text-center">
                <li class="p-2 font-bold">
                    <ul class="flex justify-between">
                        <li class="w-30">MCQ Id</li>
                        <li class="w-170">Question</li>
                    </ul>
                </li>
                @foreach($mcqs as $mcq)
                <li class="even:bg-gray-200 p-2 text-center">
                    <ul class="flex justify-between">
                        <li class="w-30">{{$mcq->id}}</li>
                        <li class="w-170">{{$mcq->question}}</li>

                    </ul>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</body>

</html>