<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="text-center mt-10">
    <h1 class="text-3xl">Edit Attendee</h1>
    <form action="{{route('attend.update',[$attendee->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="name" value="{{$attendee->name}}" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <input type="text" name="event_id" value="{{$attendee->event_id}}" hidden>
            <button type="submit" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold">Save</button>
            <form action="{{route('events.show',[$attendee->id])}}" method="POST">
                <button type="submit" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold">Back</button>
            </form>
        </div>
    </form>
    </div>
</body>
</html>