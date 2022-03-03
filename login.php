		<?php

include "includes/header.php";
		?>


	 <section class="signin">
        <div class="container">
                <div class="user-login">
                    <?php 
                            if (isset($_GET['msg'])) {
                                echo "<h4 class='alert alert-info'>". $_GET['msg']. "</h4>";
                            }
                            ?>
                     <?php 
                            if (isset($_GET['mg'])) {
                                echo "<h4 class='alert alert-info'>". $_GET['mg']. "</h4>";
                            }
                            ?>
                    <h1 class=" user-login__title">Sign in to Your Account</h1>
                    <div class=" user-login__info">Don't have an account? <a
                            class=" user-login__info-link"
                            href="register.php">Create
                            one</a>.</div>
                          <form class="user-login__form" action="loginprocess.php"
                         method="post">
                        <div class="user-login__content">
                        	<fieldset class="user-login__fieldset">
                        		<label class="user-login__label" for="login">
                                    Email Address or  Username</label>
                                    <input placeholder="name@example.com or username"
                                    class="user-login__field" type="text" name="email">
                                </fieldset>
                            <fieldset class="user-login__fieldset">
                            	<label class="user-login__label" for="password">
                                    Password</label>
                                    <input placeholder="" name="pwd" class="user-login__field"
                                    type="password">
                                </fieldset>
                                <button  type="submit" name="login" class=" user-login__button">Sign
                                In</button>
                        </div>
                    </form>
                    <a
                        class="sign-in__forgot-password-link"
                        href="#">Forgotten your password?</a>
               	</div>
				</div>
			</div>
		</section>





			<?php

include "includes/footer.php";
		?>

