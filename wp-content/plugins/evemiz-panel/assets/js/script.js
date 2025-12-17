/* ========================
   MOBILE MENU
======================== */
const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");

menuBtn.addEventListener("click", () => {
    mobileMenu.classList.toggle("open");
});

/* برای بستن منو با لمس بیرون آن */
document.addEventListener("click", (e) => {
    if (!mobileMenu.contains(e.target) && !menuBtn.contains(e.target)) {
        mobileMenu.classList.remove("open");
    }
});


/* ========================
   DARK MODE TOGGLE
======================== */
const darkStyle = document.getElementById("dark-style");
const darkBtn = document.getElementById("toggle-dark");

// خواندن وضعیت فعلی از LocalStorage
if (localStorage.getItem("dark") === "on") {
    darkStyle.disabled = false;
    darkBtn.textContent = "☀️";
}

darkBtn.addEventListener("click", () => {
    const isDark = darkStyle.disabled;

    darkStyle.disabled = !isDark;

    if (isDark) {
        // روشن شد → ذخیره در localStorage
        darkBtn.textContent = "☀️";
        localStorage.setItem("dark", "on");
    } else {
        // خاموش شد
        darkBtn.textContent = "🌙";
        localStorage.setItem("dark", "off");
    }
});


/* ========================
   RTL / LTR SWITCH
======================== */
const directionBtn = document.getElementById("toggle-dir");
const htmlTag = document.documentElement;

// لوکال استوریج زبان قبلی را بخوانیم
if (localStorage.getItem("dir") === "ltr") {
    htmlTag.dir = "ltr";
    directionBtn.textContent = "⇆";
}

directionBtn.addEventListener("click", () => {
    if (htmlTag.dir === "rtl") {
        htmlTag.dir = "ltr";
        directionBtn.textContent = "⇆";
        localStorage.setItem("dir", "ltr");
    } else {
        htmlTag.dir = "rtl";
        directionBtn.textContent = "⇆";
        localStorage.setItem("dir", "rtl");
    }
});
