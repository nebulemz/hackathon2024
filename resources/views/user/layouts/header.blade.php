<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    @yield('page-title')
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="d-print-none col-auto ms-auto">
                <x-common::notifications.icon :notifications="auth()->user()?->unreadNotifications" />
            </div>
        </div>
    </div>
</div>
