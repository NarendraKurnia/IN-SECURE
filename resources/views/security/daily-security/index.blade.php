@include('layout.head')
@include('layout.header')
<!-- header -->
<div class="custom-header">
        <div class="nav-links">
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
        </div>
        <div class="right-icons">
            <a href="#"></a>
            <a href="https://docs.google.com/spreadsheets/d/1mzwEIvcI9NN0hOejeG8yRUI2dAQzANVqr2yrJKwvt20/edit?usp=drive_link"><i class="bi bi-book-half"></i>Laporan Buku Tamu</a>
            <a href="#"><i class="bi bi-person">Hai (User)</i></a>
            <a class="logout" href="{{ route('security.index') }}"><i class="bi bi-box-arrow-right"></i>Logout</a>
        </div>
    </div>
<!-- menu -->
<div class="container-fluid">
    <h1 class="layanan-online" style="text-align: center; color: #000; margin-top: 60px;">Log Kegiatan Security
    </h1>
    <hr style="border: none; height: 5px; background-color: #fbfb18; width: 20%; margin: auto; box-shadow: 0px 2px 5px rgba(0,0,0,0.2);">
    <!-- Bootstrap Carousel -->
 <div class="container mt-4">
	<div class="row">
        <div class="container-fluid">
            <div class="container d-flex" style="margin-top: 30px">
                <div class="row col-md-12 menuu-manfaat-layanan">
                    <div class="card card-layanan col-md-6">
                        <a href="#Input" class="btn btn-link text-decoration-none">
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
</div>
<div class="container-fluid" id="Input">
    <div class="row">
        <div class="container-fluid">
            <div class="container d-flex">
                <div class="container">
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Masuk Shift Pagi   
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#shiftmasukModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Selesai Shift Pagi   
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#shiftselesaiModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Masuk Shift Siang  
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#shiftmasukModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Selesai Shift Siang   
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#shiftselesaiModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Masuk Shift Malam   
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#shiftmasukModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Selesai Shift Malam   
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#shiftselesaiModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                    <div class="row col-md-12 mb-4 shift-pagi"> 
                    Pemeriksaan APAR   
                    <button type="button" class="btn shadow-none"  data-bs-toggle="modal" data-bs-target="#aparModal"> <i class="bi bi-plus-circle"></i>
                    </button> 
                    </div>
                </div>  
            </div>
        </div>
    </div>    
</div>
<!-- Shift masuk Modal -->
<div class="modal fade" id="shiftmasukModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form>
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-2"></i> Activity Security
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
            Note: Isi Form Berikut sesuai dengan jam Kedatangan
          </span>
          <div class="container-fluid">
            <div class="row">
            <div class="col-md-12 ps-0 mb-3">
                <label class="form-label mb-3">Catatan Dari Shift sebelumnya:</label>
                <input type="text" class="form-control shadow-none" value="Titupan surat untuk manajemen">
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label mb-3">Nama Security 1</label>
                <input type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Kehadiran</label>
                <input type="time" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label p-0 mb-3">Nama Security 2</label>
                <input type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Kehadiran</label>
                <input type="time" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label mb-3">Nama Security 3 (Optional)</label>
                <input type="text" class="form-control shadow-none">
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Kehadiran</label>
                <input type="time" class="form-control shadow-none">
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label p-0 mb-3">Tanggal Shift</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
            </div>
          </div>
          <div class="my-1">
            <button type="submit" class="btn btn-primary shadow-none">Submit</button>
            <button type="reset" class="btn btn-danger shadow-none">Reset</button>
          </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- Shift Selesai Modal -->
