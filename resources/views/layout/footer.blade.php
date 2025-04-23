<!-- Footer -->
<footer class="footer mt-2">
    <div class="container">
        <div class="row">
            <!-- Hubungi Kami -->
            <div class="col-md-6 text-center text-md-start">
                 <h5 class="mb-3">Hubungi Kami</h5>
                <div class="d-flex align-items-start">
                    <!-- Ikon Call Center (Kiri) -->
                    <div class="me-3">
                        <img src="{{ asset('umum/images/icon-call-center.png') }}" alt="Contact Center PLN 123" width="120">
                    </div>
                    <!-- Daftar Kontak (Kanan) -->
                    <div class="d-flex flex-column gap-2" style="margin-left: 15px;">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('umum/images/contact-icon.png') }}" alt="Phone Icon" width="25">
                            <span class="ms-2">123</span>
                        </div>
                        <div class="d-flex align-items-center">
                        <img src="{{ asset('umum/images/phone-icon.png') }}" alt="Phone Icon" width="25">
                            <span class="ms-2">(kode area) 123</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('umum/images/twiter-icon.png') }}" alt="Phone Icon" width="25">
                            <span class="ms-2">@pln_123</span>
                        </div>
                        <div class="d-flex align-items-center">
                        <img src="{{ asset('umum/images/facebook-icon.png') }}" alt="Phone Icon" width="25">
                            <span class="ms-2">PLN 123</span>
                        </div>
                        <div class="d-flex align-items-center">
                        <img src="{{ asset('umum/images/email-icon.png') }}" alt="Phone Icon" width="25">
                            <span class="ms-2">pln123@pln.co.id</span>
                        </div>
                        <div class="d-flex align-items-center">
                        <img src="{{ asset('umum/images/instagram-icon.png') }}" alt="Phone Icon" width="25">
                            <span class="ms-2">pln123_official</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sitemap -->
            <div class="col-md-3 text-center text-md-start">
                <h5>Sitemap</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Pelanggan</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Stakeholder</a></li>
                    <li><a href="#">PLN Peduli</a></li>
                    <li><a href="#">KIP</a></li>
                    <li><a href="#">Karier</a></li>
                    <li><a href="#">Webmail</a></li>
                </ul>
            </div>

            <!-- Ikuti Kami -->
            <div class="col-md-3 text-center text-md-start">
                <h5>Ikuti Kami</h5>
                <div class="footer-icons">
                    <a href="#"><img src="{{ asset('umum/images/facebook-icon.png') }}" alt="Facebook"></a>
                    <a href="#"><img src="{{ asset('umum/images/twiter-icon.png') }}" alt="Twiter"></a>
                    <a href="#"><img src="{{ asset('umum/images/youtube-icon.png') }}" alt="Youtube"></a>
                    <a href="#"><img src="{{ asset('umum/images/instagram-icon.png') }}" alt="Instagram"></a>
                </div>
            </div>
        </div>

        <hr class="text-white">

        <!-- Copyright -->
        <div class="text-center">
            <p>Copyright © 2025 PT PLN (Persero) All Rights Reserved</p>
        </div>
    </div>
</footer>
<!-- Instalasi Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://unpkg.com/lenis@1.1.5/dist/lenis.min.js"></script>

