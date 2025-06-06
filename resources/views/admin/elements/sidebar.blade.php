<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Table</span>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.category-parent.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Category Parent">Category Parent</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.category-parent.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-parent.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.category-parent.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-parent.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.category-parent.deleted') ? 'active' : '' }}">
                    <a href="{{ route('admin.category-parent.deleted') }}" class="menu-link">
                        <div data-i18n="Restore">Restore</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.category.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-folders"></i>
                <div data-i18n="Category">Category</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.category.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.category.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.category.deleted') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.deleted') }}" class="menu-link">
                        <div data-i18n="Restore">Restore</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.post.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-news"></i>
                <div data-i18n="Post">Post</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.post.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.post.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.post.deleted') ? 'active' : '' }}">
                    <a href="{{ route('admin.post.deleted') }}" class="menu-link">
                        <div data-i18n="Restore">Restore</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.attribute.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-tags"></i>
                <div data-i18n="Attribute">Attribute</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.attribute.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.attribute.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.attribute.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.attribute.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.attribute.deleted') ? 'active' : '' }}">
                    <a href="{{ route('admin.attribute.deleted') }}" class="menu-link">
                        <div data-i18n="Restore">Restore</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.product.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-brand-producthunt"></i>
                <div data-i18n="Product">Product</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.product.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.product.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.product.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.product.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.product.deleted') ? 'active' : '' }}">
                    <a href="{{ route('admin.product.deleted') }}" class="menu-link">
                        <div data-i18n="Restore">Restore</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.user.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="User">User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.user.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.user.deleted') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.deleted') }}" class="menu-link">
                        <div data-i18n="Restore">Restore</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.image.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-photo"></i>
                <div data-i18n="Images">Images</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.image.image') ? 'active' : '' }}">
                    <a href="{{ route('admin.image.image') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.voucher.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-gift"></i>
                <div data-i18n="Voucher">Voucher</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.voucher.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.voucher.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.voucher.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.voucher.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.bill.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-receipt-2"></i>
                <div data-i18n="Bill">Bill</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.bill.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.request-cancellation') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.request-cancellation') }}" class="menu-link">
                        <div data-i18n="Request Cancellation">Request Cancellation</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.waitingpayment') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.waitingpayment') }}" class="menu-link">
                        <div data-i18n="Waiting Payment">Waiting Payment</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.pending') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.pending') }}" class="menu-link">
                        <div data-i18n="Pending">Pending</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.confirmed') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.confirmed') }}" class="menu-link">
                        <div data-i18n="Confirmed">Confirmed</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.preparing') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.preparing') }}" class="menu-link">
                        <div data-i18n="Preparing">Preparing</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.shipping') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.shipping') }}" class="menu-link">
                        <div data-i18n="Shipping">Shipping</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.delivered') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.delivered') }}" class="menu-link">
                        <div data-i18n="Delivered">Delivered</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.refund') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.refund') }}" class="menu-link">
                        <div data-i18n="Refund">Refund</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.return') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.return') }}" class="menu-link">
                        <div data-i18n="Return">Return</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.bill.cancelled') ? 'active' : '' }}">
                    <a href="{{ route('admin.bill.cancelled') }}" class="menu-link">
                        <div data-i18n="Cancelled">Cancelled</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Role &amp; Permission</span>
        </li>
        <li
            class="menu-item {{ request()->routeIs('admin.role.*') || request()->routeIs('admin.permission.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-drone"></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.role.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.role.index') }}" class="menu-link">
                        <div data-i18n="Roles">Roles</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.permission.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.permission.index') }}" class="menu-link">
                        <div data-i18n="Permission">Permission</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Login Session</span>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.authenticationlog.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-clock"></i>
                <div data-i18n="Authentication log">Authentication Log</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.authenticationlog.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.authenticationlog.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Location</span>
        </li>
        <li
            class="menu-item {{ request()->routeIs('admin.menu.*') || request()->routeIs('admin.locationmenu.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-align-left"></i>
                <div data-i18n="Location Menu">Location Menu</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.menu.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.menu.index') }}" class="menu-link">
                        <div data-i18n="Menu">Menu</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.locationmenu.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.locationmenu.index') }}" class="menu-link">
                        <div data-i18n="Location Menu">Location Menu</div>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="menu-item {{ request()->routeIs('admin.productmenu.*') || request()->routeIs('admin.locationproductmenu.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-brand-producthunt"></i>
                <div data-i18n="Location Product">Location Product</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.productmenu.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.productmenu.index') }}" class="menu-link">
                        <div data-i18n="Menu Product">Menu Product</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.locationproductmenu.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.locationproductmenu.index') }}" class="menu-link">
                        <div data-i18n="Location Product">Location Product</div>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="menu-item {{ request()->routeIs('admin.bannermenu.*') || request()->routeIs('admin.locationbannermenu.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-panorama-horizontal"></i>
                <div data-i18n="Location Banner">Location Banner</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.bannermenu.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.bannermenu.index') }}" class="menu-link">
                        <div data-i18n="Menu Banner">Menu Banner</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.locationbannermenu.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.locationbannermenu.index') }}" class="menu-link">
                        <div data-i18n="Location Banner">Location Banner</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Settings</span>
        </li>
        <li class="menu-item {{ request()->routeIs('admin.setting.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.setting.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.index') }}" class="menu-link">
                        <div data-i18n="Index">Index</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.setting.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.setting.create') }}" class="menu-link">
                        <div data-i18n="Create">Create</div>
                    </a>
                </li>
            </ul>
        </li>
        
    </ul>
</aside>
