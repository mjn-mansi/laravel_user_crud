<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('./css/style.css')}}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="#">User System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        User List
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/api/users/create">Add</a></li>
                        <li><a class="dropdown-item" href="/api/users">View</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/api/users/images">User Gallery</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5" style="min-height:80vh">
        {{$slot}}
    </div>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-10 m-auto">Copyright@<?=date('Y');?>UserSystems</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>