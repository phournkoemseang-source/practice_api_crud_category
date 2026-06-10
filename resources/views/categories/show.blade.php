<!DOCTYPE html>
<html>

<head>
    <title>Category Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h1 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 24px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }

        .detail-group {
            margin-bottom: 20px;
        }

        .label {
            font-weight: 600;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .value {
            font-size: 18px;
            color: #222;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .status-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-inactive {
            background-color: #ffebee;
            color: #c62828;
        }

        .actions {
            margin-top: 40px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn-edit {
            background-color: #f39c12;
            color: white;
        }

        .btn-edit:hover {
            background-color: #e67e22;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Category Details</h1>

        <div class="detail-group">
            <span class="label">Name</span>
            <span class="value">{{ $category->name }}</span>
        </div>

        <div class="detail-group">
            <span class="label">Description</span>
            <span class="value">{{ $category->description ?: 'No description provided.' }}</span>
        </div>

        <div class="detail-group">
            <span class="label">Status</span>
            <span class="status-badge {{ $category->is_active ? 'status-active' : 'status-inactive' }}">
                {{ $category->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>

        <div class="actions">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</body>

</html>
