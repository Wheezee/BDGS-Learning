<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Residents | BMIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
            position: relative;
            overflow-x: hidden;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            min-height: 100vh;
            background: #f8f9fa;
            color: #333;
            transition: all 0.3s;
            position: fixed;
            left: 0;
            z-index: 1000;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #f1f1f1;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        #sidebar ul p {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a {
            padding: 10px 20px;
            font-size: 1.1em;
            display: block;
            color: #333;
            text-decoration: none;
        }

        #sidebar ul li a:hover {
            background: #e9ecef;
        }

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
            margin-left: 250px;
        }

        #content.active {
            margin-left: 0;
        }

        .logout-btn {
            position: absolute;
            bottom: 20px;
            width: calc(250px - 40px);
            margin: 0 20px;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                margin-left: 0;
            }
            #content.active {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>BMIS</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="/"><i class="bi bi-house-door me-2"></i>Home</a>
                </li>
                <li>
                    <a href="/residents"><i class="bi bi-person me-2"></i>Residents</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-graph-up me-2"></i>Reports</a>
                </li>
                <li>
                    <a href="#"><i class="bi bi-gear me-2"></i>Settings</a>
                </li>
            </ul>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger logout-btn">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </nav>

        <!-- Page Content -->
        <div id="content" class="p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid px-3">
                <h2>Add New Resident</h2>
                <form action="/addresidentsfunc" method="POST" class="mt-4">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="sex" class="form-label">Sex</label>
                            <select class="form-select" id="sex" name="sex" required>
                                <option value="">Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="zone" class="form-label">Zone</label>
                            <select class="form-select" id="zone" name="zone" required>
                                <option value="">Choose...</option>
                                <option value="Zone 1">Zone 1</option>
                                <option value="Zone 2">Zone 2</option>
                                <option value="Zone 3">Zone 3</option>
                                <option value="Zone 4">Zone 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Resident</button>
                </form>
            </div>
        </div>
    </div>
    {!! session('message') !!}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });
    </script>
</body>
</html>
