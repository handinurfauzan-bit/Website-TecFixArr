<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panduan Baru | TechFixAr Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/globals.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/admin_theme.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/Panduan_baru_admin.css') ?>" />
    <script src="<?= base_url('assets/js/theme.js') ?>"></script>
  </head>
  <body>
    <div class="admin-app">

      <!-- ═══════════════════════════════════════
           SIDEBAR
      ════════════════════════════════════════ -->
      <aside class="admin-sidebar" aria-label="Navigasi admin">
        <div class="admin-sidebar__top">
          <a class="admin-brand" href="<?= site_url('/') ?>" aria-label="TechFixAr">
            <span class="admin-brand__mark" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" width="22" height="22">
                <path d="M3 12h4l2-5 4 10 2-5h6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            <span class="admin-brand__title">
              <span class="admin-brand__title-text">TechFix</span><span class="admin-brand__title-accent">Ar</span>
            </span>
          </a>
          <div class="admin-status"><span class="admin-status__dot"></span><span class="admin-status__text">System Online</span></div>
          <nav class="admin-nav" aria-label="Menu utama">
            <a class="admin-nav__item admin-nav__item--active" href="<?= site_url('/admin/panduan') ?>" aria-current="page">
              <svg class="admin-nav__icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                <rect x="3" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
                <rect x="14" y="3" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
                <rect x="3" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
                <rect x="14" y="14" width="7" height="7" rx="1.5" stroke="currentColor" stroke-width="1.7"/>
              </svg>
              <span>Kelola Panduan &amp; Troubleshooting</span>
            </a>
            <?php if (session()->get('admin_role') === 'super_admin'): ?>
            <a class="admin-nav__item" href="<?= site_url('/admin/verifikasi') ?>">
              <svg class="admin-nav__icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span>Verifikasi Akun Admin</span>
            </a>
            <?php endif ?>
          </nav>
        </div>
        <div class="admin-user">
          <div class="admin-user__info">
            <span class="admin-user__avatar"><?= strtoupper(substr(session()->get('admin_nama') ?? 'A', 0, 2)) ?></span>
            <span class="admin-user__meta">
              <span class="admin-user__name"><?= esc(session()->get('admin_nama')) ?></span>
              <span class="admin-user__role"><?= session()->get('admin_role') === 'super_admin' ? 'Super Admin' : 'Admin' ?></span>
            </span>
          </div>
          <button class="admin-theme-toggle" data-theme-toggle type="button">
            <svg class="icon-moon" viewBox="0 0 24 24" fill="none" width="16" height="16"><path d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <svg class="icon-sun"  viewBox="0 0 24 24" fill="none" width="16" height="16"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <span>Mode Terang</span>
          </button>
          <a class="admin-user__logout" href="<?= site_url('/logout') ?>">
            <svg viewBox="0 0 24 24" fill="none" width="16" height="16"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 17l5-5-5-5M21 12H9" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Logout
          </a>
        </div>
      </aside>

      <!-- ═══════════════════════════════════════
           EDITOR SHELL
      ════════════════════════════════════════ -->
      <main class="editor-shell">

        <!-- HEADER -->
        <header class="editor-header">
          <div class="editor-header__row">

            <div class="editor-header__left">
              <a class="editor-back" href="<?= site_url('/admin/panduan') ?>">
                <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M10 3L5 8L10 13" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Kembali
              </a>
            </div>

            <div class="editor-header__title" id="header-title-display">
              Panduan Baru
            </div>

            <div class="editor-header__actions">
              <a href="<?= site_url('/admin/panduan') ?>" class="btn-draft">Batal</a>
              <button type="submit" form="form-panduan" class="btn-publish">
                <svg viewBox="0 0 16 16" fill="none" width="13" height="13"><path d="M13.5 2.5l-8 8-3-3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Simpan &amp; Publikasikan
              </button>
            </div>
          </div>

          <!-- TABS -->
          <div class="editor-tabs" role="tablist">
            <button class="editor-tab editor-tab--active" role="tab" aria-selected="true"
                    id="tab-guide" data-target="panel-guide" type="button">
              <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M3 4h10M3 7h10M3 10h6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
              Guide
            </button>
            <button class="editor-tab" role="tab" aria-selected="false"
                    id="tab-steps" data-target="panel-steps" type="button">
              <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><circle cx="4" cy="4" r="1.5" stroke="currentColor" stroke-width="1.4"/><circle cx="4" cy="8" r="1.5" stroke="currentColor" stroke-width="1.4"/><circle cx="4" cy="12" r="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M8 4h5M8 8h5M8 12h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
              Steps
              <span class="editor-tab__badge" id="steps-badge">0</span>
            </button>
          </div>
        </header>

        <!-- Flash errors -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div style="margin:12px 28px;background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.4);color:#ef4444;padding:10px 14px;border-radius:8px;font-size:13px;font-weight:600;">
            <ul style="margin:0 0 0 18px;padding:0;">
              <?php foreach (session()->getFlashdata('errors') as $e): ?>
                <li><?= esc($e) ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>

        <div class="editor-main">

          <!-- ══════════════════════════
               PANEL: GUIDE
          ══════════════════════════ -->
          <div id="panel-guide" role="tabpanel" aria-labelledby="tab-guide">
            <form id="form-panduan" action="<?= site_url('/admin/panduan/simpan') ?>" method="post">
              <?= csrf_field() ?>

              <div class="guide-form">

                <!-- Kolom 1: Judul + Deskripsi -->
                <div class="guide-col">
                  <span class="guide-label">JUDUL PANDUAN</span>
                  <textarea class="guide-title" name="judul" rows="5"
                            placeholder="Tulis judul panduan yang jelas dan deskriptif…"
                            oninput="document.getElementById('header-title-display').textContent = this.value || 'Panduan Baru'"
                            required><?= esc(old('judul')) ?></textarea>
                  <span class="guide-hint">Judul yang baik memudahkan pembaca menemukan konten ini.</span>

                  <span class="guide-label" style="margin-top:8px;">DESKRIPSI SINGKAT</span>
                  <textarea name="deskripsi" rows="3"
                            style="padding:12px 14px;background:var(--panel);border:1px solid var(--border);border-radius:10px;color:var(--text);font-size:13px;font-family:inherit;outline:none;resize:vertical;"
                            placeholder="Ringkasan singkat isi panduan ini… (maks 500 karakter)"
                            maxlength="500"><?= esc(old('deskripsi')) ?></textarea>
                </div>

                <!-- Kolom 2: Tipe Panduan -->
                <div class="guide-col">
                  <span class="guide-label">TIPE PANDUAN</span>
                  <div class="type-list" id="type-list">
                    <?php
                      $types = [
                        'Troubleshooting' => [
                          'icon' => '<path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><line x1="12" y1="9" x2="12" y2="13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><line x1="12" y1="17" x2="12.01" y2="17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
                          'desc' => 'Diagnosa & solusi masalah hardware',
                        ],
                        'Assembly' => [
                          'icon' => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>',
                          'desc' => 'Perakitan & pemasangan komponen',
                        ],
                        'Tips & Trik' => [
                          'icon' => '<circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.7"/><path d="M12 2v2M12 20v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M2 12h2M20 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>',
                          'desc' => 'Tips optimasi & perawatan rutin',
                        ],
                      ];
                      $selectedKat = old('kategori', '');
                    ?>
                    <?php foreach ($types as $key => $type): ?>
                      <label class="type-card <?= $selectedKat === $key ? 'type-card--active' : '' ?>">
                        <input type="radio" name="kategori" value="<?= esc($key) ?>"
                               <?= $selectedKat === $key ? 'checked' : '' ?>
                               style="display:none" class="type-radio" required />
                        <span class="type-card__icon">
                          <svg viewBox="0 0 24 24" fill="none" width="18" height="18"><?= $type['icon'] ?></svg>
                        </span>
                        <span class="type-card__text">
                          <span class="type-card__title"><?= esc($key) ?></span>
                          <span class="type-card__desc"><?= esc($type['desc']) ?></span>
                        </span>
                      </label>
                    <?php endforeach ?>
                  </div>
                </div>

                <!-- Kolom 3: Alat + Konten -->
                <div class="guide-col">
                  <span class="guide-label">ALAT YANG DIBUTUHKAN</span>
                  <div class="tools-list" id="tools-list">
                    <div class="tool-row">
                      <div class="tool-fields">
                        <input type="text" class="tool-input tool-name"
                               placeholder="Nama alat (contoh: Obeng Phillips)" />
                        <input type="text" class="tool-input tool-input--sub tool-detail"
                               placeholder="Detail opsional (contoh: ukuran #1)" />
                      </div>
                      <button type="button" class="tool-remove" onclick="removeTool(this)" aria-label="Hapus alat">×</button>
                    </div>
                  </div>
                  <input type="hidden" name="alat_dibutuhkan" id="alat-hidden" />
                  <button type="button" class="tools-add" onclick="addTool()">
                    <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M8 3v10M3 8h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                    Tambah alat
                  </button>

                  <span class="guide-label" style="margin-top:16px;">KONTEN / LANGKAH-LANGKAH</span>
                  <textarea name="konten" rows="8" required
                            style="padding:12px 14px;background:var(--panel);border:1px solid var(--border);border-radius:10px;color:var(--text);font-size:13px;font-family:inherit;outline:none;resize:vertical;"
                            placeholder="Tulis langkah-langkah panduan di sini…"><?= esc(old('konten')) ?></textarea>
                </div>

              </div><!-- /guide-form -->
            </form>
          </div><!-- /panel-guide -->

          <!-- ══════════════════════════
               PANEL: STEPS
          ══════════════════════════ -->
          <div id="panel-steps" role="tabpanel" aria-labelledby="tab-steps" class="editor-panel--hidden">
            <div class="steps-layout">

              <div class="steps-rail">
                <span class="steps-rail__label" id="steps-rail-label">LANGKAH — 0 TOTAL</span>
                <div class="steps-list" id="steps-list"></div>
                <button type="button" class="steps-add-btn" onclick="addStep()">
                  <svg viewBox="0 0 16 16" fill="none" width="14" height="14"><path d="M8 3v10M3 8h10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
                  Add a step
                </button>
              </div>

              <div id="step-canvas-wrap">
                <div class="steps-placeholder" id="steps-placeholder">
                  Belum ada langkah. Klik "<strong>Add a step</strong>" untuk mulai menambahkan.
                </div>
                <div class="step-canvas editor-panel--hidden" id="step-canvas">

                  <div class="step-canvas__top">
                    <span class="step-pill" id="canvas-step-pill">LANGKAH 1</span>
                    <input class="step-title-field" id="canvas-step-title"
                           type="text" placeholder="Judul langkah ini…"
                           oninput="syncStepTitle(this.value)" />
                  </div>

                  <div class="step-canvas__grid">
                    <div class="media-block">
                      <label class="media-drop" id="media-drop-label">
                        <input type="file" accept="image/*" style="display:none"
                               id="media-file-input" onchange="handleMediaUpload(this)" />
                        <svg viewBox="0 0 24 24" fill="none" width="32" height="32"><rect x="3" y="3" width="18" height="18" rx="3" stroke="currentColor" stroke-width="1.6"/><circle cx="8.5" cy="8.5" r="1.5" stroke="currentColor" stroke-width="1.4"/><path d="M21 15l-5-5L5 21" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span class="media-drop__title" id="media-drop-title">Upload Gambar</span>
                        <span class="media-drop__hint">Drag &amp; drop atau klik • Maks 5 MB</span>
                      </label>
                      <button type="button" class="media-video" onclick="addVideoLink()">
                        <svg viewBox="0 0 24 24" fill="none" width="16" height="16"><rect x="2" y="7" width="15" height="10" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M17 10l5-3v10l-5-3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        Tambah Video
                      </button>
                    </div>

                    <div class="instr-block">
                      <div class="instr-lines" id="instr-lines"></div>
                      <button type="button" class="instr-add" onclick="addLine()">+ Add a line</button>
                    </div>
                  </div>

                  <div class="step-canvas__foot">
                    <button type="button" class="btn-delete-step" onclick="deleteCurrentStep()">
                      <svg viewBox="0 0 16 16" fill="none" width="13" height="13"><path d="M2 4h12M5 4V2h6v2M6 7v5M10 7v5M3 4l1 10h8l1-10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                      Hapus Step
                    </button>
                  </div>

                </div><!-- /step-canvas -->
              </div>
            </div><!-- /steps-layout -->
          </div><!-- /panel-steps -->

        </div><!-- /editor-main -->
      </main>
    </div><!-- /admin-app -->

    <script>
    (() => {
      'use strict';

      let steps = [];
      let activeStepId = null;

      /* TAB SWITCHING */
      document.querySelectorAll('.editor-tab').forEach(tab => {
        tab.addEventListener('click', () => {
          document.querySelectorAll('.editor-tab').forEach(t => {
            t.classList.remove('editor-tab--active');
            t.setAttribute('aria-selected', 'false');
          });
          tab.classList.add('editor-tab--active');
          tab.setAttribute('aria-selected', 'true');
          const targetId = tab.dataset.target;
          document.querySelectorAll('[role="tabpanel"]').forEach(p => p.classList.add('editor-panel--hidden'));
          document.getElementById(targetId).classList.remove('editor-panel--hidden');
        });
      });

      /* TYPE CARDS */
      document.querySelectorAll('.type-card').forEach(card => {
        card.addEventListener('click', () => {
          document.querySelectorAll('.type-card').forEach(c => c.classList.remove('type-card--active'));
          card.classList.add('type-card--active');
          card.querySelector('.type-radio').checked = true;
        });
      });

      /* TOOLS */
      window.addTool = function() {
        const list = document.getElementById('tools-list');
        const row  = document.createElement('div');
        row.className = 'tool-row';
        row.innerHTML = `
          <div class="tool-fields">
            <input type="text" class="tool-input tool-name" placeholder="Nama alat" />
            <input type="text" class="tool-input tool-input--sub tool-detail" placeholder="Detail opsional" />
          </div>
          <button type="button" class="tool-remove" onclick="removeTool(this)" aria-label="Hapus alat">×</button>
        `;
        list.appendChild(row);
        row.querySelector('.tool-name').focus();
      };

      window.removeTool = function(btn) {
        const rows = document.querySelectorAll('#tools-list .tool-row');
        if (rows.length > 1) btn.closest('.tool-row').remove();
        else btn.closest('.tool-row').querySelectorAll('input').forEach(i => i.value = '');
      };

      document.getElementById('form-panduan').addEventListener('submit', () => {
        // Sync alat
        const names = [...document.querySelectorAll('#tools-list .tool-name')]
          .map(i => i.value.trim()).filter(Boolean);
        document.getElementById('alat-hidden').value = names.join(', ');

        // Sync konten dari steps (jika ada steps)
        if (steps.length > 0) {
          const konten = steps.map((s, i) => {
            const header = `Langkah ${i + 1}${s.title ? ': ' + s.title : ''}`;
            const lines  = s.lines.map(l => (l.isWarn ? '[PERINGATAN] ' : '') + l.text).filter(Boolean).join('\n');
            return header + (lines ? '\n' + lines : '');
          }).join('\n\n');
          const kontenEl = document.querySelector('[name="konten"]');
          if (kontenEl) kontenEl.value = konten;
        }

        // Simpan steps_json
        let el = document.getElementById('steps-json-hidden');
        if (!el) {
          el = document.createElement('input');
          el.type = 'hidden'; el.name = 'steps_json'; el.id = 'steps-json-hidden';
          document.getElementById('form-panduan').appendChild(el);
        }
        el.value = JSON.stringify(steps);
      });

      /* STEPS */
      function genId() { return '_' + Math.random().toString(36).slice(2, 9); }

      function renderRail() {
        const list  = document.getElementById('steps-list');
        const badge = document.getElementById('steps-badge');
        const label = document.getElementById('steps-rail-label');
        list.innerHTML = '';
        badge.textContent = steps.length;
        label.textContent = `LANGKAH — ${steps.length} TOTAL`;
        steps.forEach((s, i) => {
          const btn = document.createElement('button');
          btn.type = 'button';
          btn.className = 'step-chip' + (s.id === activeStepId ? ' step-chip--active' : '');
          btn.innerHTML = `<span class="step-chip__num">LANGKAH ${i + 1}</span><span class="step-chip__title">${s.title || 'Tanpa judul'}</span>`;
          btn.addEventListener('click', () => openStep(s.id));
          list.appendChild(btn);
        });
        const placeholder = document.getElementById('steps-placeholder');
        const canvas      = document.getElementById('step-canvas');
        if (steps.length === 0) {
          placeholder.classList.remove('editor-panel--hidden');
          canvas.classList.add('editor-panel--hidden');
          activeStepId = null;
        } else {
          placeholder.classList.add('editor-panel--hidden');
          canvas.classList.remove('editor-panel--hidden');
        }
      }

      function openStep(id) {
        activeStepId = id;
        const step  = steps.find(s => s.id === id);
        const index = steps.indexOf(step);
        document.getElementById('canvas-step-pill').textContent  = `LANGKAH ${index + 1}`;
        document.getElementById('canvas-step-title').value       = step.title;
        renderLines(step);
        renderRail();
      }

      window.syncStepTitle = function(val) {
        const step = steps.find(s => s.id === activeStepId);
        if (!step) return;
        step.title = val;
        const chips = document.querySelectorAll('.step-chip__title');
        chips[steps.indexOf(step)].textContent = val || 'Tanpa judul';
      };

      window.addStep = function() {
        const s = { id: genId(), title: '', lines: [{ text: '', isWarn: false }], mediaName: null };
        steps.push(s);
        renderRail();
        openStep(s.id);
      };

      window.deleteCurrentStep = function() {
        if (!activeStepId || !confirm('Hapus step ini?')) return;
        steps = steps.filter(s => s.id !== activeStepId);
        activeStepId = steps.length ? steps[steps.length - 1].id : null;
        renderRail();
        if (activeStepId) openStep(activeStepId);
      };

      function renderLines(step) {
        const c = document.getElementById('instr-lines');
        c.innerHTML = '';
        step.lines.forEach((_, i) => c.appendChild(createLineEl(step, i)));
      }

      function createLineEl(step, idx) {
        const row = document.createElement('div');
        row.className = 'instr-row' + (step.lines[idx].isWarn ? ' instr-row--warn' : '');
        if (step.lines[idx].isWarn) {
          row.innerHTML = `
            <span class="instr-handle" aria-hidden="true">⠿</span>
            <div class="instr-warn">
              <svg viewBox="0 0 24 24" fill="none" width="14" height="14"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/><line x1="12" y1="9" x2="12" y2="13" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/><line x1="12" y1="17" x2="12.01" y2="17" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
              <textarea class="instr-input instr-input--warn" rows="2" placeholder="Pesan peringatan…" oninput="updateLine(${idx}, this.value)">${step.lines[idx].text}</textarea>
            </div>
            <button type="button" class="instr-remove" onclick="removeLine(${idx})" aria-label="Hapus">×</button>`;
        } else {
          row.innerHTML = `
            <span class="instr-handle" aria-hidden="true">⠿</span>
            <textarea class="instr-input" rows="2" placeholder="Tulis instruksi langkah ini…" oninput="updateLine(${idx}, this.value)">${step.lines[idx].text}</textarea>
            <button type="button" class="instr-remove" onclick="removeLine(${idx})" aria-label="Hapus">×</button>`;
        }
        return row;
      }

      window.updateLine = function(idx, val) {
        const step = steps.find(s => s.id === activeStepId);
        if (step) step.lines[idx].text = val;
      };

      window.removeLine = function(idx) {
        const step = steps.find(s => s.id === activeStepId);
        if (!step || step.lines.length <= 1) return;
        step.lines.splice(idx, 1);
        renderLines(step);
      };

      window.addLine = function(isWarn = false) {
        const step = steps.find(s => s.id === activeStepId);
        if (!step) return;
        step.lines.push({ text: '', isWarn });
        renderLines(step);
        const inputs = document.querySelectorAll('#instr-lines .instr-input');
        inputs[inputs.length - 1]?.focus();
      };

      window.handleMediaUpload = function(input) {
        const file = input.files[0];
        if (!file) return;
        if (file.size > 5 * 1024 * 1024) { alert('File melebihi 5 MB!'); input.value = ''; return; }
        const step = steps.find(s => s.id === activeStepId);
        if (step) step.mediaName = file.name;
        document.getElementById('media-drop-title').textContent = file.name;
      };

      window.addVideoLink = function() {
        const url = prompt('Masukkan URL video:');
        if (url) {
          const step = steps.find(s => s.id === activeStepId);
          if (step) { step.lines.push({ text: `VIDEO: ${url}`, isWarn: false }); renderLines(step); }
        }
      };

      /* Init: langsung tambah Langkah 1 */
      addStep();
    })();
    </script>

  </body>
</html>
