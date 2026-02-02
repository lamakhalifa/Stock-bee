@extends('layouts.app')

@section('content')
    <div class="login-page-reset">
        <!-- صفحة تسجيل الدخول -->
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
                            <i class="fas fa-warehouse logo-icon-bounce"></i>
                        </div>
                        <h1 class="login-main-title title-slide-in">
                            STOCK-<span class="login-main-title-accent">BEE</span>
                        </h1>
                        <p class="login-description-text text-fade-in">
                            نظام إدارة المخازن والخدمات اللوجستية المتكامل
                        </p>
                    </div>

                    <!-- قائمة المميزات مع أنيميشن -->
                    <div class="login-features-container">
                        <div class="login-feature-card feature-slide-in" style="animation-delay: 0.2s">
                            <div class="login-feature-icon icon-rotate">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="login-feature-details">
                                <h4>خدمات لوجستية متكاملة</h4>
                                <p>نظام متكامل للتوصيل والتخزين والتغليف</p>
                            </div>
                        </div>

                        <div class="login-feature-card feature-slide-in" style="animation-delay: 0.4s">
                            <div class="login-feature-icon icon-rotate">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="login-feature-details">
                                <h4>أمان وحماية عالية</h4>
                                <p>نضمن خصوصية وأمان بياناتك في كل خطوة</p>
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

            <!-- قسم تسجيل الدخول -->
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

                <!-- محتوى تسجيل الدخول -->
                <div class="login-form-container">
                    <!-- رأس تسجيل الدخول مع أنيميشن -->
                    <div class="login-form-header">
                        <h2 class="title-bounce">مرحباً بعودتك</h2>
                        <p class="login-form-subtitle text-typing">أدخل بيانات الدخول للوصول إلى حسابك</p>
                    </div>

                    <!-- رسالة التنبيه -->
                    <div id="loginAlertMessage" class="login-alert-message">
                        @if ($errors->any())
                            <div class="login-alert-error shake-animation">
                                <i class="fas fa-exclamation-circle"></i>
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- نموذج تسجيل الدخول -->
                    <form method="POST" action="{{ route('login') }}" id="loginForm" class="login-form-wrapper">
                        @csrf

                        <!-- حقل البريد الإلكتروني مع أنيميشن -->
                        <div class="login-form-group form-group-slide-in" style="animation-delay: 0.1s">
                            <label for="email" class="login-input-label label-float">
                                <i class="fas fa-envelope icon-float"></i>
                                البريد الإلكتروني
                            </label>
                            <div class="login-input-wrapper input-float">
                                <input type="email" id="email" name="email"
                                    class="login-form-input @error('email') is-invalid @enderror input-glow"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="أدخل البريد الإلكتروني">
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

                        <!-- حقل كلمة المرور مع أنيميشن -->
                        <div class="login-form-group form-group-slide-in" style="animation-delay: 0.3s">
                            <label for="password" class="login-input-label label-float">
                                <i class="fas fa-lock icon-float"></i>
                                كلمة المرور
                            </label>
                            <div class="login-input-wrapper input-float">
                                <input type="password" id="password" name="password"
                                    class="login-form-input @error('password') is-invalid @enderror input-glow" required
                                    autocomplete="current-password" placeholder="أدخل كلمة المرور">
                                <button type="button" class="login-password-toggle" id="loginPasswordToggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="login-input-icon">
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>
                            @error('password')
                                <span class="login-input-error shake-animation" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- زر تسجيل الدخول مع أنيميشن -->
                        <button type="submit" class="login-submit-button pulse-glow">
                            <span class="login-button-text">تسجيل الدخول</span>
                            <i class="fas fa-sign-in-alt login-button-icon icon-bounce"></i>
                        </button>

                        <!-- رابط نسيت كلمة المرور -->
                        <div style="text-align: center; margin-top: 20px;">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="login-forgot-link link-float"
                                    id="loginForgotPassword">
                                    <i class="fas fa-question-circle icon-spin"></i>
                                    نسيت كلمة المرور؟
                                </a>
                            @endif
                        </div>
                    </form>

                    <!-- رابط إنشاء حساب جديد -->
                    @if (Route::has('register'))
                        <div class="login-register-section">
                            ليس لديك حساب؟
                            <a href="{{ route('register') }}" class="login-register-link link-slide">
                                <span class="link-text">إنشاء حساب جديد</span>
                                <i class="fas fa-arrow-left icon-slide"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        // التحكم في إظهار وإخفاء كلمة المرور
        document.addEventListener('DOMContentLoaded', function() {
            const loginPasswordToggle = document.getElementById('loginPasswordToggle');
            const loginPasswordField = document.getElementById('password');

            if (loginPasswordToggle && loginPasswordField) {
                loginPasswordToggle.addEventListener('click', function() {
                    const type = loginPasswordField.getAttribute('type') === 'password' ? 'text' :
                        'password';
                    loginPasswordField.setAttribute('type', type);

                    // تغيير الأيقونة
                    this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' :
                        '<i class="fas fa-eye-slash"></i>';
                });
            }

            // إظهار رسالة الخطأ إذا وجدت
            const errorAlert = document.querySelector('.login-alert-error');
            if (errorAlert) {
                errorAlert.parentElement.style.display = 'flex';
            }
        });
    </script>
@endsection
