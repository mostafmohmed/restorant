@section('title','forget password')
    


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
  data-assets-path="{{ asset('asset-admin') }}/"
  data-template="vertical-menu-template-free"
>
  
@include('admin.layout.authheader')
  <body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner py-4">
            <!-- Forgot Password -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                @include('admin.layout.logoauth')
                <!-- /Logo -->
               
                <h4 class="mb-2">Forgot Password  🔒</h4>
                <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

               


                <form id="formAuthentication" class="mb-3" action="{{ route('admin.password.email') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      id="email"
                      name="email" 
                      :value="old('email')"
                      placeholder="Enter your email"
                      autofocus
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
                  <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
                </form>
                <div class="text-center">
                  <a href="{{ route('admin.loginview') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Back to login
                  </a>
                </div>
              </div>
            </div>
            <!-- /Forgot Password -->
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
    <script src="{{ asset('asset-admin') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('asset-admin') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('asset-admin') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('asset-admin') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('asset-admin') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('asset-admin') }}/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
