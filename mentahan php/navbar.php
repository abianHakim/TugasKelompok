<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-14iaX8gFwY/zo9I1zXXr+ZxuGGGixykGxLJkTT1J4zlS0/u5Z93P8UJS5yfO5S/jqPLVZsiqlgQpO9R4C+/L4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="b-example-divider b-example-vr"></div>

    <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary" style="width: 4.5rem;">
        <a href="/" class="d-block p-3 link-body-emphasis text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
            <img src="asset/coba.png" alt="" width="100%">
            <span class="visually-hidden">Icon-only</span>
        </a>
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li class="nav-item">
                <a href="#" class="nav-link active py-3 border-bottom rounded-0" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                    <img src="asset/home.png" alt="" width="70%">
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Dashboard">
                        <use xlink:href="#speedometer2" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Orders">
                        <use xlink:href="#table" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Products" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Products">
                        <use xlink:href="#grid" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Customers" data-bs-toggle="tooltip" data-bs-placement="right">
                    <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers">
                        <use xlink:href="#people-circle" />
                    </svg>
                </a>
            </li>
        </ul>
        <div class="dropdown border-top">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>