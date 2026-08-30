(function () {
  'use strict';

  const searchInput   = document.getElementById('panduan-search');
  const artikelCount  = document.getElementById('artikel-count');
  const filterBtns    = document.querySelectorAll('.filter-btn');

  const artikelLinks  = document.querySelectorAll('.artikel-link');

  let activeFilter = 'semua';
  let searchQuery  = '';

  function applyFilters() {
    let visible = 0;

    artikelLinks.forEach(function (link) {
      const article    = link.querySelector('article');
      if (!article) return;

      const kategori   = (article.dataset.kategori || '').trim();
      const judul      = (article.querySelector('h2')?.textContent || '').toLowerCase();
      const deskripsi  = (article.querySelector('.text-wrapper-9')?.textContent || '').toLowerCase();
      const q          = searchQuery.toLowerCase();

      const passKategori =
        activeFilter === 'semua' ||
        kategori === activeFilter;

      const passSearch =
        q === '' ||
        judul.includes(q) ||
        deskripsi.includes(q);

      const tampil = passKategori && passSearch;

      link.style.display = tampil ? '' : 'none';
      if (tampil) visible++;
    });

    if (artikelCount) {
      artikelCount.textContent = visible + ' artikel';
    }

    showEmptyState(visible === 0);
  }

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

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      activeFilter = btn.dataset.filter || 'semua';

      filterBtns.forEach(function (b) {
        const isActive = b === btn;
        b.setAttribute('aria-pressed', isActive ? 'true' : 'false');

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

  if (searchInput) {
    searchInput.addEventListener('input', function () {
      searchQuery = searchInput.value.trim();
      applyFilters();
    });

    searchInput.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        searchInput.value = '';
        searchQuery = '';
        applyFilters();
        searchInput.blur();
      }
    });
  }

  applyFilters();

})();