<div class="modal fade" id="shiftselesaiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form>
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-2"></i> Activity Security
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
            Note: Isi Form Berikut sesuai dengan kegiatan yang dilakukan dan jam selesai shift
          </span>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label mb-3">Nama Security 1</label>
                <input type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Selesai</label>
                <input type="time" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label p-0 mb-3">Nama Security 2</label>
                <input type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Selesai</label>
                <input type="time" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label mb-3">Nama Security 3 (Optional)</label>
                <input type="text" class="form-control shadow-none">
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Selesai</label>
                <input type="time" class="form-control shadow-none">
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label p-0 mb-3">Tanggal Shift</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control shadow-none" required>
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
                <input class="form-check-input" type="radio" name="lampu" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="lampu" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Membuka Kunci</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kunci" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kunci" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Mengecek Pintu</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pintu" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pintu" value="belum" required>
            </td>
        </tr>
    </table>
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
                                <input type="text" class="jam-input" value="07.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="08.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="09.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="10.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="11.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="12.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="13.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="jam-input" value="14.00" readonly>
                            </td>
                            <td>
                                <textarea class="form-control shadow-none" rows="1"></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="col-md-12 ps-0 mb-3">
                <label class="form-label mb-3">Catatan Untuk Shift setelahnya:</label>
                <input type="text" class="form-control shadow-none" required>
              </div>
                </div>
              </div>
            </div>
          </div>
          <div class="my-1">
            <button type="submit" class="btn btn-primary shadow-none">Submit</button>
            <button type="reset" class="btn btn-danger shadow-none">Reset</button>
          </div>
            <!-- <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" class="form-control shadow-none">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control shadow-none">
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <button type="submit" class="btn btn-success shadow-none">Login</button>
              <a href="javascript: void(0)" class="text-primary text-decoration-none"> Forgot password</a>
            </div> -->
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- Pemeriksaan APAR -->
<div class="modal fade" id="aparModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form>
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-lines-fill fs-3 me-2"></i> Checking APAR
          </h5>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
            Note: Isi Form Berikut sesuai dengan data pemeriksaan APAR yang telah dilakukan 
          </span>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 ps-0 mb-3">
                <label class="form-label mb-3">Nama Petugas</label>
                <input type="text" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label p-0 mb-3">Jam Pemeriksaan</label>
                <input type="time" class="form-control shadow-none" required>
              </div>
              <div class="col-md-12 p-0 mb-3">
                <label class="form-label p-0 mb-3">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (1)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure1" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure1" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin1" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin1" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang1" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang1" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang1" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang1" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle1" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle1" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi1" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi1" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 2 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (2)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure2" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure2" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin2" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin2" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang2" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang2" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang2" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang2" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle2" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle2" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi2" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi2" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 3 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (3)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure3" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure3" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin3" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin3" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang3" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang3" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang3" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang3" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle3" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle3" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi3" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi3" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 4 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (4)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure4" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure4" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin4" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin4" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang4" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang4" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang4" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang4" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle4" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle4" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi4" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi4" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 5 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (5)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure5" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure5" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin5" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin5" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang5" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang5" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang5" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang5" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle5" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle5" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi5" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi5" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 6 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (6)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure6" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure6" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin6" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin6" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang6" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang6" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang6" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang6" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle6" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle6" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi6" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi6" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 7 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (7)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure7" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure7" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin7" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin7" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang7" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang7" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang7" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang7" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle7" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle7" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi7" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi7" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 8 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (8)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure8" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure8" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin8" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin8" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang8" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang8" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang8" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang8" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle8" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle8" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi8" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi8" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 9 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (9)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure9" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure9" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin9" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin9" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang9" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang9" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang9" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang9" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle9" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle9" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi9" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi9" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 10 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (10)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure10" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure10" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin10" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin10" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang10" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang10" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang10" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang10" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle10" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle10" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi10" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi10" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 11 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (11)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure11" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure11" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin11" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin11" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang11" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang11" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang11" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang11" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle11" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle11" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi11" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi11" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 12 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (12)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure12" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure12" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin12" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin12" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang12" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang12" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang12" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang12" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle12" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle12" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi12" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi12" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 13 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (13)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure13" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure13" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin13" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin13" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang13" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang13" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang13" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang13" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle13" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle13" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi13" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi13" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 14 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (14)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure14" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure14" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin14" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin14" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang14" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang14" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang14" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang14" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle14" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle14" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi14" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi14" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 15 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (15)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure15" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure15" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin15" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin15" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang15" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang15" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang15" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang15" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle15" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle15" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi15" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi15" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 16 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (16)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure16" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure16" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin16" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin16" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang16" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang16" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang16" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang16" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle16" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle16" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi16" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi16" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              <!-- APAR 17 -->
              <div class="col-md-6 ps-0 mb-3">
                  <label class="form-label mb-3">Nomor APAR (17)</label>
                  <div class="position-relative" style="margin-top: -10px;">
                      <select class="form-control shadow-none custom-select-icon" required>
                          <option value="" disabled selected>Pilih NO APAR</option>
                          <option value="APAR-001">APAR-01 (Pos Depan)</option>
                          <option value="APAR-002">APAR-02 (Lobby)</option>
                          <option value="APAR-003">APAR-03 (R. Piket Optel)</option>
                          <option value="APAR-004">APAR-04 (Depan Tangga / Samping Lemari APD) </option>
                          <option value="APAR-003">APAR-05 (Depan Kamar Mandu Pria LT 1)</option>
                          <option value="APAR-003">APAR-06 (R. Jaringan)</option>
                          <option value="APAR-003">APAR-07 (R. Arsip)</option>
                          <option value="APAR-003">APAR-08 (Depan R. Sidang Utama)</option>
                          <option value="APAR-003">APAR-09 (Depan Kamar Mandi Pria LT II)</option>
                          <option value="APAR-003">APAR-10 (Tangga LT II)</option>
                          <option value="APAR-003">APAR-11 (Kantin)</option>
                          <option value="APAR-003">APAR-12 (R. Hydrant)</option>
                          <option value="APAR-003">APAR-13 (R. Dapur)</option>
                          <option value="APAR-003">APAR-14 (Smoking Area)</option>
                          <option value="APAR-003">APAR-15 (Parkiran Motor Samping)</option>
                          <option value="APAR-003">APAR-16 (R. Kerja Trans Energi)</option>
                          <option value="APAR-003">APAR-17 (Pos Belakang)</option>
                      </select>
                      <i class="bi bi-caret-down-square-fill select-icon"></i>
                  </div>
              </div>
              <div class="col-md-6 p-0 mb-3">
                <label class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control shadow-none" required>
              </div>
              <div class="container mt-3">
    <label class="form-label" style="font-weight: bold;">List Check</label>
    <table>
        <tr>
            <th style="width: 50%;">Item Check</th>
            <th style="width: 25%;">Bagus</th>
            <th style="width: 25%;">Rusak</th>
        </tr>
        <tr>
            <td>Presure Gauge</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure17" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="presure17" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Pin / Segel</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin17" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="pin17" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang17" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="selang17" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Klem Selang</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang17" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="klemselang17" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Handle</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle17" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="handle17" value="belum" required>
            </td>
        </tr>
        <tr>
            <td>Kondisi Fisik</td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi17" value="sudah" required>
            </td>
            <td style="text-align: center;">
                <input class="form-check-input" type="radio" name="kondisi17" value="belum" required>
            </td>
        </tr>
    </table> 
              </div>
              
            </div>
          </div>
          <div class="my-1">
            <button type="submit" class="btn btn-primary shadow-none">Submit</button>
            <button type="reset" class="btn btn-danger shadow-none">Reset</button>
          </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

@include('layout.footer')