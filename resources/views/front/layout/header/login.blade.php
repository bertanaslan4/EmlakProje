
<div class="modal signUp-modal two fade" id="logInModal01" tabindex="-1" aria-labelledby="logInModal01Label" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-wrapper">
                    <div class="login-img"><img src="{{asset('front/img/home1/login-img.png')}}" alt>
                        <div class="logo"><a href="#"><img src="{{asset('front/img/orka-group-logo.svg')}}" alt></a></div>
                    </div>
                    <div class="login-content">
                        <div class="login-header">
                            <h4 class="modal-title" id="logInModal01Label">Log In</h4>
                            <p>Don’t have any account? <button type="button" data-bs-toggle="modal" data-bs-target="#signUpModal01">Sign Up</button></p><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                        </div>
                        <form method="POST" action="{{ route('user.loginAction') }}">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <div class="form-inner"><label>Enter your email address*</label><input name="email" type="email" autocomplete="off"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner"><label>Password*</label><input id="password3" type="password" name="password" placeholder="*** ***" autocomplete="off"><i class="bi bi-eye-slash" id="togglePassword3"></i></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-agreement form-inner d-flex justify-content-between flex-wrap">
                                        <div class="form-group"><input type="checkbox" id="html"><label for="html">Remember Me</label></div><a href="#" class="forgot-pass">Forget Password?</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner"><button class="primary-btn2" type="submit">Log In</button></div>
                                </div>
                            </div>
                            <div class="terms-conditon">
                                <p>By sign up,you agree to the <a href="#">‘terms & conditons’</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
