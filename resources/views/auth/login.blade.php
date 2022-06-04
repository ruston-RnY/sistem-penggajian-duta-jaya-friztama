<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('backend/assets/bootstrap-4.5.3-dist/css/bootstrap.min.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
        }

        .login-wrap{
            background: linear-gradient(rgb(35 48 112 / 70%), rgb(12 12 10 / 70%)), url(../backend/images/building2.jpg) no-repeat;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            height: 100vh;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            background: linear-gradient(rgb(46 46 46 / 0%), rgb(4 4 4 / 98%)), url(backend/images/img-1.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .btn-log{
            background: #1e22a1;
            border-radius: 5px;
            color: #fff;
        }

        .btn-log:hover{
            background: #191c6b;
            color: #fff;
        }

        label{
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="login-wrap">
        <section class="login m-auto">
            <div class="container" id="container">
                <div class="form-container">
                    <form method="post" action="{{ route('login') }}" class="mt-3">
                        <h3 class="text-center mb-4">Selamat Datang!</h3>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
    
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror                                  
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
    
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-log btn-block mt-4">Submit</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-right">
                            <div class="mt-auto pb-5">
                                <h4>Sistem Penggajian</h4>
                                <span>&copy; PT. Duta Jaya Friztama - 2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>