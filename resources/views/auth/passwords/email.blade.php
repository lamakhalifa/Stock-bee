@extends('layouts.app')

@section('content')
    <div class="login-page-reset">
        <!-- صفحة طلب إعادة تعيين كلمة المرور -->
        <div class="login-page-wrapper">
            <!-- الشريط الجانبي (يظهر فقط في الأجهزة الكبيرة) -->
            <div class="login-sidebar-panel">
                <!-- تأثيرات خلفية الشريط الجانبي -->
                <div class="sidebar-pattern-overlay"></div>
                <div class="sidebar-diagonal-lines"></div>

                <!-- دوائر متحركة -->
                <div class="sidebar-floating-circles">
                    <div class="sidebar-floating-circle sidebar-circle-large"></div>
                    <div class="sidebar-floating-circle sidebar-circle-medium"></div>
                </div>

                <!-- أنيميشن الشعار الطائر -->
                <div class="logo-animation-container">
                    <div class="floating-box box-1"></div>
                    <div class="floating-box box-2"></div>
                    <div class="floating-box box-3"></div>
                </div>

                <!-- أنيميشن الخطوط المتقاطعة -->
                <div class="cross-lines-animation">
                    <div class="cross-line line-1"></div>
                    <div class="cross-line line-2"></div>
                    <div class="cross-line line-3"></div>
                </div>

                <!-- محتوى الشريط الجانبي -->
                <div class="sidebar-content-wrapper">
                    <!-- الشعار مع أنيميشن -->
                    <div class="login-logo-container">
                        <div class="login-main-logo pulse-animation">
                            <i class="fas fa-key logo-icon-bounce"></i>
                        </div>
                        <h1 class="login-main-title title-slide-in">
                            استعادة <span class="login-main-title-accent">كلمة المرور</span>
                        </h1>
                        <p class="login-description-text text-fade-in">
                            أدخل بريدك الإلكتروني لإرسال رابط استعادة كلمة المرور
                        </p>
                    </div>

                    <!-- قائمة المميزات مع أنيميشن -->
                    <div class="login-features-container">
                        <div class="login-feature-card feature-slide-in" style="animation-delay: 0.2s">
                            <div class="login-feature-icon icon-rotate">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="login-feature-details">
                                <h4>رابط آمن</h4>
                                <p>سنرسل رابطاً آمناً لبريدك الإلكتروني</p>
                            </div>
                        </div>

                        <div class="login-feature-card feature-slide-in" style="animation-delay: 0.4s">
                            <div class="login-feature-icon icon-rotate">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="login-feature-details">
                                <h4>رابط محدود الوقت</h4>
                                <p>الرابط سيكون فعالاً لمدة 60 دقيقة فقط</p>
                            </div>
                        </div>

                        <div class="login-feature-card feature-slide-in" style="animation-delay: 0.6s">
                            <div class="login-feature-icon icon-rotate">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="login-feature-details">
                                <h4>حماية وأمان</h4>
                                <p>نضمن سرية وأمان عملية الاستعادة</p>
                            </div>
                        </div>

                        <!-- أنيميشن نجمة متحركة -->
                        <div class="star-animation">
                            <div class="star star-1"></div>
                            <div class="star star-2"></div>
                            <div class="star star-3"></div>
                            <div class="star star-4"></div>
                            <div class="star star-5"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- قسم طلب إعادة تعيين كلمة المرور -->
            <div class="login-form-panel">
                <!-- زخرفة الخلفية -->
                <div class="login-background-pattern"></div>

                <!-- أنيميشن الجسيمات -->
                <div class="particles-animation">
                    <div class="particle particle-1"></div>
                    <div class="particle particle-2"></div>
                    <div class="particle particle-3"></div>
                    <div class="particle particle-4"></div>
                    <div class="particle particle-5"></div>
                </div>

                <!-- أنيميشن النقاط المتلألئة -->
                <div class="sparkle-animation">
                    <div class="sparkle sparkle-1"></div>
                    <div class="sparkle sparkle-2"></div>
                    <div class="sparkle sparkle-3"></div>
                    <div class="sparkle sparkle-4"></div>
                </div>

                <!-- محتوى طلب إعادة تعيين كلمة المرور -->
                <div class="login-form-container">
                    <!-- رأس طلب إعادة تعيين كلمة المرور مع أنيميشن -->
                    <div class="login-form-header">
                        <h2 class="title-bounce">طلب رابط الاستعادة</h2>
                        <p class="login-form-subtitle text-typing">أدخل بريدك الإلكتروني وسنرسل لك رابط الاستعادة</p>
                    </div>

                    <!-- رسالة التنبيه -->
                    <div id="resetAlertMessage" class="login-alert-message">
                        @if (session('status'))
                            <div class="login-alert-success">
                                <i class="fas fa-check-circle"></i>
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="login-alert-error shake-animation">
                                <i class="fas fa-exclamation-circle"></i>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- نموذج طلب إعادة تعيين كلمة المرور -->
                    <form method="POST" action="{{ route('password.email') }}" id="requestResetForm"
                        class="login-form-wrapper">
                        @csrf

                        <!-- حقل البريد الإلكتروني مع أنيميشن -->
                        <div class="login-form-group form-group-slide-in" style="animation-delay: 0.1s">
                            <label for="reset-email" class="login-input-label label-float">
                                <i class="fas fa-envelope icon-float"></i>
                                البريد الإلكتروني
                            </label>
                            <div class="login-input-wrapper input-float">
                                <input type="email" id="reset-email" name="email"
                                    class="login-form-input @error('email') is-invalid @enderror input-glow"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="أدخل البريد الإلكتروني المسجل لديك">
                                <div class="login-input-icon">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                            </div>
                            @error('email')
                                <span class="login-input-error shake-animation" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- زر إرسال رابط الاستعادة مع أنيميشن -->
                        <button type="submit" class="login-submit-button pulse-glow" id="sendResetLinkBtn">
                            <span class="login-button-text" id="buttonText">إرسال رابط الاستعادة</span>
                            <i class="fas fa-paper-plane login-button-icon icon-bounce"></i>
                        </button>

                        <!-- إرشادات الاستخدام -->
                        <div class="reset-instructions form-group-slide-in"
                            style="animation-delay: 0.3s; margin-top: 25px;">
                            <div class="instruction-card">
                                <div class="instruction-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="instruction-content">
                                    <h4>كيفية الاستعادة:</h4>
                                    <ol>
                                        <li>أدخل بريدك الإلكتروني المسجل</li>
                                        <li>اضغط على زر "إرسال رابط الاستعادة"</li>
                                        <li>تحقق من بريدك الإلكتروني للعثور على الرسالة</li>
                                        <li>اضغط على الرابط الموجود في الرسالة</li>
                                        <li>اتبع التعليمات لتعيين كلمة مرور جديدة</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- روابط مساعدة -->
                        <div style="text-align: center; margin-top: 30px;">
                            <div class="help-links">
                                <a href="{{ route('login') }}" class="login-forgot-link link-float">
                                    <i class="fas fa-arrow-right"></i>
                                    العودة لتسجيل الدخول
                                </a>
                                @if (Route::has('register'))
                                    <span style="color: #666; margin: 0 10px;">|</span>
                                    <a href="{{ route('register') }}" class="login-forgot-link link-float"
                                        style="animation-delay: 1.8s">
                                        <i class="fas fa-user-plus"></i>
                                        إنشاء حساب جديد
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <!-- رسالة النجاح المتحركة (تظهر عند الإرسال) -->
                    <div id="successAnimation" class="success-animation-container" style="display: none;">
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h3>تم الإرسال بنجاح!</h3>
                        <p>تم إرسال رابط استعادة كلمة المرور إلى بريدك الإلكتروني</p>
                        <div class="countdown-timer">
                            <div class="timer-circle">
                                <div class="timer-fill"></div>
                                <span class="timer-text" id="timerCount">5</span>
                            </div>
                            <p>سيتم توجيهك إلى صفحة تسجيل الدخول بعد <span id="countdown">5</span> ثوانٍ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* إعادة تعيين عام */
        .login-page-reset * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* صفحة تسجيل الدخول */
        .login-page-wrapper {
            color: #4D4D4D;
            line-height: 1.7;
            background-color: #000000;
            display: flex;
            width: 100%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /* تصميم الشريط الجانبي */
        .login-sidebar-panel {
            width: 45%;
            background: linear-gradient(135deg, #111111 0%, #000000 100%);
            padding: 60px 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* تأثيرات خلفية الشريط الجانبي */
        .sidebar-pattern-overlay {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 80% 20%, rgba(255, 221, 0, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(255, 221, 0, 0.06) 0%, transparent 50%);
            z-index: 1;
        }

        /* خطوط متقاطعة متحركة */
        .sidebar-diagonal-lines {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background:
                repeating-linear-gradient(45deg,
                    transparent,
                    transparent 15px,
                    rgba(255, 221, 0, 0.03) 15px,
                    rgba(255, 221, 0, 0.03) 30px);
            animation: diagonalMove 20s linear infinite;
            z-index: 2;
        }

        @keyframes diagonalMove {
            0% {
                background-position: 0 0;
            }

            100% {
                background-position: 60px 60px;
            }
        }

        /* دوائر متحركة */
        .sidebar-floating-circles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 3;
        }

        .sidebar-floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 221, 0, 0.03);
            animation: floatSidebarCircle 25s ease-in-out infinite;
        }

        .sidebar-circle-large {
            width: 200px;
            height: 200px;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .sidebar-circle-medium {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 60%;
            animation-delay: 8s;
            background: rgba(255, 221, 0, 0.05);
        }

        @keyframes floatSidebarCircle {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.2;
            }

            33% {
                transform: translate(30px, -20px) scale(1.1);
                opacity: 0.3;
            }

            66% {
                transform: translate(-20px, 25px) scale(0.9);
                opacity: 0.1;
            }
        }

        /* محتوى الشريط الجانبي */
        .sidebar-content-wrapper {
            position: relative;
            z-index: 10;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        /* الشعار */
        .login-logo-container {
            margin-bottom: 40px;
        }

        .login-main-logo {
            width: 120px;
            height: 120px;
            background: rgba(255, 221, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: #FFDD00;
            margin: 0 auto 20px;
            border: 3px solid rgba(255, 221, 0, 0.3);
            box-shadow: 0 0 40px rgba(255, 221, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        /* أنيميشن النبض للشعار */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 221, 0, 0.4);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 20px rgba(255, 221, 0, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 221, 0, 0);
            }
        }

        .pulse-animation {
            animation: pulse 3s infinite;
        }

        /* أنيميشن الارتداد للأيقونة */
        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .logo-icon-bounce {
            animation: bounce 3s infinite 1s;
        }

        /* العنوان */
        .login-main-title {
            font-size: 3.2rem;
            font-weight: 900;
            margin-bottom: 15px;
            color: #ffffff;
            line-height: 1.1;
        }

        .login-main-title-accent {
            color: #FFDD00;
        }

        /* أنيميشن انزلاق العنوان */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .title-slide-in {
            animation: slideInRight 0.8s ease-out forwards;
            opacity: 0;
        }

        /* أنيميشن الارتداد للعنوان */
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }

            50% {
                opacity: 1;
                transform: scale(1.05);
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }

        .title-bounce {
            animation: bounceIn 1s ease-out;
        }

        /* الوصف */
        .login-description-text {
            font-size: 1.3rem;
            color: #CCCCCC;
            margin-bottom: 40px;
            line-height: 1.8;
            max-width: 450px;
            margin-right: auto;
            margin-left: auto;
        }

        /* أنيميشن التلاشي للنص */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .text-fade-in {
            animation: fadeIn 1s ease-out 0.8s forwards;
            opacity: 0;
        }

        /* أنيميشن الكتابة للنصوص */
        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink {

            0%,
            100% {
                border-color: transparent;
            }

            50% {
                border-color: #FFDD00;
            }
        }

        .text-typing {
            overflow: hidden;
            white-space: nowrap;
            border-right: 3px solid #FFDD00;
            width: 0;
            animation:
                typing 3s steps(40, end) forwards,
                blink 0.75s step-end infinite;
            animation-delay: 0.5s;
        }

        /* المميزات */
        .login-features-container {
            text-align: right;
            margin-top: 40px;
            position: relative;
        }

        .login-feature-card {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            border-right: 4px solid #FFDD00;
            transition: all 0.3s ease;
        }

        .feature-slide-in {
            animation: slideInRight 0.6s ease-out forwards;
            opacity: 0;
        }

        .login-feature-card:hover {
            background: rgba(255, 221, 0, 0.05);
            transform: translateX(-5px);
        }

        .login-feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 221, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #FFDD00;
            flex-shrink: 0;
        }

        /* أنيميشن الدوران للأيقونات */
        @keyframes rotateIn {
            from {
                opacity: 0;
                transform: rotate(-180deg) scale(0.5);
            }

            to {
                opacity: 1;
                transform: rotate(0) scale(1);
            }
        }

        .icon-rotate {
            animation: rotateIn 0.8s ease-out;
        }

        .login-feature-details h4 {
            color: #FFFFFF;
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .login-feature-details p {
            color: #AAAAAA;
            font-size: 1rem;
        }

        /* قسم طلب إعادة تعيين كلمة المرور */
        .login-form-panel {
            width: 55%;
            background: #FFFFFF;
            padding: 60px 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* زخرفة الخلفية */
        .login-background-pattern {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 90% 10%, rgba(255, 221, 0, 0.02) 0%, transparent 50%),
                radial-gradient(circle at 10% 90%, rgba(255, 221, 0, 0.02) 0%, transparent 50%);
            z-index: 1;
        }

        /* محتوى طلب إعادة تعيين كلمة المرور */
        .login-form-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
        }

        /* رأس طلب إعادة تعيين كلمة المرور */
        .login-form-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .login-form-header h2 {
            color: #000000;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .login-form-subtitle {
            color: #666666;
            font-size: 1.2rem;
        }

        /* النموذج */
        .login-form-wrapper {
            margin-bottom: 30px;
        }

        /* مجموعات الحقول */
        .login-form-group {
            margin-bottom: 30px;
        }

        .form-group-slide-in {
            animation: slideInRight 0.6s ease-out forwards;
            opacity: 0;
        }

        .login-input-label {
            display: block;
            margin-bottom: 10px;
            color: #000000;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* أنيميشن الطفو للعناصر */
        @keyframes floatUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .label-float {
            animation: floatUp 0.5s ease-out forwards;
            opacity: 0;
        }

        .input-float {
            animation: floatUp 0.5s ease-out 0.2s forwards;
            opacity: 0;
        }

        .icon-float {
            animation: floatUp 0.5s ease-out forwards;
            opacity: 0;
        }

        .login-input-label i {
            color: #FFDD00;
            font-size: 1.2rem;
        }

        .login-input-wrapper {
            position: relative;
        }

        .login-form-input {
            width: 100%;
            padding: 16px 20px;
            font-size: 1.1rem;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background: #F8F8F8;
            color: #000000;
            transition: all 0.3s ease;
            padding-right: 55px;
        }

        /* أنيميشن التوهج للحقول */
        @keyframes glowPulse {
            0% {
                box-shadow: 0 0 5px rgba(255, 221, 0, 0.3);
            }

            50% {
                box-shadow: 0 0 20px rgba(255, 221, 0, 0.6);
            }

            100% {
                box-shadow: 0 0 5px rgba(255, 221, 0, 0.3);
            }
        }

        .input-glow:focus {
            animation: glowPulse 2s infinite;
        }

        .login-form-input:focus {
            outline: none;
            border-color: #FFDD00;
            background: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(255, 221, 0, 0.15);
        }

        .login-input-icon {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #666666;
            font-size: 1.3rem;
        }

        /* إرشادات الاستخدام */
        .reset-instructions {
            background: #f9f9f9;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .instruction-card {
            display: flex;
            gap: 15px;
        }

        .instruction-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 221, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #FFDD00;
            flex-shrink: 0;
        }

        .instruction-content h4 {
            color: #000000;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .instruction-content ol {
            padding-right: 20px;
            margin: 0;
        }

        .instruction-content li {
            color: #666;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        /* زر إرسال رابط الاستعادة */
        .login-submit-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(90deg, #000000, #111111);
            color: #FFFFFF;
            border: none;
            border-radius: 12px;
            font-size: 1.3rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .pulse-glow {
            animation: glowPulse 3s infinite;
        }

        .pulse-glow:hover {
            animation: glowPulse 1s infinite;
        }

        .login-submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #FFDD00, #FFBB00);
            z-index: 1;
            transform: translateX(-100%);
            transition: transform 0.5s ease;
        }

        .login-submit-button:hover::before {
            transform: translateX(0);
        }

        .login-button-text {
            position: relative;
            z-index: 2;
        }

        .login-button-icon {
            position: relative;
            z-index: 2;
        }

        .icon-bounce {
            animation: bounce 2s infinite;
        }

        .login-submit-button:hover {
            color: #000000;
            box-shadow: 0 10px 25px rgba(255, 221, 0, 0.3);
            transform: translateY(-3px);
        }

        /* زر التحميل أثناء الإرسال */
        .login-submit-button.sending {
            background: linear-gradient(90deg, #666, #888);
        }

        .login-submit-button.sending .login-button-icon {
            animation: spin 1s linear infinite;
        }

        /* روابط المساعدة */
        .help-links {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .login-forgot-link {
            display: inline-block;
            text-align: center;
            color: #666666;
            text-decoration: none;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding-bottom: 3px;
        }

        .link-float {
            animation: floatUp 0.5s ease-out forwards;
            opacity: 0;
        }

        /* أنيميشن الدوران للأيقونات */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .icon-spin:hover {
            animation: spin 1s linear;
        }

        .login-forgot-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 2px;
            background: #FFDD00;
            transition: width 0.3s ease;
        }

        .login-forgot-link:hover {
            color: #000000;
        }

        .login-forgot-link:hover::after {
            width: 100%;
        }

        /* تأثير إضافي للنموذج */
        .login-form-wrapper::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            background: rgba(255, 221, 0, 0.05);
            border-radius: 50%;
            z-index: -1;
        }

        /* رسائل التنبيه */
        .login-alert-message {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            display: none;
            align-items: center;
            gap: 15px;
            animation: alertFadeIn 0.5s ease;
        }

        @keyframes alertFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* أنيميشن الاهتزاز للرسائل الخطأ */
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        .shake-animation {
            animation: shake 0.5s ease-in-out;
        }

        .login-alert-error {
            background: rgba(220, 53, 69, 0.1);
            border: 2px solid rgba(220, 53, 69, 0.3);
            color: #dc3545;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 20px;
            border-radius: 10px;
        }

        .login-alert-success {
            background: rgba(40, 167, 69, 0.1);
            border: 2px solid rgba(40, 167, 69, 0.3);
            color: #28a745;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 20px;
            border-radius: 10px;
        }

        .login-input-error {
            color: #dc3545;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }

        /* أنيميشن النجاح */
        .success-animation-container {
            text-align: center;
            padding: 40px 20px;
            animation: fadeIn 0.8s ease-out;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: #28a745;
            margin: 0 auto 20px;
            animation: successPulse 1.5s infinite;
        }

        @keyframes successPulse {

            0%,
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.4);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 20px rgba(40, 167, 69, 0);
            }
        }

        .success-animation-container h3 {
            color: #000000;
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .success-animation-container p {
            color: #666666;
            margin-bottom: 30px;
        }

        /* عداد الوقت */
        .countdown-timer {
            margin-top: 30px;
        }

        .timer-circle {
            width: 80px;
            height: 80px;
            position: relative;
            margin: 0 auto 15px;
        }

        .timer-fill {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: conic-gradient(#28a745 0%, #e0e0e0 0%);
            transition: background 1s linear;
        }

        .timer-text {
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
            font-size: 1.5rem;
            font-weight: 700;
            color: #28a745;
        }

        /* أنيميشن للنجوم */
        .star {
            position: absolute;
            background: #FFDD00;
            border-radius: 50%;
            animation: twinkle 2s infinite;
        }

        .star-1 {
            width: 3px;
            height: 3px;
            top: 20%;
            right: 15%;
            animation-delay: 0s;
        }

        .star-2 {
            width: 4px;
            height: 4px;
            top: 40%;
            right: 30%;
            animation-delay: 0.5s;
        }

        .star-3 {
            width: 2px;
            height: 2px;
            top: 60%;
            right: 45%;
            animation-delay: 1s;
        }

        .star-4 {
            width: 3px;
            height: 3px;
            top: 30%;
            right: 60%;
            animation-delay: 1.5s;
        }

        .star-5 {
            width: 4px;
            height: 4px;
            top: 50%;
            right: 75%;
            animation-delay: 2s;
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 0.2;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.2);
            }
        }

        /* أنيميشن للجسيمات */
        .particle {
            position: absolute;
            background: rgba(255, 221, 0, 0.1);
            border-radius: 50%;
            animation: floatParticle 15s infinite linear;
        }

        .particle-1 {
            width: 8px;
            height: 8px;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .particle-2 {
            width: 6px;
            height: 6px;
            top: 30%;
            right: 25%;
            animation-delay: 3s;
        }

        .particle-3 {
            width: 10px;
            height: 10px;
            top: 50%;
            right: 40%;
            animation-delay: 6s;
        }

        .particle-4 {
            width: 7px;
            height: 7px;
            top: 70%;
            right: 55%;
            animation-delay: 9s;
        }

        .particle-5 {
            width: 5px;
            height: 5px;
            top: 90%;
            right: 70%;
            animation-delay: 12s;
        }

        @keyframes floatParticle {
            0% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 0.5;
            }

            90% {
                opacity: 0.5;
            }

            100% {
                transform: translate(100px, -100px) rotate(180deg);
                opacity: 0;
            }
        }

        /* أنيميشن للنقاط المتلألئة */
        .sparkle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #FFDD00;
            border-radius: 50%;
            animation: sparkle 1.5s infinite;
            box-shadow: 0 0 10px #FFDD00;
        }

        .sparkle-1 {
            top: 20%;
            right: 20%;
            animation-delay: 0s;
        }

        .sparkle-2 {
            top: 40%;
            right: 40%;
            animation-delay: 0.3s;
        }

        .sparkle-3 {
            top: 60%;
            right: 60%;
            animation-delay: 0.6s;
        }

        .sparkle-4 {
            top: 80%;
            right: 80%;
            animation-delay: 0.9s;
        }

        @keyframes sparkle {

            0%,
            100% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* أنيميشن للمكعبات الطائرة */
        .floating-box {
            position: absolute;
            background: rgba(255, 221, 0, 0.05);
            border: 1px solid rgba(255, 221, 0, 0.1);
            animation: floatBox 20s infinite linear;
        }

        .box-1 {
            width: 30px;
            height: 30px;
            top: 15%;
            right: 25%;
            animation-delay: 0s;
        }

        .box-2 {
            width: 20px;
            height: 20px;
            top: 45%;
            right: 65%;
            animation-delay: 7s;
        }

        .box-3 {
            width: 25px;
            height: 25px;
            top: 75%;
            right: 35%;
            animation-delay: 14s;
        }

        @keyframes floatBox {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            25% {
                transform: translate(50px, -30px) rotate(90deg);
            }

            50% {
                transform: translate(100px, 20px) rotate(180deg);
            }

            75% {
                transform: translate(50px, 50px) rotate(270deg);
            }

            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        /* أنيميشن للخطوط المتقاطعة */
        .cross-line {
            position: absolute;
            background: linear-gradient(90deg, transparent, rgba(255, 221, 0, 0.2), transparent);
            animation: crossLine 8s infinite linear;
        }

        .line-1 {
            width: 100px;
            height: 1px;
            top: 25%;
            right: 0;
            animation-delay: 0s;
        }

        .line-2 {
            width: 150px;
            height: 1px;
            top: 50%;
            right: 0;
            animation-delay: 2s;
        }

        .line-3 {
            width: 200px;
            height: 1px;
            top: 75%;
            right: 0;
            animation-delay: 4s;
        }

        @keyframes crossLine {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        /* تصميم متجاوب - للأجهزة الصغيرة */
        @media (max-width: 768px) {
            .login-page-wrapper {
                display: block;
            }

            .login-sidebar-panel {
                display: none;
            }

            .login-form-panel {
                width: 100%;
                min-height: 100vh;
                padding: 40px 25px;
                background: #000000;
            }

            .login-form-container {
                background: #FFFFFF;
                padding: 40px 30px;
                border-radius: 20px;
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
                max-width: 400px;
                margin: 0 auto;
            }

            .login-background-pattern,
            .particles-animation,
            .sparkle-animation {
                display: none;
            }

            .login-form-header h2 {
                font-size: 2rem;
                color: #000000;
            }

            .login-form-subtitle {
                color: #666666;
                font-size: 1.1rem;
            }

            .help-links {
                flex-direction: column;
                gap: 10px;
            }

            .help-links span {
                display: none;
            }

            .instruction-card {
                flex-direction: column;
                text-align: center;
            }

            .instruction-icon {
                margin: 0 auto;
            }
        }

        /* للأجهزة المتوسطة والكبيرة */
        @media (min-width: 769px) and (max-width: 1200px) {

            .login-sidebar-panel,
            .login-form-panel {
                width: 50%;
            }

            .login-main-title {
                font-size: 2.8rem;
            }

            .login-form-header h2 {
                font-size: 2.2rem;
            }

            .login-main-logo {
                width: 100px;
                height: 100px;
                font-size: 2.8rem;
            }
        }

        @media (max-width: 576px) {
            .login-form-panel {
                padding: 30px 20px;
            }

            .login-form-container {
                padding: 30px 25px;
            }

            .login-form-header h2 {
                font-size: 1.8rem;
            }

            .login-form-input {
                padding: 14px;
                padding-right: 50px;
            }

            .login-submit-button {
                padding: 16px;
                font-size: 1.1rem;
            }

            .reset-instructions {
                padding: 15px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sendResetLinkBtn = document.getElementById('sendResetLinkBtn');
            const buttonText = document.getElementById('buttonText');
            const requestResetForm = document.getElementById('requestResetForm');
            const successAnimation = document.getElementById('successAnimation');

            // إظهار رسائل التنبيه إذا وجدت
            const errorAlert = document.querySelector('.login-alert-error');
            const successAlert = document.querySelector('.login-alert-success');

            if (errorAlert || successAlert) {
                document.getElementById('resetAlertMessage').style.display = 'flex';
            }

            // إذا كان هناك رسالة نجاح، اعرض رسالة النجاح المتحركة
            if (successAlert) {
                requestResetForm.style.display = 'none';
                successAnimation.style.display = 'block';
                startCountdown();
            }

            // عند إرسال النموذج
            if (requestResetForm) {
                requestResetForm.addEventListener('submit', function(e) {
                    // التحقق من صحة البريد الإلكتروني
                    const emailField = document.getElementById('reset-email');
                    const emailValue = emailField.value.trim();

                    if (!isValidEmail(emailValue)) {
                        e.preventDefault();
                        showError('يرجى إدخال بريد إلكتروني صحيح');
                        return;
                    }

                    // عرض حالة التحميل
                    if (sendResetLinkBtn) {
                        sendResetLinkBtn.classList.add('sending');
                        sendResetLinkBtn.disabled = true;
                        buttonText.textContent = 'جاري الإرسال...';
                    }
                });
            }

            // تأثيرات إضافية عند التركيز على الحقل
            const emailField = document.getElementById('reset-email');
            if (emailField) {
                emailField.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-3px)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });

                emailField.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';

                    // التحقق من صحة البريد الإلكتروني عند الخروج
                    if (this.value.trim() !== '' && !isValidEmail(this.value.trim())) {
                        showError('يرجى إدخال بريد إلكتروني صحيح');
                    }
                });
            }

            // دالة التحقق من صحة البريد الإلكتروني
            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // دالة عرض خطأ
            function showError(message) {
                const alertDiv = document.getElementById('resetAlertMessage');
                alertDiv.innerHTML = `
                <div class="login-alert-error shake-animation">
                    <i class="fas fa-exclamation-circle"></i>
                    ${message}
                </div>
            `;
                alertDiv.style.display = 'flex';

                // إخفاء الرسالة بعد 5 ثوان
                setTimeout(() => {
                    alertDiv.style.display = 'none';
                }, 5000);
            }

            // دالة عداد الوقت التنازلي
            function startCountdown() {
                let countdown = 5;
                const countdownElement = document.getElementById('countdown');
                const timerCount = document.getElementById('timerCount');
                const timerFill = document.querySelector('.timer-fill');

                const countdownInterval = setInterval(() => {
                    countdown--;
                    countdownElement.textContent = countdown;
                    timerCount.textContent = countdown;

                    // تحديث دائرة التقدم
                    const percentage = 100 - ((countdown / 5) * 100);
                    timerFill.style.background = `conic-gradient(#28a745 ${percentage}%, #e0e0e0 0%)`;

                    if (countdown <= 0) {
                        clearInterval(countdownInterval);
                        window.location.href = "{{ route('login') }}";
                    }
                }, 1000);
            }

            // تأثيرات إضافية عند تحميل الصفحة
            setTimeout(() => {
                if (emailField) {
                    emailField.focus();
                }
            }, 1000);
        });
    </script>
@endsection
