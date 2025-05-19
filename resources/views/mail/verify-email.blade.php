<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Your Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('resent'))
                    <div class="alert alert-success">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        Verify Your Email Address
                    </div>

                    <div class="card-body">
                        <p class="mb-3">
                            Before proceeding, please check your email for a verification link.
                            If you did not receive the email, you can request another one.
                        </p>

                        <form method="POST" >
                            @csrf
                            <button type="submit" class="btn btn-warning">Resend Verification Email</button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href=""
                       >
                        Logout
                    </a>

                    <form id="logout-form" action="" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
