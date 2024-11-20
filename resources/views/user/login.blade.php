<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
          background-image: url('/img/bglogin.jpg');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
        }
    
        .card {
          background-color: #fafafa;
          border-radius: 20px;
          padding: 50px;
        }

        input.form-control {
      background-color: rgba(222, 222, 222, 0.5);
      border: none;
      color: hsla(0, 0%, 0%, 0.5);
    }

    input.form-control:focus {
      background-color: rgba(222, 222, 222, 0.7);
      outline: none;
      border-color: #7C0000;
      box-shadow: 0 0 4px hsla(0, 100%, 24%, 0.5);
    }

    button.btn-primary {
      background-color: #7C0000;
      border: none;
      color: #fafafa;
      margin-top: 35px;
    }

    button.btn-primary:hover {
      background-color: #7c0000b9; 
      outline: none;
      border-color: #7C0000;
      box-shadow: 0 0 4px hsla(0, 100%, 24%, 0.5);
      color: #fafafa;
    }
      </style>
</head>
<body>
    <body>
        <div class="container vh-100 d-flex justify-content-center align-items-center">
          <div class="card shadow-lg" style="width: 100%; max-width: 535px;">
            <div class="text-center" style="margin-bottom: 35px">
                <img src="/img/logologin.png" alt="Logo" style="max-width: 100%; height: auto;">
              </div>
            <form action="/login" method="POST">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
              <div class="mb-3">
                <label for="no_register" class="form-label">Nomor Registrasi</label>
                <input type="text" class="form-control" id="no_register" name="no_register" placeholder="Masukkan Nomor Registrasi" required>
              </div>
      
              <div class="mb-3">
                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" required>
              </div>
      
              <div class="d-grid" style="justify-content: center;">
                <button type="button" class="btn btn-primary" style="width: 111px; height: auto;" onclick="window.location.href='/user/start';">Masuk</button>
              </div>              
            </form>
      
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script></body>
</html>