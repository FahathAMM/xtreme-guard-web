 <div class="dropdown ms-sm-3 header-item topbar-user">
     <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false">
         <span class="d-flex align-items-center">
             <img class="rounded-circle header-profile-user" src="{{ currentUser()->img }}" alt="Header Avatar" />
             <span class="text-start ms-xl-2">
                 <span
                     class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ currentUser()->first_name ?? '' }}
                 </span>
                 <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ currentUser()->designation ?? '' }}
                 </span>
             </span>
         </span>
     </button>
     <div class="dropdown-menu dropdown-menu-end">
         <!-- item-->
         <h6 class="dropdown-header">Welcome {{ currentUser()->first_name ?? '' }}!</h6>
         {{-- <a class="dropdown-item" href="pages-profile.html">
            <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Profile</span>
        </a>
        <a class="dropdown-item" href="apps-chat.html">
            <i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Messages</span>
        </a>
        <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Taskboard</span>
        </a>
        <a class="dropdown-item" href="pages-faqs.html"><i
                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Help</span>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="pages-profile.html"><i
                class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Balance : <b>$5971.67</b></span>
        </a>
        <a class="dropdown-item" href="pages-profile-settings.html">
            <span class="badge bg-success-subtle text-success mt-1 float-end">New</span>
            <i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Settings</span>
        </a>
        <a class="dropdown-item" href="auth-lockscreen-basic.html">
            <i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i>
            <span class="align-middle">Lock screen</span>
        </a> --}}


         {{-- <form method="POST" action="{{ route('logout') }}"> --}}
         {{-- @csrf --}}
         <a class="dropdown-item" href="{{ route('logout') }}">
             <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
             <span class="align-middle" data-key="t-logout">Logout</span>
         </a>
         {{-- </form> --}}


     </div>
 </div>

 {{-- <style>
    .topbar-user .btn:hover,
    .topbar-user .btn:active {
        background-color: #FFFFFF !important;
        border: 1px solid #FFFFFF !important;
        height: 70px;
    }
</style> --}}
