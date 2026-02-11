<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STOCK-BI | إدارة المستخدمين</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', 'Segoe UI', sans-serif;
        }

        body {
            color: #000000;
            line-height: 1.7;
            background-color: #f5f5f5;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* شريط التنقل */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 0;
            background-color: #000000;
            z-index: 1000;
            transition: all 0.4s;
            border-bottom: 1px solid rgba(255, 221, 0, 0.1);
        }

        .navbar.scrolled {
            padding: 12px 0;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: 800;
            font-size: 1.8rem;
            color: #ffffff;
            text-decoration: none;
        }

        .logo span {
            color: #FFDD00;
            margin-right: 5px;
        }

        .logo-dot {
            width: 10px;
            height: 10px;
            background-color: #FFDD00;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.1);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .user-info {
            display: flex;
            align-items: center;
            color: #ffffff;
        }

        .user-info i {
            margin-left: 10px;
            color: #FFDD00;
            font-size: 1.2rem;
        }

        /* زر Excel */
        .excel-btn {
            background: linear-gradient(135deg, #FFDD00, #FFC800);
            color: #000000;
            border: none;
            padding: 12px 28px;
            border-radius: 30px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s;
            box-shadow: 0 4px 15px rgba(255, 221, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            text-decoration: none;
        }

        .excel-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 221, 0, 0.4);
            color: #000000;
        }

        /* المحتوى الرئيسي */
        .main-content {
            margin-top: 100px;
            padding: 30px 0;
            min-height: calc(100vh - 180px);
        }

        /* عنوان الصفحة */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.08);
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #000000;
            position: relative;
            display: inline-block;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            right: 0;
            width: 120px;
            height: 4px;
            background: linear-gradient(90deg, #FFDD00, transparent);
        }

        .page-subtitle {
            color: #4D4D4D;
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /* إحصائيات المستخدمين */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s;
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FFDD00, transparent);
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 221, 0, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #FFDD00;
            font-size: 1.8rem;
            transition: all 0.4s;
        }

        .stat-card:hover .stat-icon {
            background: #FFDD00;
            color: #000000;
            transform: rotateY(360deg);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #FFDD00;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 1.1rem;
            color: #4D4D4D;
            font-weight: 600;
        }

        /* جدول المستخدمين */
        .users-table-container {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            border: 1px solid rgba(0, 0, 0, 0.08);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            background: rgba(255, 221, 0, 0.05);
            border-bottom: 2px solid rgba(255, 221, 0, 0.2);
        }

        .table-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: #000000;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 50px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            font-size: 1rem;
            background: #ffffff;
            transition: all 0.4s;
        }

        .search-input:focus {
            outline: none;
            border-color: #FFDD00;
            box-shadow: 0 0 0 3px rgba(255, 221, 0, 0.2);
        }

        .search-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #4D4D4D;
        }

        .search-loading {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #FFDD00;
            display: none;
        }

        .search-loading.active {
            display: block;
        }

        .clear-search {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            display: none;
            font-size: 1rem;
        }

        .clear-search:hover {
            color: #FFDD00;
        }

        .clear-search.active {
            display: block;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table th {
            background: rgba(0, 0, 0, 0.02);
            color: #000000;
            font-weight: 700;
            text-align: right;
            padding: 20px 30px;
            border-bottom: 2px solid rgba(0, 0, 0, 0.05);
        }

        .users-table td {
            padding: 20px 30px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            color: #4D4D4D;
            transition: all 0.4s;
        }

        .users-table tr:hover td {
            background: rgba(255, 221, 0, 0.03);
            color: #000000;
        }

        .user-name {
            font-weight: 600;
            color: #000000;
            font-size: 1.1rem;
        }

        .user-phone {
            color: #4D4D4D;
            font-size: 1rem;
            direction: ltr;
            text-align: left;
        }

        .user-email {
            color: #4D4D4D;
            font-size: 1rem;
        }

        .user-date {
            color: #4D4D4D;
            font-size: 1rem;
        }

        /* تنسيق البادينق (Pagination) */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 5px;
        }

        .pagination .page-item .page-link {
            border-radius: 8px;
            margin: 0 3px;
            padding: 10px 16px;
            color: #000000;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: #ffffff;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .pagination .page-item.active .page-link {
            background: #FFDD00;
            border-color: #FFDD00;
            color: #000000;
        }

        .pagination .page-item .page-link:hover {
            background: rgba(255, 221, 0, 0.2);
            border-color: #FFDD00;
        }

        .pagination .page-item.disabled .page-link {
            color: #ccc;
            pointer-events: none;
            background: #f5f5f5;
        }

        /* رسالة لا توجد نتائج */
        .no-results {
            text-align: center;
            padding: 50px !important;
        }

        .no-results i {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 15px;
        }

        .no-results h3 {
            color: #4D4D4D;
            margin-bottom: 10px;
        }

        .no-results p {
            color: #999;
        }

        /* مؤشر التحميل */
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            border-radius: 20px;
            display: none;
        }

        .loading-overlay.active {
            display: flex;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 221, 0, 0.3);
            border-radius: 50%;
            border-top-color: #FFDD00;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* الفوتر */
        .footer {
            background: #1A1A1A;
            color: #ffffff;
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FFDD00, transparent);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            font-size: 0.9rem;
        }

        /* تصميم متجاوب */
        @media (max-width: 1200px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .users-table {
                display: block;
                overflow-x: auto;
            }

            .table-header {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }

            .search-box {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .stats-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                font-size: 2rem;
            }

            .excel-btn {
                width: 100%;
                justify-content: center;
            }

            .user-info span {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <!-- شريط التنقل -->
    <nav class="navbar" id="navbar">
        <div class="container nav-container">
            <a href="{{ route('admin.users.index') }}" class="logo">
                BEE -<span>STOCK</span>
                <div class="logo-dot"></div>
            </a>

            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="excel-btn"
                    style="background: #dc3545; box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);">
                    <i class="fas fa-sign-out-alt" style="margin-left: 8px;"></i> تسجيل الخروج
                </button>
            </form>
        </div>
    </nav>

    <div class="main-content">
        <div class="container">
            <div class="page-header">
                <div>
                    <h1 class="page-title">إدارة المستخدمين</h1>
                    <p class="page-subtitle">عرض وإدارة معلومات المستخدمين المسجلين في النظام</p>
                </div>
                <a href="{{ route('admin.users.export') }}" class="excel-btn" id="exportExcelBtn">
                    <i class="fas fa-file-excel"></i> تصدير Excel
                </a>
            </div>

            <div class="stats-cards">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" id="totalUsers">{{ $totalUsers }}</div>
                    <div class="stat-label">إجمالي المستخدمين</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="stat-number" id="newUsers">{{ $newUsersThisMonth }}</div>
                    <div class="stat-label">مستخدمين جدد هذا الشهر</div>
                </div>
            </div>

            <div class="users-table-container" style="position: relative;">
                <!-- مؤشر التحميل -->
                <div class="loading-overlay" id="loadingOverlay">
                    <div class="loading-spinner"></div>
                </div>

                <div class="table-header">
                    <h2 class="table-title">قائمة المستخدمين</h2>

                    <div class="search-box">
                        <input type="text" id="searchInput" class="search-input"
                            placeholder="ابحث عن مستخدم بالاسم أو البريد أو الجوال..." autocomplete="off">
                        <i class="fas fa-search search-icon"></i>
                        <i class="fas fa-spinner fa-spin search-loading" id="searchLoading"></i>
                        <button class="clear-search" id="clearSearchBtn" title="مسح البحث">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <div id="tableContainer">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>رقم الجوال</th>
                                <th>البريد الإلكتروني</th>
                                <th>تاريخ التسجيل</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            @forelse($users as $index => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $index }}</td>
                                    <td>
                                        <div class="user-name">{{ $user->name }}</div>
                                    </td>
                                    <td>
                                        <div class="user-phone">{{ $user->phone ?? 'غير متوفر' }}</div>
                                    </td>
                                    <td>
                                        <div class="user-email">{{ $user->email }}</div>
                                    </td>
                                    <td>
                                        <div class="user-date">{{ $user->created_at->format('Y-m-d') }}</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="no-results">
                                        <i class="fas fa-users"></i>
                                        <h3>لا يوجد مستخدمين</h3>
                                        <p>لم يتم العثور على أي مستخدمين في النظام</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- روابط البادينق (Pagination) -->
                    <div class="pagination-container" id="paginationContainer" style="padding: 20px 30px;">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- الفوتر -->
    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>© {{ date('Y') }} STOCK-BI - لوحة التحكم. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.getElementById('exportExcelBtn')?.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 200);
        });

        const searchInput = document.getElementById('searchInput');
        const searchLoading = document.getElementById('searchLoading');
        const clearSearchBtn = document.getElementById('clearSearchBtn');
        const tableBody = document.getElementById('usersTableBody');
        const paginationContainer = document.getElementById('paginationContainer');
        const loadingOverlay = document.getElementById('loadingOverlay');

        let searchTimeout = null;
        let currentSearchTerm = '';

        function performSearch(page = 1) {
            const searchTerm = searchInput.value.trim();
            currentSearchTerm = searchTerm;

            searchLoading.classList.add('active');
            loadingOverlay.classList.add('active');

            if (searchTerm.length > 0) {
                clearSearchBtn.classList.add('active');
            } else {
                clearSearchBtn.classList.remove('active');
            }

            fetch(`/admin/users/search-ajax?search=${encodeURIComponent(searchTerm)}&page=${page}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    updateTable(data.users.data, data.users.current_page, data.users.from);

                    updatePagination(data.users, searchTerm);

                    updateSearchStats(data.totalUsers, data.newUsersThisMonth);
                })
                .catch(error => {
                    console.error('Error:', error);
                })
                .finally(() => {
                    searchLoading.classList.remove('active');
                    loadingOverlay.classList.remove('active');
                });
        }

        function updateTable(users, currentPage, from) {
            if (users.length === 0) {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="no-results">
                            <i class="fas fa-search"></i>
                            <h3>لا توجد نتائج</h3>
                            <p>لم يتم العثور على مستخدمين مطابقين لبحثك</p>
                        </td>
                    </tr>
                `;
                return;
            }

            let html = '';
            users.forEach((user, index) => {
                const rowNumber = from ? from + index : index + 1;
                const phone = user.phone || 'غير متوفر';
                const date = new Date(user.created_at).toLocaleDateString('en-CA'); // YYYY-MM-DD format

                html += `
                    <tr>
                        <td>${rowNumber}</td>
                        <td><div class="user-name">${escapeHtml(user.name)}</div></td>
                        <td><div class="user-phone">${escapeHtml(phone)}</div></td>
                        <td><div class="user-email">${escapeHtml(user.email)}</div></td>
                        <td><div class="user-date">${date}</div></td>
                    </tr>
                `;
            });

            tableBody.innerHTML = html;
        }

        function updatePagination(data, searchTerm) {
            if (!data || data.last_page <= 1) {
                paginationContainer.innerHTML = '';
                return;
            }

            let paginationHtml = '<nav><ul class="pagination">';

            if (data.current_page > 1) {
                paginationHtml +=
                    `<li class="page-item"><span class="page-link" onclick="performSearch(${data.current_page - 1})">« السابق</span></li>`;
            } else {
                paginationHtml += `<li class="page-item disabled"><span class="page-link">« السابق</span></li>`;
            }

            for (let i = 1; i <= data.last_page; i++) {
                if (i === 1 || i === data.last_page || (i >= data.current_page - 2 && i <= data.current_page + 2)) {
                    paginationHtml +=
                        `<li class="page-item ${i === data.current_page ? 'active' : ''}"><span class="page-link" onclick="performSearch(${i})">${i}</span></li>`;
                } else if (i === data.current_page - 3 || i === data.current_page + 3) {
                    paginationHtml += `<li class="page-item disabled"><span class="page-link">...</span></li>`;
                }
            }

            if (data.current_page < data.last_page) {
                paginationHtml +=
                    `<li class="page-item"><span class="page-link" onclick="performSearch(${data.current_page + 1})">التالي »</span></li>`;
            } else {
                paginationHtml += `<li class="page-item disabled"><span class="page-link">التالي »</span></li>`;
            }

            paginationHtml += '</ul></nav>';
            paginationContainer.innerHTML = paginationHtml;
        }

        function updateSearchStats(totalUsers, newUsersThisMonth) {
            const totalUsersElement = document.getElementById('totalUsers');
            const newUsersElement = document.getElementById('newUsers');

            if (totalUsersElement) {
                totalUsersElement.textContent = totalUsers;
            }

            if (newUsersElement) {
                newUsersElement.textContent = newUsersThisMonth;
            }
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                performSearch(1);
            }, 500);
        });

        clearSearchBtn.addEventListener('click', function() {
            searchInput.value = '';
            clearSearchBtn.classList.remove('active');
            performSearch(1);
            searchInput.focus();
        });

        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                searchInput.value = '';
                clearSearchBtn.classList.remove('active');
                performSearch(1);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            @if (isset($searchTerm) && !empty($searchTerm))
                searchInput.value = '{{ $searchTerm }}';
                clearSearchBtn.classList.add('active');
            @endif
        });

        window.performSearch = performSearch;
    </script>
</body>

</html>
