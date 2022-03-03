<section>
			 <footer class="footer">
        <div class="footer-contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contents">
                            <h4 class="contents-title" id="aboutus">ABOUT US</h4><hr style="width: 50px; font-weight: bolder;">
                            <p>TruckSpot is a platform where Truck Owners can add their truck information and users who are in need of truck can search and get truck details no matter their location or nature of goods.</p>

                            <ul class="social-icons">
                                <li>
                                    <a target="_blank" href="#"><i
                                            class="fab fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contents">
                            <h4 class="contents-title">NEWS LETTER</h4><hr style="width: 50px; font-weight: bolder;">
                            <p>To get news updates on new trucks added and premium trucks , Kindly subscribe to our news letter</p>
                            <form class="form-subscribe2" action="#" method="post">
                                <div class="form-group">
                                    <input class="form-control subsciber_email color-tan" type="email"
                                        placeholder="Enter Your Mail to get Notification" required>
                                </div>
                                <div class="form-group  mt-2">
                                    <button type="submit" class="btn btn-theme btn-theme-transparent" name="subscrib" >
                                        Subscribe </button>
                                </div>
                            </form>
                        </div>
                    </div>
       
                    <div class="col-md-4">
                        <div class="contents contents-tag-cloud">
                            <h4 class="contents-title">Truck Brands</h4><hr style="width: 50px; font-weight: bolder;">
                            <ul class="t_Brands">
                                <li>
                                    <a href="#"
                                        class="homelink"
                                        style="font-size: 16px">Daf</a> </li>
                                <li>
                                    <a href="#"
                                        class="homelink"
                                        style="font-size: 16px">Mack</a> </li>
                                <li>
                                    <a href="#"
                                        class="homelink"
                                        style="font-size: 16px">Mercedes</a> </li>
                                <li>
                                    <a href="#"
                                        class="homelink"
                                        style="font-size: 16px">Volvo</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-note">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="btn-row text-center">
                            <a target="_blank" href="#"
                                class="btn btn-theme btn-icon-left facebook"><i class="fab fa-facebook"></i>
                                FACEBOOK </a>
                            <a target="_blank" href="#"
                                class="btn btn-theme btn-icon-left twitter"><i class="fab fa-twitter"></i>
                                TWITTER </a>
                            <a target="_blank" href="#/"
                                class="btn btn-theme btn-icon-left pinterest"><i class="fab fa-pinterest"></i>
                                PINTEREST </a>
                            <a target="_blank" href="#"
                                class="btn btn-theme btn-icon-left google"><i class="fab fa-google"></i>
                                google </a>
                                <a href="admin/index.php"
                                class="btn btn-theme btn-icon-left google"><i class="fa fa-desktop"></i>
                               Admin Login</a>
                        </p>
                        <div class="copyright">
                        &copy;  <?php echo date('Y'); ?> — TruckSpot. All Rights Reserved <a target="_blank"
                                href="vivian.html"><!-- Designed By Vivian --></a>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="scrollTop" onclick="scrollToTop()"></div>
		</section>





    <script src="bootstrap/js/jquery-3.6.0.js"></script>    
        <script type="text/javascript">
        $('.burger').on('click', function (event) {
            $('.navigation-bar').slideToggle('200');
        });

        window.addEventListener('scroll', function(){
            var scroll=document.querySelector('.scrollTop');
            scroll.classList.toggle("active", window.scrollY > 500)
        })
        function scrollToTop(){
            window.scrollTo({
                top:0,
                behavior:"smooth"
            })
        }

    </script>
	<script type="text/javascript" src='./bootstrap/js/jquery-3.6.0.js'></script>					<script type="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>