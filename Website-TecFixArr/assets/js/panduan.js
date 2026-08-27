/**
 * panduan.js
 * Filter kategori + pencarian artikel di halaman Panduan & Servis
 */

(function () {
  'use strict';

  // ── Elemen utama ──────────────────────────────────────────────────────────
  const searchInput   = document.getElementById('panduan-search');
  const artikelCount  = document.getElementById('artikel-count');
  const filterBtns    = document.querySelectorAll('.filter-btn');

  // Setiap wrapper <a> berisi satu <article data-kategori="...">
  const artikelLinks  = document.querySelectorAll('.artikel-link');

  // ── State ─────────────────────────────────────────────────────────────────
  let activeFilter = 'semua';   // nilai dari data-filter tombol aktif
  let searchQuery  = '';

  // ── Fungsi utama: tampilkan / sembunyikan artikel ─────────────────────────
  function applyFilters() {
    let visible = 0;

    artikelLinks.forEach(function (link) {
      const article    = link.querySelector('article');
      if (!article) return;

      const kategori   = (article.dataset.kategori || '').trim();
      const judul      = (article.querySelector('h2')?.textContent || '').toLowerCase();
      const deskripsi  = (article.querySelector('.text-wrapper-9')?.textContent || '').toLowerCase();
      const q          = searchQuery.toLowerCase();

      // Filter kategori
      const passKategori =
        activeFilter === 'semua' ||
        kategori === activeFilter;

      // Filter pencarian (cek judul + deskripsi)
      const passSearch =
        q === '' ||
        judul.includes(q) ||
        deskripsi.includes(q);

      const tampil = passKategori && passSearch;

      link.style.display = tampil ? '' : 'none';
      if (tampil) visible++;
    });

    // Update penghitung artikel
    if (artikelCount) {
      artikelCount.textContent = visible + ' artikel';
    }

    // Tampilkan pesan kosong jika tidak ada hasil
    showEmptyState(visible === 0);
  }

  // ── Pesan "tidak ada artikel" ─────────────────────────────────────────────
  function showEmptyState(isEmpty) {
    let emptyEl = document.getElementById('panduan-empty');

    if (isEmpty) {
      if (!emptyEl) {
        emptyEl = document.createElement('div');
        emptyEl.id = 'panduan-empty';
        emptyEl.className = 'panduan-empty';
        emptyEl.innerHTML =
          '<span class="panduan-empty__icon" aria-hidden="true">' +
            '<svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>' +
          '</span>' +
          '<p class="panduan-empty__text">Tidak ada artikel yang cocok.</p>';

        const grid = document.querySelector('.container-10');
        if (grid) grid.parentNode.insertBefore(emptyEl, grid.nextSibling);
      }
      emptyEl.style.display = 'flex';
    } else if (emptyEl) {
      emptyEl.style.display = 'none';
    }
  }

  // ── Event: klik tombol filter ─────────────────────────────────────────────
  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      // Update state
      activeFilter = btn.dataset.filter || 'semua';

      // Update aria-pressed dan gaya tombol aktif
      filterBtns.forEach(function (b) {
        const isActive = b === btn;
        b.setAttribute('aria-pressed', isActive ? 'true' : 'false');

        // Tombol "Semua Panduan" pakai class .button (ungu),
        // sisanya pakai .button-2 / .button-3 (netral)
        if (b.dataset.filter === 'semua') {
          b.className = isActive
            ? 'button filter-btn filter-btn--active'
            : 'button-2 filter-btn';
        } else {
          b.className = isActive
            ? 'button filter-btn filter-btn--active'
            : 'button-2 filter-btn';
        }
      });

      applyFilters();
    });
  });

  // ── Event: ketik di search input ──────────────────────────────────────────
  if (searchInput) {
    searchInput.addEventListener('input', function () {
      searchQuery = searchInput.value.trim();
      applyFilters();
    });

    // Bersihkan hasil saat tekan Escape
    searchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        searchInput.value = '';
        searchQuery = '';
        applyFilters();
        searchInput.blur();
      }
    });
  }

  // ── Inisialisasi awal ─────────────────────────────────────────────────────
  applyFilters();

})();
