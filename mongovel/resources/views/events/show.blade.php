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
    <h1 class="text-5xl">{{$event->eventName}}</h1>
    <h3 class="text-2xl">Location: {{$event->location}}</h3>
    <p>{{$event->date}}</p>
    
    <form action="{{route('attend.store')}}" method="POST" class="pt-10">
        @csrf
        <div class="d-flex justify-content-around">
            <input type="text" name="name" placeholder="Attendee Name" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <input type="integer" id="event_id" name="event_id" value="{{$event->id}}" hidden>
            <button type="submit" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold"> Add</button>
            <a href="{{route('events.index')}}" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold">Back</a>
        </div>
    </form>
    <table class="table-auto m-auto border-solid border-2 border-gray-200 mt-10">
        <thead class="border-solid border-2 border-gray-200">
            <tr>
                <th class="border-solid border-2 border-gray-200 w-80 text-center p-2">Event Attendee</th>
                <th class="border-solid border-2 border-gray-200 p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attend as $i)
                <tr>
                    <td class="border-solid border-2 border-gray-200 pt-5 pb-5 text-center p-2 col">{{$i->name}}</td>
                    <td class="border-solid border-2 border-gray-200 p-2">
                    <form action="{{route('attend.destroy',[$i->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('attend.edit',[$i->id])}}" class="bg-blue-400 p-1 text-white rounded hover:bg-blue-600 text-sm font-bolder">Edit</a>
                    <button type="submit" class="bg-red-400 p-1 text-white rounded hover:bg-red-600 text-sm font-bolder">Delete</button>
                    </form>
                    </td>
                </tr>
            @empty
                <td colspan="3">NO DATA</td>
            @endforelse
            
        </tbody>
    </table>
</div>
</body>
</html>