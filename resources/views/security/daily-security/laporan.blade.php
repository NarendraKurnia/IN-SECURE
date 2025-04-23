@include('layout.head')
@include('layout.header')
<div class="custom-header">
        <div class="nav-links">
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
        </div>
        <div class="right-icons">
            <a href="#"></a>
            <a href="#"></a>
            <a href="https://docs.google.com/spreadsheets/d/1mzwEIvcI9NN0hOejeG8yRUI2dAQzANVqr2yrJKwvt20/edit?usp=drive_link"><i class="bi bi-book-half"></i>Laporan Buku Tamu</a>
            <a href="#"><i class="bi bi-person">Hai (User)</i></a>
            <a class="logout" href="{{ route('security.index') }}"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </div>
    </div>
<div class="container-fluid">
    <h1 class="layanan-online" style="text-align: center; color: #000; margin-top: 60px;">Log Kegiatan Security
    </h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
    <!-- Bootstrap Carousel -->
 <div class="container ">
	<div class="row">
        <div class="container-fluid">
            <div class="container d-flex" style="margin-top: 30px">
                <div class="row col-md-12 menuu-manfaat-layanan">
                    <div class="card card-layanan col-md-6">
                        <a href="{{ route('security/daily-security.index') }}" class="btn btn-link text-decoration-none">
                            <h1>Input</h1>
                        </a>
                    </div>
                    <div class="card card-layanan col-md-6">
                        <a href="{{ route('security/daily-security.laporan') }}" class="btn btn-link text-decoration-none">
                            <h1>Laporan</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</div>
<div class="row">
    <!-- option tampilan -->
    <div class="col-md-3">
        <div class="container my-4">
            <label for="entriesPerPage" class="form-label">10 entries per page</label>
                <select id="entriesPerPage" class="form-select form-select-sm d-inline-block w-auto ms-2">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
        </div>
    </div>
    <!-- end option -->
    <!-- filter tanggal -->
    <div class="col-md-5">
        <div class="container my-4">
            <label for="filterDate" class="form-label me-2">Filter berdasarkan tanggal:</label>
                <input type="date" id="filterDate" class="form-control d-inline-block w-auto">
        </div>
    </div>
    <!-- end filter tanggal -->
    <!-- search -->
    <div class="col-md-4">
        <div class="container my-4">
            <label for="searchBox" class="form-label me-2">Search:</label>
            <input type="search" id="searchBox" class="form-control d-inline-block w-auto">
        </div>
    </div>
    <!-- end search -->
    <!-- table riwayat pesan -->
    <div class="col-md-12">
        <div class="container my-4" style="text-align:center;">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Kode Input</th>
                    <th>Tanggal Input</th>
                </tr>
            </thead>
            <tbody>
                    <tr class="table-row" data-bs-toggle="modal" data-bs-target="#exampleModal" data-kode="DJY1373" data-tanggal="31-12-2024 (11:17)">
                        <td>DJY1373</td>
                        <td>31-12-2024 (11:17)</td>
                    </tr>
                    <tr class="table-row" data-bs-toggle="modal" data-bs-target="#exampleModal" data-kode="DWO2783" data-tanggal="31-12-2024 (10:13)">
                        <td>DWO2783</td>
                        <td>31-12-2024 (10:13)</td>
                    </tr>
                    <tr class="table-row" data-bs-toggle="modal" data-bs-target="#exampleModal" data-kode="DXM0672" data-tanggal="19-06-2024 (21:42)">
                        <td>DXM0672</td>
                        <td>19-06-2024 (21:42)</td>
                    </tr>
                </tbody>
        </table>
        </div>
    </div>
    <!-- end riwayat pesanan -->
    <!-- riwayat pesanan modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color:#000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="GET">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-lines-fill fs-3 me-2"></i> Activity Security
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label mb-3">Nama Security 1</label>
                                <input type="text" class="form-control shadow-none" name="security1" value="Budi Santoso">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Jam Kedatangan</label>
                                <input type="time" class="form-control shadow-none" name="jam_kedatangan1" value="07:00">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label p-0 mb-3">Nama Security 2</label>
                                <input type="text" class="form-control shadow-none" name="security2" value="Doremi">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Jam Kedatangan</label>
                                <input type="time" class="form-control shadow-none" name="jam_kedatangan2" value="06:56">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label class="form-label mb-3">Nama Security 3 (Optional)</label>
                                <input type="text" class="form-control shadow-none" name="security3">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Jam Kedatangan</label>
                                <input type="time" class="form-control shadow-none" name="jam_kedatangan3">
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label p-0 mb-3">Tanggal Shift</label>
                                <input type="date" class="form-control shadow-none" name="tanggal_shift" value="21/02/2025">
                            </div>
                            <div class="col-md-12 p-0 mb-3">
                                <label class="form-label">Foto</label>
                                <input type="file" class="form-control shadow-none" name="foto" id="fotoInput" accept="image/*" onchange="previewFoto()">
                                <br>
                                <img id="fotoPreview" src="" alt="Pratinjau Foto" style="display: none; width: 200px; margin-top: 10px;">
                            </div>

                            <div class="container mt-3">
                                <label class="form-label" style="font-weight: bold;">List Kegiatan</label>
                                <table>
                                    <tr>
                                        <th style="width: 50%;">Kegiatan</th>
                                        <th style="width: 25%;">Sudah</th>
                                        <th style="width: 25%;">Belum</th>
                                    </tr>
                                    <tr>
                                        <td>Mematikan Lampu</td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="lampu" value="sudah" >
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="lampu" value="belum">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Membuka Kunci</td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="kunci" value="sudah">
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="kunci" value="belum">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mengecek Pintu</td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="pintu" value="sudah">
                                        </td>
                                        <td style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="pintu" value="belum">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-12 ps-0 mb-3">
                                <label class="form-label">Uraian Kegiatan</label>
                                <div class="container mt-3">
                                    <table>
                                        <tr>
                                            <th style="width: 20%;">JAM</th>
                                            <th>URAIAN KEGIATAN/KEJADIAN</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="jam-input" name="jam_07" value="07.00" readonly>
                                            </td>
                                            <td>
                                                <textarea class="form-control shadow-none" rows="1" name="uraian_07"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="jam-input" name="jam_08" value="08.00" readonly>
                                            </td>
                                            <td>
                                                <textarea class="form-control shadow-none" rows="1" name="uraian_08"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="text" class="jam-input" name="jam_09" value="09.00" readonly>
                                            </td>
                                            <td>
                                                <textarea class="form-control shadow-none" rows="1" name="uraian_09"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal riwayat -->
<!-- showing page -->
<div class="col-md-12">
        <div class="container my-4">
            <div class="d-flex justify-content-between align-items-center">
            <span>Showing 1 to 10 of 35 entries</span>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">«</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">»</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
</div>
</div>
</div>
</div>

@include('layout.footer')