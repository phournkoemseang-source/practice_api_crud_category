<!DOCTYPE html>
<html>
<head>
    <title>Categories List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: sans-serif; margin: 40px; color: #333; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #eee; }
        th { background-color: #f9f9f9; font-weight: bold; }
        .status-active { color: green; }
        .status-inactive { color: red; }
        .alert { padding: 10px; background: #e7f3ef; color: #2d6a4f; margin-bottom: 20px; border-radius: 4px; }
        .btn-sm { padding: 5px 10px; font-size: 13px; text-decoration: none; border-radius: 3px; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success">+ New Category</a>
        </div>
        
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ Str::limit($category->description, 50) ?: '---' }}</td>
                        <td class="{{ $category->is_active ? 'status-active' : 'status-inactive' }}">
                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                        </td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn-sm btn-primary">View</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn-sm btn-warning text-dark">Edit</a>
                            <button type="button" class="btn-sm btn-danger border-0" onclick="prepareDelete({{ $category->id }}, '{{ $category->name }}')">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Modal for Delete Confirmation -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong id="categoryNameText"></strong>?<br>
                    <small class="text-danger">This action cannot be undone.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        const deleteForm = document.getElementById('deleteForm');
        const categoryNameText = document.getElementById('categoryNameText');

        function prepareDelete(id, name) {
            // Set the category name in the modal text
            categoryNameText.innerText = name;
            
            // Set the form action dynamically
            deleteForm.action = "/categories/" + id;
            
            // Show the modal
            deleteModal.show();
        }
    </script>
</body>
</html>
