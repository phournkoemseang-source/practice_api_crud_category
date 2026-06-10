<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Categories</title>
</head>

<body>

    <h1>Update Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $category->description }}</textarea><br><br>

        <label for="is_active">Status:</label>
        <select id="is_active" name="is_active">
            <option value="1" {{ $category->is_active ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$category->is_active ? 'selected' : '' }}>Inactive</option>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
