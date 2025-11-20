<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            background: url('{{ asset('images/Pet_BG1.jpg') }}') no-repeat center center fixed;
            background-size: 110% 110%;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
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
                        <h3 class="text-center mb-4 text-danger">
                            <i class="fa-solid fa-paw paw-icon"></i> Add New Pet
                        </h3>   
                        <!--Edit Container/Form-->
                        <form method="POST" action="{{ route('pets.store') }}">
                            @csrf
                            
                            <!-- Pet Name -->
                            <div class="mb-3">
                                <label class="form-label">Pet Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter pet name" required>
                            </div>

                            <!-- Pet Species -->
                            <div class="mb-3">
                                <label class="form-label">Type of Species</label>
                                <input type="text" class="form-control" name="species" placeholder="Enter species" required>
                            </div>

                            <!-- Pet Age -->
                            <div class="mb-3">
                                <label class="form-label">Pet Age</label>
                                <input type="number" class="form-control" name="age" placeholder="Enter age" required>
                            </div>

                            <!-- Pet Status -->
                            <div class="mb-4">
                                <label class="form-label">Pet Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="">-- None --</option>
                                    <option value="Available">Available</option>
                                    <option value="Adopted">Adopted</option>
                                </select>
                            </div>

                            <!-- Actions -->
                            <div class="action-buttons">
                                <a href="{{ route('pets.index') }}" class="btn-back">← Back</a>
                                <button type="submit" class="btn-add-pet">
                                    <i class="fa-solid fa-paw"></i> Add Pet
                                </button>
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