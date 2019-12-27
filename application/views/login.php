<?php $this->load->view('header.php', ['title'=>'Login']); ?>

<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="cart-title mt-50">
                    <h2>Login</h2>
                </div>

                <div class="cart-table clearfix">
                    <div class="form">
                        <form class="navbar-form"  action="<?php echo base_url().'login' ?>" method="post">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="enter email" required autofocus value="<?php echo $email??null; ?>">
                                <?php if(!empty($emailErr)){
                                    echo '<span style="font-size: 12px;color: red">Invalid email address</span>';
                                } ?>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="enter password">
                                <?php if(!empty($passwordErr)){
                                    echo '<span style="font-size: 12px;color: red">Password is required</span>';
                                } ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn amado-btn w-100">Login</button>
                            </div>

                            <hr>
                        </form>
                        <div class="label">
                            <a href=""> <span style="float: right; font-size: 12px">forgot password?</span></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-6">
                <style>
                    .callout {
                        position: fixed;
                        top;: 35px;
                        right: 20px;
                        margin-left: 20px;
                        max-width: 300px;
                    }

                    .callout-header {
                        padding: 25px 15px;
                        background: #555;
                        font-size: 30px;
                        color: white;
                    }

                    .callout-container {
                        padding: 15px;
                        background-color: #ccc;
                        color: black
                    }

                    .callout-closebtn {
                        position: absolute;
                        top: 5px;
                        right: 15px;
                        color: white;
                        font-size: 30px;
                        cursor: pointer;
                    }

                    .callout-closebtn:hover {
                        color: lightgrey;
                    }
                </style>
                <div class="callout">
                    <div class="callout-header">Don't have an account?</div>
                    <span class="callout-closebtn" onclick="this.parentElement.style.display='none';">×</span>
                    <div class="callout-container">
                        <p>  Click here to create  an account</p>
                        <div class="cart-btn mt-100">
                            <a href="cart.html" class="btn amado-btn w-100">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php $this->load->view('footer.php',['hideNewsLetter' => true]); ?>
