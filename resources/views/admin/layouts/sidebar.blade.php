<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/home') }}" class="brand-link">
      <img src="{{asset('/')}}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Online Food Ordering</span>
    </a> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/')}}admin/dist/img/sohailul-alam.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <p class="text-white" style="font-size: 12px;"></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
          <li class="nav-item">
            <a href="{{ asset('/home') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a> 
          </li>
 
          <li class="nav-item">
            <a href="{{ route('item.index') }}" class="nav-link"> 
              <i class="nav-icon fas fa-edit"></i> 
              <p>
                Food Menu 
              </p>
            </a> 
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calendar-week"></i>
              <p>
              Orders
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('all_order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('yet_to_be_delivered.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yet to be delivered</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cancel_order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cancelled by Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('paused_order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paused</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
               <a href="" class="nav-link">
               <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('all_ticket.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('answered.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Answered</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('opened.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Open</p>
                </a>
              </li>
            </ul>
          </li>

          @if(Auth::user()->roles == 'admin')
          <li class="nav-item">
              <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('wallet.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Wallets
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a href="{{ route('account.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
              My Account
            </p>
            </a>
          </li>
       
          
      <!-- Right navbar links -->

      <li class="nav-item">
         <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            {{ __('Logout') }}
         </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>   
                              
      </li>
    </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>