function animateOnScroll() {
    const animatedElements = document.querySelectorAll(
        ".about-feature-item, .about-image-card, .about-vision-box, .about-stats-rectangle, .package-card, .contact-item, .contact-form, .footer-column",
    );

    animatedElements.forEach((element) => {
        const elementPosition = element.getBoundingClientRect().top;
        const elementBottom = element.getBoundingClientRect().bottom;
        const screenPosition = window.innerHeight / 1.2;

        if (elementPosition < screenPosition && elementBottom > 0) {
            element.classList.remove("animate-out");
            element.classList.add("animate-in");

            if (element.closest(".packages-container")) {
                element
                    .closest(".packages-container")
                    .classList.add("animated");
            }
            if (element.closest(".contact-container")) {
                element.closest(".contact-container").classList.add("animated");
            }
        } else if (elementBottom < 0 || elementPosition > window.innerHeight) {
            element.classList.remove("animate-in");
            element.classList.add("animate-out");
        }
    });
}

// تشغيل مرة أولية
window.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        animateOnScroll();
    }, 500);
});

// تحديث الأنيميشن عند التمرير
window.addEventListener("scroll", animateOnScroll);

// تغيير شريط التنقل عند التمرير
window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");
    if (window.scrollY > 100) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

// تفعيل القائمة المتحركة للجوال
const mobileMenuBtn = document.getElementById("mobileMenuBtn");
const mobileMenu = document.getElementById("mobileMenu");
const overlay = document.getElementById("overlay");

function toggleMobileMenu() {
    mobileMenu.classList.toggle("active");
    overlay.classList.toggle("active");
    document.body.style.overflow = mobileMenu.classList.contains("active")
        ? "hidden"
        : "auto";
}

mobileMenuBtn.addEventListener("click", toggleMobileMenu);
overlay.addEventListener("click", toggleMobileMenu);

// إغلاق القائمة عند النقر على رابط
document.querySelectorAll(".mobile-menu a").forEach((link) => {
    link.addEventListener("click", function (e) {
        if (this.getAttribute("href").startsWith("#")) {
            toggleMobileMenu();

            const targetId = this.getAttribute("href");
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                document.body.classList.add("page-exit");

                setTimeout(() => {
                    targetElement.scrollIntoView({
                        behavior: "smooth",
                    });

                    setTimeout(() => {
                        document.body.classList.remove("page-exit");
                    }, 100);
                }, 300);
            }
        }
    });
});

// أنيميشن الخروج عند النقر على الروابط في التنقل الرئيسي
document.querySelectorAll('.nav-links a[href^="#"]').forEach((link) => {
    link.addEventListener("click", function (e) {
        if (this.getAttribute("href") !== "#") {
            e.preventDefault();

            const targetId = this.getAttribute("href");
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                document.body.classList.add("page-exit");

                setTimeout(() => {
                    targetElement.scrollIntoView({
                        behavior: "smooth",
                    });

                    setTimeout(() => {
                        document.body.classList.remove("page-exit");
                    }, 100);
                }, 500);
            }
        }
    });
});

// أنيميشن تدوير الأيقونات في الباقات
document.querySelectorAll(".package-card").forEach((card) => {
    card.addEventListener("mouseenter", function () {
        const icon = this.querySelector(".package-icon");
        if (icon) {
            icon.style.transform = "rotate(360deg)";
            icon.style.transition =
                "transform 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55)";
        }
    });

    card.addEventListener("mouseleave", function () {
        const icon = this.querySelector(".package-icon");
        if (icon) {
            icon.style.transform = "rotate(0deg)";
        }
    });
});

// معالجة نموذج الاتصال
document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const submitBtn = this.querySelector(".submit-btn");
    const originalText = submitBtn.textContent;

    submitBtn.textContent = "جاري الإرسال...";
    submitBtn.disabled = true;

    setTimeout(() => {
        alert("شكراً لتواصلك معنا! سنرد عليك في أقرب وقت ممكن.");
        this.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 1500);
});

// تفعيل أزرار اختيار الباقات
document.querySelectorAll(".package-cta").forEach((button) => {
    button.addEventListener("click", function () {
        const packageName =
            this.closest(".package-card").querySelector("h3").textContent;

        this.style.transform = "scale(0.95)";
        setTimeout(() => {
            this.style.transform = "";
        }, 200);

        setTimeout(() => {
            alert(
                `شكراً لاختيارك باقة "${packageName}"، سنتواصل معك قريباً لتأكيد الطلب!`,
            );
        }, 300);
    });
});

// كاونترات الأرقام المتحركة
function startCounters() {
    const clientCounter = document.getElementById("clientCounter");
    const coverageCounter = document.getElementById("coverageCounter");

    const targetClients = 25;
    const targetCoverage = 100;

    let clientCount = 0;
    let coverageCount = 0;

    const clientInterval = setInterval(() => {
        clientCount++;
        clientCounter.textContent = `+${clientCount}`;

        if (clientCount >= targetClients) {
            clearInterval(clientInterval);
        }
    }, 60);

    const coverageInterval = setInterval(() => {
        coverageCount++;
        coverageCounter.textContent = `${coverageCount}%`;

        if (coverageCount >= targetCoverage) {
            clearInterval(coverageInterval);
        }
    }, 20);
}

// تفعيل الكاونترات عند التمرير للقسم
function checkCounters() {
    const statsSection = document.querySelector(".about-stats-rectangle");
    if (statsSection) {
        const sectionPosition = statsSection.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.5;

        if (sectionPosition < screenPosition) {
            if (!window.countersStarted) {
                window.countersStarted = true;
                startCounters();
            }
        }
    }
}

// تفعيل الأنيميشن عند التحميل
setTimeout(() => {
    animateOnScroll();
}, 100);

// نظام متقدم لتتبع ظهور العناصر
let scrollTimeout;
window.addEventListener("scroll", function () {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
        animateOnScroll();
        checkCounters();
    }, 30);
});

// إضافة أنيميشن عند تحميل الصفحة
window.addEventListener("load", function () {
    const mainElements = document.querySelectorAll(
        ".hero-content, .section-title, .packages-subtitle",
    );
    mainElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.2}s`;
    });

    setTimeout(() => {
        animateOnScroll();
    }, 800);
});

// بدء الكاونترات عند التحميل
window.addEventListener("DOMContentLoaded", function () {
    // تأخير بدء الكاونترات قليلاً
    setTimeout(() => {
        checkCounters();
    }, 1000);
});

document.querySelectorAll(".policy-tab").forEach((tab) => {
    tab.addEventListener("click", function () {
        // إزالة النشاط من جميع التبويبات
        document.querySelectorAll(".policy-tab").forEach((t) => {
            t.classList.remove("active");
        });

        // إخفاء جميع الأقسام
        document.querySelectorAll(".policy-section").forEach((section) => {
            section.classList.remove("active");
        });

        // تفعيل التبويب الحالي
        this.classList.add("active");

        // إظهار القسم المرتبط
        const tabId = this.getAttribute("data-tab");
        document.getElementById(tabId).classList.add("active");

        // التمرير للقسم
        document.getElementById(tabId).scrollIntoView({
            behavior: "smooth",
            block: "start",
        });
    });
});
