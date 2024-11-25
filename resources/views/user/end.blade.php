<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .button {
            background-color: #7C0000;
            border: none;
            color: #fafafa;
        }

        .button:hover {
            background-color: #7c0000b9;
            outline: none;
            box-shadow: 0 0 4px hsla(0, 100%, 24%, 0.5);
            color: #fafafa;
        }

        .button-back {
            background-color: none;
            border: 1px solid #7C0000;
            color: #7C0000;
        }

        .button-back:hover {
            background-color: #7c0000;
            outline: none;
            box-shadow: 0 0 4px hsla(0, 100%, 24%, 0.5);
            color: #fafafa;
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100 bg-light">

    <div class="position-absolute top-0 start-0 m-3">
        <img src="/img/logologin.png" alt="Logo" width="100%">
    </div>

    <div class="text-center">
        <img src="/img/end.png" alt="Image description" class="img-fluid mb-4" style="max-width: 100%;">
        <h1 class="mb-4" style="font-size: 48px;">PSIKOTEST-ILC Selesai!</h1>
        <div style="max-width: 650px;">
            <p class="mb-2" style="text-align: center; font-size: 24px; font-weight: 500; color:rgba(0, 0, 0, 0.5)">
                Terima kasih telah menyelesaikan tes ini, Budi. Jawaban Anda telah berhasil dikirim.</p>
            <p class="mb-4" style="color:rgba(0, 0, 0, 0.5)">Psikotest ini dirancang khusus untuk mengukur beberapa
                Kami menghargai waktu dan usaha Anda dalam menyelesaikan setiap pertanyaan. Hasil tes Anda akan segera
                diproses, dan Anda akan menerima notifikasi hasil atau tindak lanjut berikutnya melalui email atau
                halaman ini.</p>
            <button type="button" class="btn button px-5 py-2" style="margin-top: 20px" onclick="window.location.href='/'">Keluar</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
