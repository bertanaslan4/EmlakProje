<div class="modal signUp-modal two fade" id="signUpModal01" tabindex="-1" aria-labelledby="signUpModal01Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login-wrapper">
                    <div class="login-img"><img src="{{asset('front/img/home1/login-img.png')}}" alt>
                        <div class="logo"><a href="#"><img src="{{asset('front/img/orka-group-logo.svg')}}" alt></a></div>
                    </div>
                    <div class="login-content">
                        <div class="login-header">
                            <h4 class="modal-title" id="signUpModal01Label">Sign Up</h4>
                            <p>Already have an account? <button type="button" data-bs-toggle="modal" data-bs-target="#logInModal01">Log In</button></p><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                        </div>
                        <form method="POST" action="{{ route('user.registerAction') }}">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-inner"><label>First Name*</label><input type="text" name="name" autocomplete="off"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner"><label>Last Name*</label><input type="text" name="surname" autocomplete="off"></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner"><label>Enter your email address*</label><input type="email" name="email" autocomplete="off"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner"><label>Password*</label><input id="password" type="password" placeholder="*** ***" name="password" autocomplete="off"><i class="bi bi-eye-slash" id="togglePassword"></i></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner"><label>Confirm Password*</label><input id="password2" type="password" placeholder="*** ***" name="password_confirmation" autocomplete="off"><i class="bi bi-eye-slash" id="togglePassword2"></i></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner"><button class="primary-btn2" type="submit">Sign Up Now</button></div>
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
