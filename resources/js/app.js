// ==========================================
// وظائف الأنيميشن عند التمرير
// ==========================================
function animateOnScroll() {
    const animatedElements = document.querySelectorAll(
        ".about-feature-item, .about-image-card, .about-vision-box, .about-stats-rectangle, .package-card, .contact-item, .contact-form, .footer-column",
    );

    animatedElements.forEach((element) => {
        const rect = element.getBoundingClientRect();
        const elementTop = rect.top;
        const elementBottom = rect.bottom;
        const screenPosition = window.innerHeight / 1.2;

        if (elementTop < screenPosition && elementBottom > 0) {
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
        } else if (elementBottom < 0 || elementTop > window.innerHeight) {
            element.classList.remove("animate-in");
            element.classList.add("animate-out");
        }
    });
}

// ==========================================
// كاونترات الأرقام المتحركة
// ==========================================
function startCounters() {
    const clientCounter = document.getElementById("clientCounter");
    const coverageCounter = document.getElementById("coverageCounter");

    if (!clientCounter || !coverageCounter) return;

    const targetClients = 25;
    const targetCoverage = 100;
    let clientCount = 0;
    let coverageCount = 0;

    const clientInterval = setInterval(() => {
        clientCount++;
        clientCounter.textContent = `+${clientCount}`;
        if (clientCount >= targetClients) clearInterval(clientInterval);
    }, 60);

    const coverageInterval = setInterval(() => {
        coverageCount++;
        coverageCounter.textContent = `${coverageCount}%`;
        if (coverageCount >= targetCoverage) clearInterval(coverageInterval);
    }, 20);
}

function checkCounters() {
    const statsSection = document.querySelector(".about-stats-rectangle");
    if (!statsSection || window.countersStarted) return;

    const sectionTop = statsSection.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.5;

    if (sectionTop < screenPosition) {
        window.countersStarted = true;
        startCounters();
    }
}

// ==========================================
// تغيير شريط التنقل عند التمرير
// ==========================================
const navbar = document.getElementById("navbar");
window.addEventListener("scroll", () => {
    if (!navbar) return;
    if (window.scrollY > 100) navbar.classList.add("scrolled");
    else navbar.classList.remove("scrolled");
});

// ==========================================
// القائمة المتحركة للجوال
// ==========================================
const mobileMenuBtn = document.getElementById("mobileMenuBtn");
const mobileMenu = document.getElementById("mobileMenu");
const overlay = document.getElementById("overlay");

function toggleMobileMenu() {
    if (!mobileMenu || !overlay) return;
    mobileMenu.classList.toggle("active");
    overlay.classList.toggle("active");
    document.body.style.overflow = mobileMenu.classList.contains("active")
        ? "hidden"
        : "auto";
}

if (mobileMenuBtn && mobileMenu && overlay) {
    mobileMenuBtn.addEventListener("click", toggleMobileMenu);
    overlay.addEventListener("click", toggleMobileMenu);

    document.querySelectorAll(".mobile-menu a").forEach((link) => {
        link.addEventListener("click", function () {
            const href = this.getAttribute("href");
            if (!href.startsWith("#")) return;

            toggleMobileMenu();
            const target = document.querySelector(href);
            if (target) target.scrollIntoView({ behavior: "smooth" });
        });
    });
}

// ==========================================
// التبويبات - policy tabs
// ==========================================
document.addEventListener("DOMContentLoaded", function () {
    // ===== Policy Tabs Click =====
    document.querySelectorAll(".policy-tab").forEach((tab) => {
        tab.addEventListener("click", function () {
            const tabId = this.getAttribute("data-tab");
            const targetSection = document.getElementById(tabId);
            if (!targetSection) return; // إذا القسم غير موجود

            // إزالة النشاط من جميع التبويبات والأقسام
            document
                .querySelectorAll(".policy-tab")
                .forEach((t) => t.classList.remove("active"));
            document
                .querySelectorAll(".policy-section")
                .forEach((s) => s.classList.remove("active"));

            // تفعيل التبويب الحالي والقسم المرتبط
            this.classList.add("active");
            targetSection.classList.add("active");

            // تمرير سلس للقسم
            targetSection.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });

            // تحديث URL بالـ hash بدون إعادة تحميل الصفحة
            if (history.pushState) {
                history.pushState(null, null, "#" + tabId);
            } else {
                window.location.hash = tabId;
            }
        });
    });

    // ===== Scroll عند الدخول مباشرة برابط Hash =====
    const hash = window.location.hash.slice(1); // إزالة #
    if (hash) {
        const section = document.getElementById(hash);
        const tab = document.querySelector(`.policy-tab[data-tab="${hash}"]`);

        if (tab) tab.classList.add("active"); // تفعيل التبويب
        if (section) section.classList.add("active"); // تفعيل القسم

        if (section)
            section.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
    }
});

// ==========================================
// نموذج الاتصال
// ==========================================
const contactForm = document.getElementById("contactForm");
if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const submitBtn = this.querySelector(".submit-btn");
        if (!submitBtn) return;

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
}

// ==========================================
// أنيميشن الباقات - تدوير الأيقونات
// ==========================================
document.querySelectorAll(".package-card").forEach((card) => {
    const icon = card.querySelector(".package-icon");
    card.addEventListener("mouseenter", function () {
        if (icon) {
            icon.style.transform = "rotate(360deg)";
            icon.style.transition =
                "transform 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55)";
        }
    });
    card.addEventListener("mouseleave", function () {
        if (icon) icon.style.transform = "rotate(0deg)";
    });
});

// ==========================================
// تفعيل الأنيميشن والكاونترات عند التمرير
// ==========================================
let scrollTimeout;
window.addEventListener("scroll", function () {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
        animateOnScroll();
        checkCounters();
    }, 30);
});

// ==========================================
// تشغيل أولي عند التحميل
// ==========================================
window.addEventListener("DOMContentLoaded", () => {
    animateOnScroll();
    checkCounters();
});
window.addEventListener("load", () => animateOnScroll());
