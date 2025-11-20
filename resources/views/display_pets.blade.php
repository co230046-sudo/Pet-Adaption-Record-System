<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Adoption Record System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
         .search-btn {
            margin-left: 0.5rem;
        }

        .add-pet-btn {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .table tbody tr,
        .table tbody tr td {
            transition: background-color 0.25s ease, color 0.25s ease;
        }
        .table tbody tr:hover td {
            background-color: #f18c96ff;
            color: #ffffff;
        }
        .table tbody tr {
            transition: all 0.3s ease;
        }
        .table tbody tr:hover {
            color: white;
            cursor: pointer;
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1;
            position: relative;
        }
    </style>
</head>

<body class="bg-light" style="background: url('{{ asset('images/Pet_BG2.jpg') }}') no-repeat center center fixed; background-size: 110% 110%; overflow: hidden;">
    <div class="container py-5" style="height: 100vh;">
        <!-- Main Header -->
        <div class="text-center mb-4 p-4 rounded shadow-sm"
             style="background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(3px); width: 50%; margin: 0 auto;">
            <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                <i class="fa-solid fa-paw fa-2x text-danger"></i>
                <h2 class="fw-bold text-dark mb-0">Pet Adoption Record System</h2>
            </div>
            <p class="text-muted mb-0" style="color: #dc3545 !important;">Manage your pets easily here!</p>
        </div>

        <!-- Pet Records Card -->
        <div class="card shadow-lg border-0" style="border-radius: 12px; height: calc(100% - 150px); display: flex; flex-direction: column;">
            
            <!-- Header -->
            <div class="card-header bg-danger bg-opacity-10 border-0 py-3 text-center">
                <h4 class="mb-0 fw-semibold text-danger">
                    <i class="fa-solid fa-folder-open me-2"></i> Pet Records
                </h4>
            </div>

            <!-- Search + Add Button-->
            <div class="p-3">
               <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                <!-- Search Form -->
                <form method="GET" action="{{ route('pets.index') }}" class="d-flex flex-grow-1" style="max-width: 700px;">
                    <input type="text" class="form-control" name="key" placeholder="Search by name, species, age, or status" value="{{ $search ?? '' }}">
                    <button type="submit" class="btn btn-danger ms-2" style="width: 150px;">
                        <i class="fa-solid fa-search"></i> Search
                    </button>
                </form>

                <!-- Add New Pet Button -->
                <a href="{{ route('pets.create') }}" class="btn btn-danger flex-shrink-0 d-flex justify-content-center align-items-center" style="height: 38px; padding: 0 1rem;">
                    <i class="fa-solid fa-plus me-2"></i> Add New Pet
                </a>
            </div>

            </div>

            <!-- Scrollable Table -->
            <div class="card-body p-0" style="flex: 1 1 auto; overflow-y: auto; overflow-x:hidden">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-danger text-center sticky-top" style="background-color: #f8d7da;">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Species</th>
                            <th>Age</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                            <th>Created At</th>
                            <th>Modified At</th>
                        </tr>
                    </thead>
                    <!--Displaying table data from "pets" table-->
                    <tbody class="text-center">
                        @forelse($pets as $pet)
                        <tr>
                            <td>{{ $pet->id }}</td>
                            <td class="fw-medium text-capitalize">{{ $pet->name }}</td>
                            <td>{{ $pet->species }}</td>
                            <td>{{ $pet->age }}</td>
                            <td>
                                <span class="badge bg-{{ $pet->status == 'Available' ? 'success' : 'secondary' }}">
                                    {{ $pet->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('pets.destroy', $pet->id) }}" onsubmit="return confirm('Are you sure you want to delete this pet?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                            <td>{{ $pet->created_at ? $pet->created_at->format('M j, Y H:i') : '-' }}</td>
                            <td>{{ $pet->updated_at ? $pet->updated_at->format('M j, Y H:i') : '-' }}</td>
                        </tr>
                        <!--If Table empty, show this-->
                        @empty
                        <tr>
                            <td colspan="9" class="text-muted py-4" style="color: #dc3545 !important;">
                                No pets found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
