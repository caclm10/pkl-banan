<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,regular,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="login-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a href="/index.html">
                            <img src="/images/logo.png" alt="logo" class="logo">
                        </a>
                    </div>

                    <?php if (hasValidationError('credentials')) : ?>
                        <div class="alert alert-danger mt-4 mb-0" role="alert">
                            <?= getValidationError('credentials') ?>
                        </div>
                    <?php endif ?>

                    <form action="/login" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text" class="form-control <?= getValidationErrorClass('email') ?>" id="email" name="email" placeholder="name@example.com" value="<?= old('email') ?>">
                            <?= getValidationErrorView('email') ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?= getValidationErrorClass('password') ?>" id="password" name="password" placeholder="Password">
                            <?= getValidationErrorView('password') ?>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <!-- <a href="#">Lupa password?</a> -->

                            <button class="btn btn-primary">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>