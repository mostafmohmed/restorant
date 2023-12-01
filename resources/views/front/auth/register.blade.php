
@section('title','loginpage')
    


<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('asset') }}/"
  data-template="vertical-menu-template-free"
>
  
@include('front.layout.authheader')
  <body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                @include('front.layout.logoauth')
                <!-- /Logo -->
                <h4 class="mb-2">Adventure starts here 🚀</h4>
                <p class="mb-4">Make your app management easy and fun!</p>
  
                <form id="formAuthentication"  class="mb-3" action="{{ route('register') }}" method="POST">
                    @csrf
                  <div class="mb-3">
                    <label for="username" class="form-label"></label>
                    <input
                   
                    :value="old('name')"
                      type="text"
                      class="form-control"
                      id="username"
                      name="name"
                      
                      placeholder="Enter your username"
                      autofocus
                    />
                  </div>
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />

                  <div class="mb-3">
                    <label for="email" class="form-label"  > Email    </label>
     <input type="text"  name="email"    class="form-control" id="email" :value="old('email')" name="email" placeholder="Enter your email" />
                  </div>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">  password </label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>


                  <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div>
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />


                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                      <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                      </label>
                    </div>
                  </div>
                  <button class="btn btn-primary d-grid w-100">Sign up</button>
                </form>
  
                <p class="text-center">
                  <span>Already have an account?</span>
                  <a href="auth-login-basic.html">
                    <span>Sign in instead</span>
                  </a>
                </p>
              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>

    <!-- / Content -->

    <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('asset') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('asset') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('asset') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('asset') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('asset') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('asset') }}/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
