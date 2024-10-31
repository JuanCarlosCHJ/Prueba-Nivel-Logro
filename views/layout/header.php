<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Denuncias</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #3b4b6b;
            min-height: 100vh;
            color: white;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px 15px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .main-content {
            padding: 20px;
        }

        .top-bar {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }

        .btn-nuevo {
            background-color: #007bff;
            color: white;
        }

        .status-pendiente {
            color: #dc3545;
        }

        .status-enproceso {
            color: #ffc107;
        }

        .status-resuelto {
            color: #28a745;
        }

        .action-buttons .btn {
            padding: 2px 8px;
            margin: 0 2px;
        }

        .modal.show {
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-dialog {
            max-width: 600px;
        }

        .form-group label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <div class="text-center mb-4">
                    <h4>PNL</h4>
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link" href="index.php"><i class="fas fa-desktop"></i> Escritorio</a>
                    <a class="nav-link active" href="index.php"><i class="fas fa-exclamation-circle"></i> Denuncias</a>
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> Acerca de</a>
                </nav>
            </div>

            <div class="col-md-10 p-0">
                <div class="top-bar d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-bars"></i>
                        <a href="index.php" class="ml-3"><i class="fas fa-desktop"></i> Escritorio</a>
                        <a href="index.php" class="ml-3"><i class="fas fa-exclamation-circle"></i> Denuncias</a>
                    </div>
                    <div>
                        <span class="mr-3">PNL - Ing. Sistemas</span>
                        <i class="fas fa-bell"></i>
                        <i class="fas fa-cog ml-3"></i>
                        <i class="fas fa-th ml-3"></i>
                    </div>
                </div>
</body>