<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projects</title>
</head>
<body>
    @foreach ($projects as $project)
        <ul>
            <li>{{ $project->title }}</li>
            <li>{{ $project->description }}</li>
        </ul>
    @endforeach
</body>
</html>
