<div>

  <body class=" d-flex flex-column">
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{asset('theme/static/logo.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </div>
        <form class="card card-md" wire:submit.prevent='save'>
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
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" id="name" wire:model="name" class="form-control" placeholder="Enter name">
              @error('name')
              <p class=" text-xs text-red" id="email-error">{{ $message }}</p></span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" id="email" wire:model="email" class="form-control" placeholder="Enter email">
              @error('email')
              <p class=" text-xs text-red" id="email-error">{{ $message }}</p></span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" id="password" wire:model="password" class="form-control" placeholder="Password">
              </div>
              @error('password')
              <p class=" text-xs text-red" id="email-error">{{ $message }}</p></span>
              @enderror
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
          </div>
        </form>
        <div class="text-center text-secondary mt-3">
          Already have account? <a href="/" tabindex="-1">Sign in</a>
        </div>
      </div>
    </div>
  </body>
</div>