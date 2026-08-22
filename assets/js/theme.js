(function () {
  "use strict";

  const STORAGE_KEY = "techfixar-theme";
  const DARK = "dark";
  const LIGHT = "light";

  /* ── Tentukan tema awal ──────────────────────────────────────────── */
  function getStoredTheme() {
    try {
      return localStorage.getItem(STORAGE_KEY);
    } catch {
      return null;
    }
  }

  function getPreferredTheme() {
    const stored = getStoredTheme();
    if (stored === LIGHT || stored === DARK) return stored;
    // Ikuti preferensi OS jika belum pernah diatur
    return window.matchMedia("(prefers-color-scheme: light)").matches
      ? LIGHT
      : DARK;
  }

  /* ── Terapkan tema ke <html> ─────────────────────────────────────── */
  function applyTheme(theme) {
    const html = document.documentElement;
    if (theme === LIGHT) {
      html.setAttribute("data-theme", "light");
    } else {
      html.removeAttribute("data-theme");
    }

    // Update semua tombol toggle yang ada di halaman
    document.querySelectorAll("[data-theme-toggle]").forEach(updateButtonState);
  }

  /* ── Update tampilan tombol ──────────────────────────────────────── */
  function updateButtonState(btn) {
    const isLight = document.documentElement.hasAttribute("data-theme");
    btn.setAttribute(
      "aria-label",
      isLight ? "Ganti ke mode gelap" : "Ganti ke mode terang",
    );
    btn.setAttribute("title", isLight ? "Mode Gelap" : "Mode Terang");
  }

  /* ── Toggle ──────────────────────────────────────────────────────── */
  function toggleTheme() {
    const isCurrentlyLight =
      document.documentElement.hasAttribute("data-theme");
    const next = isCurrentlyLight ? DARK : LIGHT;
    try {
      localStorage.setItem(STORAGE_KEY, next);
    } catch {
      // localStorage tidak tersedia (misal: private mode ketat)
    }
    applyTheme(next);
  }

  /* ── Inisialisasi ────────────────────────────────────────────────── */
  function init() {
    // Terapkan tema secepat mungkin untuk menghindari FOUC
    applyTheme(getPreferredTheme());

    // Pasang event listener setelah DOM siap
    function bindButtons() {
      document.querySelectorAll("[data-theme-toggle]").forEach(function (btn) {
        // Hapus listener lama untuk mencegah duplikat
        btn.removeEventListener("click", toggleTheme);
        btn.addEventListener("click", toggleTheme);
        updateButtonState(btn);
      });
    }

    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", bindButtons);
    } else {
      bindButtons();
    }

    // Sinkronisasi jika tab lain mengubah tema
    window.addEventListener("storage", function (e) {
      if (e.key === STORAGE_KEY) {
        applyTheme(getPreferredTheme());
      }
    });
  }

  init();

  /* ── Admin FAB — tampilkan hanya jika ada admin terdaftar ─────────── */
  function initAdminFab() {
    const fab = document.getElementById("admin-fab");
    if (!fab) return;
    try {
      const isRegistered = localStorage.getItem("techfixar-admin-registered");
      if (isRegistered === "true") {
        fab.style.display = "flex";
      }
    } catch {
      // localStorage tidak tersedia
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAdminFab);
  } else {
    initAdminFab();
  }
})();
