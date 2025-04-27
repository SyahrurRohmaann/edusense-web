<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-light px-4">
        <span class="navbar-brand mb-0 h1">User Dashboard</span>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Welcome to Your Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">My Orders</h5>
                        <p class="card-text">You have 5 active orders.</p>
                        <a href="#" class="btn btn-primary btn-sm">View Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Account Info</h5>
                        <p class="card-text">Update your profile and settings.</p>
                        <a href="#" class="btn btn-secondary btn-sm">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3 text-muted">
        &copy; {{ date('Y') }} User Panel
    </footer>
</body>
</html>
