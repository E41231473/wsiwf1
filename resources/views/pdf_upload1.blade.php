<!DOCTYPE html>
<html>
<head>
    <title>Dropzone PDF Upload in Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css">
</head>
<body>
<div class="container">
    <h3 class="text-center mt-5">Dropzone PDF Upload in Laravel</h3>
    <form action="{{ route('pdf_store1') }}" class="dropzone" id="pdf-upload" method="post" enctype="multipart/form-data">
        @csrf
    </form>
    <button type="button" id="uploadButton" class="btn btn-primary mt-3">Upload</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;

    // Inisialisasi Dropzone
    var myDropzone = new Dropzone("#pdf-upload", {
        autoProcessQueue: false,
        maxFiles: 1,
        acceptedFiles: ".pdf"
    });

    // Proses upload saat tombol diklik
    $('#uploadButton').click(function (e) {
        e.preventDefault();
        myDropzone.processQueue();
    });

    // Notifikasi saat upload sukses
    myDropzone.on("success", function (file, response) {
        alert("File uploaded successfully: " + response.success);
    });
</script>
</body>
</html>
