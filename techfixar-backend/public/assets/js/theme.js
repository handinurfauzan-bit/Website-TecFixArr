(function () {
  "use strict";

  const STORAGE_KEY = "techfixar-theme";
  const DARK = "dark";
  const LIGHT = "light";

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
    return window.matchMedia("(prefers-color-scheme: light)").matches
      ? LIGHT
      : DARK;
  }
  function applyTheme(theme) {
    const html = document.documentElement;
    if (theme === LIGHT) {
      html.setAttribute("data-theme", "light");
    } else {
      html.removeAttribute("data-theme");
    }
    document.querySelectorAll("[data-theme-toggle]").forEach(updateButtonState);
  }
  function updateButtonState(btn) {
    const isLight = document.documentElement.hasAttribute("data-theme");
    btn.setAttribute(
      "aria-label",
      isLight ? "Ganti ke mode gelap" : "Ganti ke mode terang",
    );
    btn.setAttribute("title", isLight ? "Mode Gelap" : "Mode Terang");
  }
  function toggleTheme() {
    const isCurrentlyLight =
      document.documentElement.hasAttribute("data-theme");
    const next = isCurrentlyLight ? DARK : LIGHT;
    try {
      localStorage.setItem(STORAGE_KEY, next);
    } catch {
    }
    applyTheme(next);
  }
  function init() {
    applyTheme(getPreferredTheme());
    function bindButtons() {
      document.querySelectorAll("[data-theme-toggle]").forEach(function (btn) {
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
    window.addEventListener("storage", function (e) {
      if (e.key === STORAGE_KEY) {
        applyTheme(getPreferredTheme());
      }
    });
  }
  init();
  function initAdminFab() {
    const fab = document.getElementById("admin-fab");
    if (!fab) return;
    try {
      const isRegistered = localStorage.getItem("techfixar-admin-registered");
      if (isRegistered === "true") {
        fab.style.display = "flex";
      }
    } catch {
    }
  }
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initAdminFab);
  } else {
    initAdminFab();
  }
})();
