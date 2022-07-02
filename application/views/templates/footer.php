</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Sikokemas</h3>
                    <p>
                        Jalan Ringroad <br>
                        Yogyakarta<br>
                        Indonesia <br><br>
                        <strong>Phone:</strong> +123456789<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Pelayanan</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('home/konsultasi') ?>">Konsultasi</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?= base_url('home/antrian') ?>">Daftar Antrian</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Lokasi</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.879758183645!2d110.32279321407488!3d-7.802552494377277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af8015817dcb3%3A0x44265c0cf8f29b43!2sUniversitas%20Bina%20Sarana%20Informatika%20Kampus%20Yogyakarta%20(UBSI%20Yogyakarta)!5e0!3m2!1sid!2sid!4v1638583724386!5m2!1sid!2sid" width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Sikokemas</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>


<!-- Vendor JS Files -->
<script src="<?= base_url('assets') ?>/vendor/purecounter/purecounter.js"></script>
<script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('assets') ?>/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets') ?>/js/main.js"></script>
<script type="text/javascript">
    VanillaTilt.init(document.querySelector(".icon-box"), {
        max: 25,
        speed: 400,
        glare: true,
    });

    //It also supports NodeList
    VanillaTilt.init(document.querySelectorAll(".icon-box"));
</script>

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script>
                window.__lc = window.__lc || {};
                window.__lc.license = 13351401;;
                (function(n, t, c) {
                    function i(n) {
                        return e._h ? e._h.apply(null, n) : e._q.push(n)
                    }
                    var e = {
                        _q: [],
                        _h: null,
                        _v: "2.0",
                        on: function() {
                            i(["on", c.call(arguments)])
                        },
                        once: function() {
                            i(["once", c.call(arguments)])
                        },
                        off: function() {
                            i(["off", c.call(arguments)])
                        },
                        get: function() {
                            if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
                            return i(["get", c.call(arguments)])
                        },
                        call: function() {
                            i(["call", c.call(arguments)])
                        },
                        init: function() {
                            var n = t.createElement("script");
                            n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
                        }
                    };
                    !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
                }(window, document, [].slice))
            </script>
            <noscript><a href="https://www.livechatinc.com/chat-with/13351401/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
            <!-- End of LiveChat code -->


</body>

</html>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>