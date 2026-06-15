<!DOCTYPE html>
<html>

<head>
    <title>Products List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
            color: #333;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        .status-active {
            color: green;
        }

        .status-inactive {
            color: red;
        }

        .alert {
            padding: 10px;
            background: #e7f3ef;
            color: #2d6a4f;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 13px;
            text-decoration: none;
            border-radius: 3px;
            display: inline-block;
        }

        .product-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .category-badge {
            display: inline-block;
            padding: 2px 8px;
            background-color: #e9ecef;
            color: #495057;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Products</h1>
            {{-- Assuming there will be a create route soon --}}
            <a href="#" class="btn btn-sm btn-success disabled">+ New Product</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center product-image">
                                    <small class="text-muted">No Img</small>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $product->name }}</strong></td>
                        <td>
                            <span class="category-badge">
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </span>
                        </td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td class="{{ $product->is_active ? 'status-active' : 'status-inactive' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </td>
                        <td>
                            <a href="#" class="btn-sm btn-primary">View</a>
                            <a href="#" class="btn-sm btn-warning text-dark">Edit</a>
                            <button type="button" class="btn-sm btn-danger border-0">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
