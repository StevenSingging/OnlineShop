<div>

  <body class=" d-flex flex-column">
    <script src="{{asset('theme/dist/js/demo-theme.min.js?1720208459')}}"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{asset('theme/static/logo.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form wire:submit.prevent='save'>
              @if(session('error'))
              <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                  <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
                  </div>
                  <div>
                  {{ session('error') }}
                  </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
              </div>
              @endif
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" id="email" wire:model="email" class="form-control" placeholder="your@email.com">
                @error('email')
                <p class=" text-xs text-red" id="email-error">{{ $message }}</p></span>
                @enderror
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  <span class="form-label-description">
                    <a wire:navigate href="/forgot-password">I forgot password</a>
                  </span>
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" id="password" wire:model="password" class="form-control" placeholder="Your password">
                </div>
                @error('password')
                <p class=" text-xs text-red" id="email-error">{{ $message }}</p></span>
                @enderror
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>
        </div>
        <div class="text-center text-secondary mt-3">
          Don't have account yet? <a wire:navigate href="/register" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
  </body>
</div>