<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar" id="navbar">
            <div class="container nav-container">
                <a href="#" class="logo">
                    <span>BEE</span>-STOCK
                    <div class="logo-dot"></div>
                </a>

                <ul class="nav-links">
                    <li><a href="#home">الرئيسية</a></li>
                    <li><a href="#about">من نحن</a></li>
                    <li><a href="#packages">الباقات</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                </ul>

                <button class="nav-cta">ابدأ مشروعك</button>

                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <div class="mobile-menu" id="mobileMenu">
                <ul>
                    <li><a href="#home">الرئيسية</a></li>
                    <li><a href="#about">من نحن</a></li>
                    <li><a href="#packages">الباقات</a></li>
                    <li><a href="#contact">تواصل معنا</a></li>
                    <li><button class="mobile-cta">ابدأ مشروعك</button></li>
                </ul>
            </div>

            <div class="overlay" id="overlay"></div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">
                <div class="footer-grid">
                    <!-- العمود 1: معلومات الشركة -->
                    <div class="footer-column footer-about">
                        <h4>BEE-STOCK</h4>
                        <p>شركة لوجستية سعودية نؤمن بأن نجاح عملائنا يبدأ من تنظيم سلاسل الإمداد ودقة التنفيذ. نعمل
                            كشريك فعلي مع الشركات.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>

                    <!-- العمود 2: روابط سريعة -->
                    <div class="footer-column footer-quick-links">
                        <h4>روابط سريعة</h4>
                        <ul class="footer-links">
                            <li><a href="#home"><i class="fas fa-chevron-left"></i> الرئيسية</a></li>
                            <li><a href="#about"><i class="fas fa-chevron-left"></i> من نحن</a></li>
                            <li><a href="#packages"><i class="fas fa-chevron-left"></i> الباقات</a></li>
                            <li><a href="#contact"><i class="fas fa-chevron-left"></i> تواصل معنا</a></li>
                        </ul>
                    </div>

                    <!-- العمود 3: السياسات -->
                    <div class="footer-column footer-policies">
                        <h4>السياسات</h4>
                        <ul class="policy-list">
                            <li><a href="{{ route('policies') }}"><i class="fas fa-shield-alt"></i> سياسة
                                    الخصوصية</a>
                            </li>
                            {{-- <li><a href="#"><i class="fas fa-file-contract"></i> الشروط والأحكام</a></li>
                            <li><a href="#"><i class="fas fa-handshake"></i> سياسة الإرجاع</a></li>
                            <li><a href="#"><i class="fas fa-truck"></i> سياسة الشحن والتوصيل</a></li> --}}
                        </ul>
                    </div>

                    <!-- العمود 4: الفروع -->
                    <div class="footer-column footer-branches">
                        <h4>فروعنا</h4>
                        <ul class="branch-list">
                            <!-- الفرع الرئيسي -->
                            <li class="branch-item">
                                <div class="branch-name">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>الفرع الرئيسي - الرياض</span>
                                </div>
                                <p class="branch-address">حي العليا، شارع الملك فهد، بجوار مركز العليا التجاري</p>
                            </li>

                            <!-- فرع الخرج -->
                            <li class="branch-item">
                                <div class="branch-name">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>فرع الرياض</span>
                                </div>
                                <p class="branch-address">حي النخيل، طريق الملك خالد، مجمع الخرج التجاري</p>
                            </li>
                        </ul>
                    </div>

                    <!-- العمود 5: تواصل معنا -->
                    <div class="footer-column footer-contact-info">
                        <h4>تواصل معنا</h4>
                        <div class="contact-info-item">
                            <i class="fas fa-phone"></i>
                            <div class="contact-info-text">
                                <strong>الهاتف</strong>
                                <span>+966 12 345 6789</span>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <i class="fas fa-envelope"></i>
                            <div class="contact-info-text">
                                <strong>البريد الإلكتروني</strong>
                                <span>info@stock-bi.com</span>
                            </div>
                        </div>

                        <div class="contact-info-item">
                            <i class="fas fa-clock"></i>
                            <div class="contact-info-text">
                                <strong>ساعات العمل</strong>
                                <span>الأحد - الخميس</span>
                                <span>8 صباحاً - 5 مساءً</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>© 2023 BEE-STOCK. جميع الحقوق محفوظة.</p>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
