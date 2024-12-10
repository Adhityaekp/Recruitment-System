<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .accordion-button {
            transition: background-color 0.3s, color 0.3s;
        }

        .accordion-button:not(.collapsed) {
            background-color: #801114;
            color: #fafafa;
        }
        
        .list-group-item a:hover{
            color: #C18134;
        }
    </style>
</head>

<body>
    <div class="d-flex" style="min-height: 100vh;">
        <x-sidebar />

        <div class="flex-grow-1 main-content">
            <x-navbar userName="Admin" />

            <div class="container my-4 table-container">
                <h1>Question</h1>

                <div class="accordion mt-4" id="questionAccordion">
                    <div class="accordion-item position-relative">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Sub Test 1
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#questionAccordion">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a data-bs-toggle="collapse" href="#soal1Detail" role="button"
                                            aria-expanded="false" aria-controls="soal1Detail">
                                            Soal 1
                                        </a>
                                        <div class="collapse mt-2" id="soal1Detail">
                                            <form>
                                                <img src="/img/Soal.png" alt="Soal 1"
                                                    style="width: 100%; max-width: 300px;">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="soal1"
                                                        id="soal1A" value="A">
                                                    <label class="form-check-label" for="soal1A">
                                                        <img src="/img/A.png" alt="Jawaban A" style="width: 50px;">
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="soal1"
                                                        id="soal1B" value="B">
                                                    <label class="form-check-label" for="soal1B">
                                                        <img src="/img/B.png" alt="Jawaban B" style="width: 50px;">
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="soal1"
                                                        id="soal1C" value="C">
                                                    <label class="form-check-label" for="soal1C">
                                                        <img src="/img/C.png" alt="Jawaban C" style="width: 50px;">
                                                    </label>
                                                </div>
                                            </form>

                                            <div class="mt-3">
                                                <strong>Kunci Jawaban: </strong> A
                                            </div>

                                            <button class="btn btn-masuk mt-2" data-bs-toggle="modal"
                                                data-bs-target="#editSoalModal1">Edit Soal</button>
                                        </div>
                                    </li>

                                    <div class="modal fade" id="editSoalModal1" tabindex="-1"
                                        aria-labelledby="editSoalModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editSoalModalLabel1">Edit Soal 1</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <label for="editSoal1">Soal:</label>
                                                    <input type="file" id="editSoal1" class="form-control mb-3">

                                                    <label for="editJawaban1">Jawaban A:</label>
                                                    <input type="file" id="editJawaban1" class="form-control mb-3">

                                                    <label for="editJawaban2">Jawaban B:</label>
                                                    <input type="file" id="editJawaban2" class="form-control mb-3">

                                                    <label for="editJawaban3">Jawaban C:</label>
                                                    <input type="file" id="editJawaban3" class="form-control mb-3">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn button-back"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-masuk"
                                                        onclick="saveEdit(1)">Simpan Perubahan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="card-number position-absolute top-0 end-0 text-stroke"
                            style="font-size: 150px; opacity: 0.1;">1</div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center py-3 d-flex justify-content-between align-items-center">
                <p class="mb-0">&copy; 2024 Your Company. All rights reserved.</p>
                <p class="mb-0">Supported By ILC</p>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .text-stroke {
            -webkit-text-stroke: 1 px currentColor;
            color: transparent;
        }
    </style>
</body>

</html>
