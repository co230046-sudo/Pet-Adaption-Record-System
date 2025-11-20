<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: url('{{ asset('images/Pet_BG1.jpg') }}') no-repeat center center fixed;
            background-size: 110% 110%;
            display: flex;
            justify-content: center; /* horizontal centering */
            align-items: center;     /* vertical centering */
            min-height: 100vh;       /* full viewport height */
        }

        .card {
            border-radius: 12px;
        }
        .form-label {
            font-weight: 500;
        }
        .paw-icon {
            font-size: 1.8rem;
            color: #dc3545;
        }
        
         /* Custom button styles */
        .btn-back {
            padding: 0.5rem 1.5rem;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn-back:hover {
            background-color: #5a6268;
            color: #fff;
        }

        .btn-add-pet {
            padding: 0.5rem 1.5rem;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 6px;
        }
        .btn-add-pet:hover {
            background-color: #c82333;
            color: #fff;
        }

        /* Container for aligning the two buttons */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <!-- Header -->
                        <h3 class="text-center mb-4 text-danger">
                            <i class="fa-solid fa-paw paw-icon"></i> Edit Pet
                        </h3>

                        <!-- Edit Form -->
                        <form method="POST" action="{{ route('pets.update', $pet->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Pet Name -->
                            <div class="mb-3">
                                <label class="form-label">Pet Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $pet->name) }}" placeholder="Enter pet name" required
                                >
                            </div>

                            <!-- Species -->
                            <div class="mb-3">
                                <label class="form-label">Type of Species</label>
                                <input type="text" name="species" class="form-control" value="{{ old('species', $pet->species) }}" placeholder="Enter species" required>
                            </div>

                            <!-- Age -->
                            <div class="mb-3">
                                <label class="form-label">Pet Age</label>
                                <input type="number" name="age" class="form-control" value="{{ old('age', $pet->age) }}" placeholder="Enter age"    required
                                >
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="">-- None --</option>
                                    <option value="Available" {{ old('status', $pet->status) == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Adopted" {{ old('status', $pet->status) == 'Adopted' ? 'selected' : '' }}>Adopted</option>
                                </select>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('pets.index') }}" class="btn btn-secondary px-4">← Back</a>
                                <button type="submit" class="btn btn-danger px-4"><i class="fa-solid fa-paw"></i> Update Pet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</body>
</html>
