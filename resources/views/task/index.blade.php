<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        .add-button {
            display: block;
            width: 100px;
            margin: 20px auto;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h1>Tasks</h1>

<a href="{{route('task.create', $project_id)}}" class="add-button">+ Add</a>

<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Description</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $item)
        <tr>
            <td>{{$item->title}}</td>
            <td>
                <form method="POST" action="{{route('task.patch.status', [$project_id, $item->id])}}">
                    @csrf
                    <select id="status" name="status" required>
                        <option value="Backlog" @if($item->status == "Backlog"){{"selected"}}@endif>Backlog</option>
                        <option value="In Progress" @if($item->status == "In Progress"){{"selected"}}@endif>In Progress</option>
                        <option value="Done" @if($item->status == "Done"){{"selected"}}@endif>Done</option>
                    </select>
                    <input type="hidden" name="_method" value="PATCH">
                    <button type="submit">Save</button>
                </form>

            </td>
            <td>{{$item->description}}</td>
            <td>{{$item->start_date}}</td>
            <td>{{$item->end_date}}</td>
        </tr>
    @endforeach

    </tbody>
</table>

</body>
</html>
