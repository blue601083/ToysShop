<nav class="mt-2"> <!--begin::Sidebar Menu-->
    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        <!-- 員工管理 -->
        <li class="nav-item">
            <a href="/admin/manager/list" class="nav-link d-flex align-items-center">
                <i class="nav-icon bi bi-people-fill fs-4 me-2"></i>
                <p class="mb-0">員工管理系統</p>
            </a>
        </li>

        <!-- 商品管理 -->
        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill fs-4 me-2"></i>
                <p>
                    商品管理系統
                    <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ms-4"> <a href="/admin/product/list" class="nav-link"> <i class="nav-icon bi bi-receipt-cutoff fs-5"></i>
                        <p>商品管理</p>
                    </a> </li>
                <li class="nav-item ms-4"> <a href="/admin/productCategory/list" class="nav-link"> <i class="nav-icon bi bi-tags-fill fs-5"></i>
                        <p>商品類別管理</p>
                    </a> </li>
                <li class="nav-item ms-4"> <a href="/admin/productCategory/list" class="nav-link"> <i class="nav-icon bi bi-award-fill fs-5"></i>
                        <p>商品獎項管理</p>
                    </a> </li>
            </ul>
        </li>

        <!-- 公告管理 -->
        <li class="nav-item">
            <a href="/admin/notice/list" class="nav-link d-flex align-items-center">
                <i class="nav-icon bi bi-megaphone-fill fs-4 me-2"></i>
                <p class="mb-0">公告管理系統</p>
            </a>
        </li>
    </ul> <!--end::Sidebar Menu-->
</nav>