<script>
    let navbar = document.getElementById("stickyNavbar");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            navbar.classList.add("visible-navbar");
            navbar.classList.remove("hidden-navbar");
        } else {
            navbar.classList.remove("visible-navbar");
            navbar.classList.add("hidden-navbar");
        }
    });
    var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'), {
        interval: 2000,  // Ganti angka ini untuk mengatur durasi antar slide
        ride: 'carousel'
    });
    document.querySelectorAll(".toggle-content").forEach(button => {
        button.addEventListener("click", function () {
            let targetId = this.getAttribute("data-target");
            
            // Sembunyikan semua konten terlebih dahulu
            document.querySelectorAll(".content-section").forEach(section => {
                section.style.display = "none";
            });

            // Tampilkan konten yang sesuai dengan tombol yang diklik
            document.getElementById(targetId).style.display = "block";
        });
    });
    $(document).ready(function() {
        let selectedHour = 12, selectedMinute = 0;

        // Buka Modal
        $("#openClock").click(function() {
            $("#clockModal").fadeIn();
        });

        // Tutup Modal
        $("#closeClock").click(function() {
            $("#clockModal").fadeOut();
        });

        // Simulasi Pilih Jam
        $(".clock-container").click(function(e) {
            let rect = this.getBoundingClientRect();
            let x = e.clientX - rect.left - rect.width / 2;
            let y = e.clientY - rect.top - rect.height / 2;
            let angle = Math.atan2(y, x) * (180 / Math.PI) + 90;
            if (angle < 0) angle += 360;

            // Cek apakah memilih jam atau menit berdasarkan klik
            if (y < 0) {
                selectedHour = Math.round(angle / 30);
                $("#hourHand").css("transform", `translateX(-50%) rotate(${angle}deg)`);
            } else {
                selectedMinute = Math.round(angle / 6);
                $("#minuteHand").css("transform", `translateX(-50%) rotate(${angle}deg)`);
            }
        });

        // Set Jam ke Input
        $("#setTime").click(function() {
            let hour = String(selectedHour).padStart(2, '0');
            let minute = String(selectedMinute).padStart(2, '0');
            $("#timeInput").val(`${hour}:${minute}`);
            $("#clockModal").fadeOut();
        });
    });
    // JavaScript untuk mengisi modal berdasarkan baris tabel yang diklik
    document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('click', function () {
                const kode = this.getAttribute('data-kode');
                const tanggal = this.getAttribute('data-tanggal');

                // Update isi modal
                document.getElementById('modalKode').textContent = kode;
                document.getElementById('modalTanggal').textContent = tanggal;
            });
        });
        function previewFoto() {
        var input = document.getElementById('fotoInput');
        var preview = document.getElementById('fotoPreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]); // Membaca file sebagai URL data
        } else {
            preview.style.display = 'none';
        }
    }
    //Tanda Tangan
    let canvas = document.getElementById("signature-pad");
    let ctx = canvas.getContext("2d");
    let isDrawing = false;

    // Pastikan ukuran canvas sesuai dengan parent
    function resizeCanvas() {
        canvas.width = canvas.offsetWidth;
        canvas.height = 300;
        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    // Atur ulang ukuran saat modal terbuka
    document.getElementById('aparModal').addEventListener('shown.bs.modal', resizeCanvas);

    function getPosition(event) {
        let rect = canvas.getBoundingClientRect();
        return {
            x: (event.clientX || event.touches[0].clientX) - rect.left,
            y: (event.clientY || event.touches[0].clientY) - rect.top
        };
    }

    function startDrawing(event) {
        isDrawing = true;
        let pos = getPosition(event);
        ctx.beginPath();
        ctx.moveTo(pos.x, pos.y);
    }

    function draw(event) {
        if (!isDrawing) return;
        let pos = getPosition(event);
        ctx.lineTo(pos.x, pos.y);
        ctx.strokeStyle = "black";
        ctx.lineWidth = 2;
        ctx.lineCap = "round";
        ctx.stroke();
    }

    function stopDrawing() {
        isDrawing = false;
        ctx.closePath();
    }

    // Event Listener untuk Mouse & Touch
    canvas.addEventListener("mousedown", startDrawing);
    canvas.addEventListener("mousemove", draw);
    canvas.addEventListener("mouseup", stopDrawing);
    canvas.addEventListener("mouseleave", stopDrawing);

    canvas.addEventListener("touchstart", (e) => startDrawing(e), { passive: false });
    canvas.addEventListener("touchmove", (e) => draw(e), { passive: false });
    canvas.addEventListener("touchend", stopDrawing);

    // Hapus tanda tangan
    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "white";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    // Simpan tanda tangan ke input hidden saat submit
    document.getElementById("aparForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Cegah reload halaman
        let signatureData = canvas.toDataURL("image/png"); // Simpan sebagai base64
        document.getElementById("signature-data").value = signatureData;
        alert("Tanda tangan berhasil disimpan!");
        this.submit(); // Kirim form
    });
</script>

</body>
</html>