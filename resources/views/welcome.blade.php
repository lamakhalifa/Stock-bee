@extends('layouts.app')

@section('content')
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <span class="hero-subtitle">شركاؤك في كل خطوة</span>
                <h1 class="hero-title">عنوانك الأول للعناية <span>بمشروعك</span></h1>
                <p class="hero-description">شركة لوجستية سعودية نؤمن بأن نجاح عملائنا يبدأ من تنظيم سلاسل الإمداد ودقة
                    التنفيذ. نعمل كشريك فعلي مع الشركات، وليس مجرد مزود خدمة، ونسعى لأن نكون السند اللوجستي الذي يعتمدون
                    عليه في كل مرحلة.</p>

                <div class="hero-buttons">
                    <a href="#packages" class="btn btn-primary">اكتشف باقاتنا</a>
                    <a href="#contact" class="btn btn-secondary">تواصل معنا</a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم من نحن -->
    <section class="about-section" id="about">
        <!-- الخلفية المتحركة -->
        <div class="about-bg">
            <div class="about-grid-lines"></div>
            <div class="about-moving-dots">
                <div class="about-minimal-dot"></div>
                <div class="about-minimal-dot"></div>
                <div class="about-minimal-dot"></div>
                <div class="about-minimal-dot"></div>
            </div>
        </div>

        <div class="container">
            <div class="section-title">
                <h2>من نحن</h2>
                <p class="section-subtitle">شركة لوجستية سعودية نؤمن بأن نجاح عملائنا يبدأ من تنظيم سلاسل الإمداد ودقة
                    التنفيذ. نعمل كشريك فعلي مع الشركات، وليس مجرد مزود خدمة.</p>
            </div>

            <div class="about-content-new">
                <div class="about-text-new">
                    <h3>شركاؤك في كل خطوة</h3>
                    <p>نؤمن بأن نجاح عملائنا يبدأ من تنظيم سلاسل الإمداد ودقة التنفيذ. نعمل كشريك فعلي مع الشركات وليس مجرد
                        مزود خدمة ونسعى لأن نكون السند اللوجستي الذي يعتمدون عليه في كل مرحلة.</p>
                    <p>نعمل بروح الفريق الواحد مع عملائنا، نفهم احتياجاتهم، ونقدم الحلول التي تتجاوز التوقعات. خبرتنا في
                        السوق السعودي تمتد لأكثر من 10 سنوات، مما يمكننا من تقديم حلول تلائم البيئة المحلية.</p>

                    <!-- المزايا الثلاث فقط -->
                    <div class="about-features-list">
                        <div class="about-feature-item">
                            <div class="about-feature-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="about-feature-content">
                                <h4>سرعة التنفيذ</h4>
                                <p>نضمن توصيل شحناتك في الوقت المحدد مع تتبع مباشر</p>
                            </div>
                        </div>

                        <div class="about-feature-item">
                            <div class="about-feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="about-feature-content">
                                <h4>أمان كامل</h4>
                                <p>نظام تخزين وتوصيل آمن مع تأمين على جميع الشحنات</p>
                            </div>
                        </div>

                        <div class="about-feature-item">
                            <div class="about-feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="about-feature-content">
                                <h4>دعم فني متخصص</h4>
                                <p>فريق دعم على مدار الساعة لحل أي تحديات لوجستية</p>
                            </div>
                        </div>
                    </div>

                    <div class="about-vision-box">
                        <h4><i class="fas fa-bullseye"></i> رؤيتنا</h4>
                        <p>نعتني بتفاصيل مشروعك كأنه مشروعنا. ونلتزم بالجودة والوقت. ونبني علاقات طويلة المدى قائمة على
                            الثقة لأن نجاحك هو جزء من نجاحنا. نسعى لنكون الشريك اللوجستي الأول للشركات الناشئة والمتوسطة في
                            السعودية.</p>
                    </div>
                </div>

                <!-- 3 صور فقط -->
                <div class="about-visual-column">
                    <div class="about-image-card">
                        <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="مستودعات لوجستية">
                        <div class="about-image-overlay">
                            <h5>مستودعات ذكية</h5>
                            <p>تخزين آمن ومنظم</p>
                        </div>
                    </div>

                    <div class="about-image-card">
                        <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="فريق العمل">
                        <div class="about-image-overlay">
                            <h5>فريق متخصص</h5>
                            <p>خبرة لأكثر من 10 سنوات</p>
                        </div>
                    </div>

                    <div class="about-image-card">
                        <img src="https://images.unsplash.com/photo-1542744095-fcf48d80b0fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="عمليات لوجستية">
                        <div class="about-image-overlay">
                            <h5>عمليات متكاملة</h5>
                            <p>من التخزين إلى التوصيل</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- إحصائيات الشركة مع كاونترات -->
            <div class="about-stats-rectangle">
                <div class="about-stats-grid">
                    <div class="about-stat-item">
                        <i class="fas fa-handshake about-stat-icon"></i>
                        <span class="about-stat-number" id="clientCounter">0</span>
                        <span class="about-stat-label">عميل موثوق</span>
                    </div>

                    <div class="about-stat-item">
                        <i class="fas fa-map-marked-alt about-stat-icon"></i>
                        <span class="about-stat-number" id="coverageCounter">0</span>
                        <span class="about-stat-label">تغطية الرياض</span>
                    </div>

                    <div class="about-stat-item">
                        <i class="fas fa-building about-stat-icon"></i>
                        <span class="about-stat-number">مصممة</span>
                        <span class="about-stat-label">للشركات السعودية</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الباقات -->
    <section class="packages" id="packages">
        <!-- خلفية واضحة ومميزة -->
        <div class="packages-bg">
            <!-- شبكة خطوط متقاطعة واضحة -->
            <div class="packages-grid"></div>

            <!-- دوائر ذهبية متحركة واضحة -->
            <div class="packages-circles">
                <div class="package-circle"></div>
                <div class="package-circle"></div>
                <div class="package-circle"></div>
                <div class="package-circle"></div>
            </div>
        </div>

        <div class="container">
            <div class="section-title">
                <h2>باقاتنا</h2>
            </div>

            <p class="packages-subtitle">كل باقاتنا مصممة لتكون سنداً حقيقياً لمشروعك</p>

            <div class="packages-container">
                <!-- الباقة الأساسية -->
                <div class="package-card">
                    <div class="package-header">
                        <h3>الأساسية</h3>
                        <p class="package-description">الحل الأمثل للمشاريع الصغيرة</p>
                        <div class="package-price">775 <span>ريال</span></div>
                        <p class="package-period">شهرياً</p>
                    </div>
                    <div class="package-divider"></div>
                    <div class="package-body">
                        <ul class="package-features">
                            <li>خدمة من اختيارك</li>
                            <li>توصيل سريع</li>
                            <li>تخزين آمن</li>
                            <li>دعم عبر البريد الإلكتروني</li>
                            <li>تتبع أساسي للشحنات</li>
                        </ul>
                        <button class="package-cta">
                            <i class="fas fa-shopping-cart"></i>
                            اختر الباقة
                        </button>
                    </div>
                </div>

                <!-- الباقة المتقدمة -->
                <div class="package-card featured">
                    <div class="featured-badge">الأكثر طلباً</div>
                    <div class="package-header">
                        <h3>المتقدمة</h3>
                        <p class="package-description">للمشاريع المتوسطة والمتنامية</p>
                        <div class="package-price">1,280 <span>ريال</span></div>
                        <p class="package-period">شهرياً</p>
                    </div>
                    <div class="package-divider"></div>
                    <div class="package-body">
                        <ul class="package-features">
                            <li>خدمتين من اختيارك</li>
                            <li>كل مزايا الباقة الأساسية</li>
                            <li>دعم فني متخصص</li>
                            <li>سعة أكبر في استلام الطلبات</li>
                            <li>مدير مخصص للمشروع</li>
                            <li>تتبع الطلبات في الوقت الفعلي</li>
                            <li>تقارير أداء أسبوعية</li>
                        </ul>
                        <button class="package-cta">
                            <i class="fas fa-crown"></i>
                            اختر الباقة
                        </button>
                    </div>
                </div>

                <!-- الباقة الكاملة -->
                <div class="package-card">
                    <div class="package-header">
                        <h3>الكاملة</h3>
                        <p class="package-description">الحل المتكامل للمشاريع الكبيرة</p>
                        <div class="package-price">1,800 <span>ريال</span></div>
                        <p class="package-period">شهرياً</p>
                    </div>
                    <div class="package-divider"></div>
                    <div class="package-body">
                        <ul class="package-features">
                            <li>جميع الخدمات</li>
                            <li>كل مزايا الباقات السابقة</li>
                            <li>تقارير شهرية مختصرة</li>
                            <li>دعم على مدار الساعة</li>
                            <li>تحليل أداء شهري</li>
                            <li>استشارات لوجستية شهرية</li>
                            <li>أولوية في المعالجة</li>
                        </ul>
                        <button class="package-cta">
                            <i class="fas fa-rocket"></i>
                            اختر الباقة
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم التواصل -->
    <section class="contact" id="contact">
        <div class="container">
            <div class="section-title">
                <h2>تواصل معنا</h2>
            </div>

            <div class="contact-container">
                <div class="contact-info">
                    <h3>كن على تواصل مع فريقنا</h3>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>العنوان</h4>
                            <p>المملكة العربية السعودية، الرياض</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>الهاتف</h4>
                            <p>+966 549892127</p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>البريد الإلكتروني</h4>
                            <p> stockbee.team@outlook.com</p>
                        </div>
                    </div>

                    {{-- <div class="social-links">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div> --}}
                </div>

                <div class="contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <label class="form-label">الاسم الكامل</label>
                            <input type="text" class="form-input" placeholder="أدخل اسمك الكامل" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-input" placeholder="example@domain.com" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-input" placeholder="+966 5X XXX XXXX" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">الشركة (اختياري)</label>
                            <input type="text" class="form-input" placeholder="اسم شركتك">
                        </div>

                        <div class="form-group">
                            <label class="form-label">الرسالة</label>
                            <textarea class="form-input" placeholder="كيف يمكننا مساعدتك؟" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">إرسال الرسالة</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
