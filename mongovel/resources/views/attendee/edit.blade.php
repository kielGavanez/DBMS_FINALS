<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Attendee</h1>
    <form action="{{route('attend.update',[$attendee->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <input type="text" name="name" value="{{$attendee->name}}" required>
            <input type="text" name="event_id" value="{{$attendee->event_id}}" hidden>
            <button type="submit">Save</button>
            {{-- <form action="{{route('events.show',[$attendee->event_id])}}" method="POST">
                <button type="submit">Back</button>
            </form> --}}
        </div>
    </form>
</body>
</html>