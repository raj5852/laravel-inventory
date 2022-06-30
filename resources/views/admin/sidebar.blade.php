  <!--start sidebar -->
  <aside class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
          <div>
              <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
          </div>
          <div>
              <h4 class="logo-text">Onedash</h4>
          </div>
          <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
          </div>
      </div>
      <!--navigation-->
      <ul class="metismenu" id="menu">
          <li>
              <a href="{{ route('dashboard') }}">
                  <div class="parent-icon"><i class="bi bi-house-fill"></i>
                  </div>
                  <div class="menu-title">Dashboard</div>
              </a>

          </li>
          @if (request()->user()->hasAllPermissions(['product-input']))
              <li>
                  <a href="{{ route('productinput') }}">
                      <div class="parent-icon"><i class="bi bi-bag-check-fill"></i>
                      </div>
                      <div class="menu-title">Product Input</div>
                  </a>

              </li>
          @endif
          @if (request()->user()->hasAllPermissions(['product-output']))
              <li>
                  <a href="{{ route('productsale') }}">
                      <div class="parent-icon"><i class="bi bi-cart-check"></i>
                      </div>
                      <div class="menu-title">Product Output</div>
                  </a>

              </li>
          @endif
          @if (request()->user()->hasAllPermissions(['stock']))
              <li>
                  <a href="{{ route('stock') }}">
                      <div class="parent-icon"><i class="bi bi-flag-fill"></i>
                      </div>
                      <div class="menu-title">Stock</div>
                  </a>

              </li>
          @endif


      </ul>
      <!--end navigation-->
  </aside>
  <!--end sidebar -->
