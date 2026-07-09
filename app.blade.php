<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistem Informasi Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
    background:#f5f3ff;
}

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#ad18ad;
}

.sidebar h4{
    color:white;
    text-align:center;
    margin-top:20px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px;
}

.sidebar a:hover{
    background:white;
    color:#0d6efd;
}

.content{
    margin-left:250px;
    padding:30px;
}

/* ===== CSS KHUSUS PRINT ===== */
@media print{

    .sidebar{
        display:none !important;
    }

    .content{
        margin-left:0 !important;
        width:100% !important;
        padding:20px !important;
    }

    .no-print{
        display:none !important;
    }

}

</style>
</head>

<body>

<div class="sidebar">

<h4>📚 Perpustakaan SMA Airlangga</h4>

<hr class="text-white">

<a href="/">
<i class="bi bi-house"></i>
Dashboard
</a>

<a href="/buku">
<i class="bi bi-book"></i>
Data Buku
</a>

<a href="/anggota">
<i class="bi bi-people"></i>
Anggota
</a>

<a href="/peminjaman">
<i class="bi bi-journal-arrow-up"></i>
Peminjaman
</a>

<a href="/pengembalian">
<i class="bi bi-arrow-return-left"></i>
Pengembalian
</a>

<a href="/laporan">
<i class="bi bi-file-earmark-bar-graph"></i>
Laporan
</a>

</div>

<div class="content">

@yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>