/* ============================================================
   simulasi.js — Logika Simulasi Perakitan PC TechFixAr
   Fitur:
   - Data komponen dengan harga, watt, dan metadata socket/tipe
   - Dropdown accordion interaktif
   - Cek kompatibilitas real-time (CPU↔Mobo socket, RAM tipe, PSU watt)
   - Kalkulasi total harga & estimasi daya
   ============================================================ */

'use strict';

/* ── Data Komponen ────────────────────────────────────────── */
const DATA = {
  cpu: [
    { id: 'r5-7600x',  name: 'AMD Ryzen 5 7600X',      spec: '6-Core / 12-Thread, 4.7GHz, AM5', price: 2_850_000,  watt: 105, socket: 'AM5',  ramType: 'DDR5' },
    { id: 'r7-7700x',  name: 'AMD Ryzen 7 7700X',      spec: '8-Core / 16-Thread, 4.5GHz, AM5', price: 4_200_000,  watt: 105, socket: 'AM5',  ramType: 'DDR5' },
    { id: 'r9-7950x',  name: 'AMD Ryzen 9 7950X',      spec: '16-Core / 32-Thread, 4.5GHz, AM5',price: 9_500_000,  watt: 170, socket: 'AM5',  ramType: 'DDR5' },
    { id: 'i5-14600k', name: 'Intel Core i5-14600K',   spec: '14-Core / 20-Thread, 3.5GHz, LGA1700', price: 3_600_000, watt: 125, socket: 'LGA1700', ramType: 'DDR4/DDR5' },
    { id: 'i7-14700k', name: 'Intel Core i7-14700K',   spec: '20-Core / 28-Thread, 3.4GHz, LGA1700', price: 5_800_000, watt: 125, socket: 'LGA1700', ramType: 'DDR4/DDR5' },
    { id: 'i9-14900k', name: 'Intel Core i9-14900K',   spec: '24-Core / 32-Thread, 3.2GHz, LGA1700', price: 9_200_000, watt: 125, socket: 'LGA1700', ramType: 'DDR4/DDR5' },
    { id: 'r5-5600x',  name: 'AMD Ryzen 5 5600X',      spec: '6-Core / 12-Thread, 3.7GHz, AM4', price: 1_850_000,  watt: 65,  socket: 'AM4',  ramType: 'DDR4' },
    { id: 'r7-5800x3d',name: 'AMD Ryzen 7 5800X3D',   spec: '8-Core / 16-Thread, 3.4GHz, AM4', price: 3_200_000,  watt: 105, socket: 'AM4',  ramType: 'DDR4' },
  ],

  mobo: [
    { id: 'b650m-ds3h', name: 'Gigabyte B650M DS3H',       spec: 'mATX, AM5, DDR5, PCIe 5.0',         price: 1_950_000,  socket: 'AM5',     ramType: 'DDR5',      formFactor: 'mATX' },
    { id: 'x670e-apex', name: 'ASUS ROG Crosshair X670E',  spec: 'ATX, AM5, DDR5, PCIe 5.0',          price: 6_500_000,  socket: 'AM5',     ramType: 'DDR5',      formFactor: 'ATX'  },
    { id: 'b760m-pro',  name: 'ASUS PRIME B760M-A',        spec: 'mATX, LGA1700, DDR4/DDR5, PCIe 4.0',price: 1_800_000,  socket: 'LGA1700', ramType: 'DDR4/DDR5', formFactor: 'mATX' },
    { id: 'z790-hero',  name: 'ASUS ROG Maximus Z790 Hero',spec: 'ATX, LGA1700, DDR5, PCIe 5.0',       price: 7_800_000,  socket: 'LGA1700', ramType: 'DDR5',      formFactor: 'ATX'  },
    { id: 'b550-elite', name: 'ASUS ROG Strix B550-F',     spec: 'ATX, AM4, DDR4, PCIe 4.0',          price: 2_100_000,  socket: 'AM4',     ramType: 'DDR4',      formFactor: 'ATX'  },
    { id: 'x570-unify', name: 'MSI MEG X570 Unify',        spec: 'ATX, AM4, DDR4, PCIe 4.0',          price: 3_200_000,  socket: 'AM4',     ramType: 'DDR4',      formFactor: 'ATX'  },
  ],

  ram: [
    { id: 'ddr4-16-3200',  name: 'Corsair Vengeance 16GB DDR4', spec: '16GB (2×8GB), DDR4-3200, CL16', price: 650_000,   watt: 3,  type: 'DDR4' },
    { id: 'ddr4-32-3600',  name: 'G.Skill Trident Z 32GB DDR4', spec: '32GB (2×16GB), DDR4-3600, CL18',price: 1_200_000, watt: 5,  type: 'DDR4' },
    { id: 'ddr5-16-5600',  name: 'Kingston Fury 16GB DDR5',      spec: '16GB (2×8GB), DDR5-5600, CL36', price: 900_000,   watt: 4,  type: 'DDR5' },
    { id: 'ddr5-32-6000',  name: 'Corsair Dominator 32GB DDR5',  spec: '32GB (2×16GB), DDR5-6000, CL30',price: 1_850_000, watt: 6,  type: 'DDR5' },
    { id: 'ddr5-64-5200',  name: 'G.Skill Ripjaws M5 64GB DDR5', spec: '64GB (2×32GB), DDR5-5200, CL38',price: 3_400_000, watt: 8,  type: 'DDR5' },
    { id: 'ddr4-64-3200',  name: 'Corsair Vengeance 64GB DDR4',  spec: '64GB (2×32GB), DDR4-3200, CL16',price: 2_100_000, watt: 7,  type: 'DDR4' },
  ],

  gpu: [
    { id: 'rtx4060',   name: 'NVIDIA GeForce RTX 4060',    spec: '8GB GDDR6, 3072 CUDA, 128-bit', price: 4_800_000,  watt: 115 },
    { id: 'rtx4060ti', name: 'NVIDIA GeForce RTX 4060 Ti', spec: '16GB GDDR6, 4352 CUDA, 128-bit',price: 7_200_000,  watt: 165 },
    { id: 'rtx4070',   name: 'NVIDIA GeForce RTX 4070',    spec: '12GB GDDR6X, 5888 CUDA, 192-bit',price: 9_500_000, watt: 200 },
    { id: 'rtx4070ti', name: 'NVIDIA GeForce RTX 4070 Ti', spec: '12GB GDDR6X, 7680 CUDA, 192-bit',price: 12_500_000,watt: 285 },
    { id: 'rtx4080',   name: 'NVIDIA GeForce RTX 4080',    spec: '16GB GDDR6X, 9728 CUDA, 256-bit',price: 17_000_000,watt: 320 },
    { id: 'rx7600',    name: 'AMD Radeon RX 7600',          spec: '8GB GDDR6, 2048 SP, 128-bit',   price: 3_600_000,  watt: 165 },
    { id: 'rx7700xt',  name: 'AMD Radeon RX 7700 XT',       spec: '12GB GDDR6, 3456 SP, 192-bit',  price: 5_400_000,  watt: 245 },
    { id: 'rx7900xtx', name: 'AMD Radeon RX 7900 XTX',      spec: '24GB GDDR6, 6144 SP, 384-bit',  price: 16_500_000, watt: 355 },
  ],

  storage: [
    { id: 'wd-sn570-500', name: 'WD Blue SN570 500GB',         spec: 'NVMe PCIe 3.0, R:3500 MB/s, M.2',   price: 550_000,   watt: 3 },
    { id: 'wd-sn850x-1t', name: 'WD Black SN850X 1TB',         spec: 'NVMe PCIe 4.0, R:7300 MB/s, M.2',   price: 1_350_000, watt: 5 },
    { id: 'sg-990-pro-2t',name: 'Samsung 990 Pro 2TB',          spec: 'NVMe PCIe 4.0, R:7450 MB/s, M.2',   price: 2_800_000, watt: 6 },
    { id: 'kx-fury-1t',   name: 'Kingston Fury Renegade 1TB',  spec: 'NVMe PCIe 4.0, R:7300 MB/s, M.2',   price: 1_200_000, watt: 5 },
    { id: 'sg-870-2t',    name: 'Samsung 870 EVO 2TB',          spec: 'SATA SSD, R:560 MB/s, 2.5"',        price: 1_600_000, watt: 2 },
    { id: 'sg-980-pro-2t',name: 'Samsung 980 Pro 2TB',          spec: 'NVMe PCIe 4.0, R:7000 MB/s, M.2',   price: 2_400_000, watt: 6 },
  ],

  psu: [
    { id: 'cx550',    name: 'Corsair CX550',             spec: '550W, 80+ Bronze, Semi-Modular', price: 800_000,   watt: 550 },
    { id: 'rm750x',   name: 'Corsair RM750x',            spec: '750W, 80+ Gold, Fully Modular',  price: 1_650_000, watt: 750 },
    { id: 'rm850x',   name: 'Corsair RM850x',            spec: '850W, 80+ Gold, Fully Modular',  price: 1_950_000, watt: 850 },
    { id: 'rm1000x',  name: 'Corsair RM1000x',           spec: '1000W, 80+ Gold, Fully Modular', price: 2_500_000, watt: 1000 },
    { id: 'seasonic-850',name:'Seasonic Focus GX-850',   spec: '850W, 80+ Gold, Fully Modular',  price: 1_800_000, watt: 850 },
    { id: 'evga-650', name: 'EVGA SuperNOVA 650 G6',     spec: '650W, 80+ Gold, Fully Modular',  price: 1_200_000, watt: 650 },
  ],

  casing: [
    { id: 'nzxt-h510',   name: 'NZXT H510',               spec: 'Mid Tower, ATX/mATX, Tempered Glass', price: 1_100_000, formFactor: ['ATX', 'mATX'] },
    { id: 'lianli-o11d', name: 'Lian Li O11 Dynamic',      spec: 'Mid Tower, ATX/mATX/E-ATX, TG',       price: 1_800_000, formFactor: ['ATX', 'mATX', 'E-ATX'] },
    { id: 'fractal-7',   name: 'Fractal Design Define 7',  spec: 'Full Tower, ATX/E-ATX, Sound Dampened',price: 2_200_000, formFactor: ['ATX', 'mATX', 'E-ATX'] },
    { id: 'corsair-4k',  name: 'Corsair 4000D Airflow',    spec: 'Mid Tower, ATX/mATX, High Airflow',    price: 1_300_000, formFactor: ['ATX', 'mATX'] },
    { id: 'cooler-nr200',name:'Cooler Master NR200P',       spec: 'Mini-ITX / mATX SFF, TG',              price: 900_000,  formFactor: ['mATX'] },
    { id: 'phanteks-p400',name:'Phanteks P400A',            spec: 'Mid Tower, ATX/mATX, DRGB',            price: 1_050_000, formFactor: ['ATX', 'mATX'] },
  ],
};

/* Watt base system (mobo + komponen kecil) */
const BASE_SYSTEM_WATT = 50;

/* ── State ──────────────────────────────────────────────── */
const state = {
  cpu: null,
  mobo: null,
  ram: null,
  gpu: null,
  storage: null,
  psu: null,
  casing: null,
};

/* ── Helper format harga ─────────────────────────────────── */
function formatRp(n) {
  return 'Rp ' + n.toLocaleString('id-ID');
}

/* ── Render dropdown options ─────────────────────────────── */
function renderOptions(key, items) {
  const container = document.querySelector(`#dropdown-${key} .komponen-card__options`);
  if (!container) return;
  container.innerHTML = '';
  items.forEach(item => {
    const div = document.createElement('div');
    div.className = 'komponen-option' + (state[key]?.id === item.id ? ' is-active' : '');
    div.setAttribute('role', 'option');
    div.setAttribute('aria-selected', state[key]?.id === item.id ? 'true' : 'false');
    div.setAttribute('tabindex', '0');
    div.dataset.id = item.id;
    div.dataset.key = key;

    div.innerHTML = `
      <div class="komponen-option__info">
        <div class="komponen-option__name">${item.name}</div>
        <div class="komponen-option__spec">${item.spec}</div>
      </div>
      <span class="komponen-option__price">${formatRp(item.price)}</span>
      <div class="komponen-option__check">
        ${state[key]?.id === item.id
          ? `<svg viewBox="0 0 10 10" fill="none" width="10" height="10"><path d="M2 5l2.5 2.5L8 3" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`
          : ''}
      </div>`;

    div.addEventListener('click', () => selectItem(key, item));
    div.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') selectItem(key, item); });
    container.appendChild(div);
  });
}

/* ── Inisialisasi semua dropdown ─────────────────────────── */
function initDropdowns() {
  Object.keys(DATA).forEach(key => renderOptions(key, DATA[key]));
}

/* ── Toggle accordion ────────────────────────────────────── */
function toggleCard(key) {
  const card = document.getElementById(`card-${key}`);
  const isOpen = card.classList.contains('is-open');

  // Tutup semua card lain
  document.querySelectorAll('.komponen-card.is-open').forEach(c => {
    if (c !== card) {
      c.classList.remove('is-open');
      c.querySelector('.komponen-card__header').setAttribute('aria-expanded', 'false');
    }
  });

  card.classList.toggle('is-open', !isOpen);
  card.querySelector('.komponen-card__header').setAttribute('aria-expanded', String(!isOpen));
}

/* ── Pilih komponen ──────────────────────────────────────── */
function selectItem(key, item) {
  state[key] = item;

  // Update header display
  const nameEl  = document.getElementById(`${key}-name`);
  const priceEl = document.getElementById(`${key}-price`);
  if (nameEl) {
    nameEl.textContent = item.name;
    nameEl.classList.remove('placeholder');
  }
  if (priceEl) priceEl.textContent = formatRp(item.price);

  // Tandai card sebagai selected
  const card = document.getElementById(`card-${key}`);
  card.classList.add('is-selected');

  // Re-render options (update active state)
  renderOptions(key, DATA[key]);

  // Tutup dropdown setelah pilih
  card.classList.remove('is-open');
  card.querySelector('.komponen-card__header').setAttribute('aria-expanded', 'false');

  // Update summary & kompatibilitas
  updateSummary();
  checkCompatibility();
}

/* ── Update ringkasan ────────────────────────────────────── */
function updateSummary() {
  const keys = ['cpu', 'mobo', 'ram', 'gpu', 'storage', 'psu', 'casing'];
  const shortKey = { cpu:'cpu', mobo:'mobo', ram:'ram', gpu:'gpu', storage:'storage', psu:'psu', casing:'casing' };

  let total = 0;
  let totalWatt = BASE_SYSTEM_WATT;

  keys.forEach(key => {
    const item = state[key];
    const nameEl  = document.getElementById(`s-${key}`);
    const priceEl = document.getElementById(`s-${key}-p`);
    if (item) {
      if (nameEl)  { nameEl.textContent = item.name; nameEl.classList.remove('empty'); }
      if (priceEl) priceEl.textContent = formatRp(item.price);
      total += item.price;
      if (item.watt) totalWatt += item.watt;
    } else {
      if (nameEl)  { nameEl.textContent = '—'; nameEl.classList.add('empty'); }
      if (priceEl) priceEl.textContent = '';
    }
  });

  document.getElementById('total-price').textContent = formatRp(total);
  document.getElementById('total-watt').textContent  = total > 0 ? `~${totalWatt} W` : '— W';
}

/* ── Cek kompatibilitas ──────────────────────────────────── */
function checkCompatibility() {
  const results = [];
  const { cpu, mobo, ram, psu } = state;

  // -- CPU & Mobo socket --
  if (cpu && mobo) {
    if (cpu.socket === mobo.socket) {
      results.push({ type: 'ok',   msg: `CPU & Mobo: socket ${cpu.socket} cocok ✓` });
    } else {
      results.push({ type: 'error', msg: `CPU (${cpu.socket}) tidak cocok dengan Mobo (${mobo.socket})` });
    }
  }

  // -- RAM & CPU/Mobo tipe --
  if (ram) {
    if (cpu && mobo) {
      const cpuSupport  = cpu.ramType.includes(ram.type);
      const moboSupport = mobo.ramType.includes(ram.type);
      if (cpuSupport && moboSupport) {
        results.push({ type: 'ok',   msg: `RAM ${ram.type} didukung CPU & Mobo ✓` });
      } else if (!cpuSupport) {
        results.push({ type: 'error', msg: `CPU tidak mendukung RAM ${ram.type} (butuh ${cpu.ramType})` });
      } else {
        results.push({ type: 'error', msg: `Mobo tidak mendukung RAM ${ram.type} (butuh ${mobo.ramType})` });
      }
    } else if (cpu) {
      const ok = cpu.ramType.includes(ram.type);
      results.push({ type: ok ? 'ok' : 'error', msg: ok
        ? `RAM ${ram.type} sesuai kebutuhan CPU ✓`
        : `CPU membutuhkan ${cpu.ramType}, bukan ${ram.type}` });
    }
  }

  // -- PSU watt cukup --
  if (psu) {
    let reqWatt = BASE_SYSTEM_WATT;
    if (cpu) reqWatt += cpu.watt;
    if (state.gpu) reqWatt += state.gpu.watt;
    if (state.ram) reqWatt += state.ram.watt;
    if (state.storage) reqWatt += state.storage.watt;

    const recommended = Math.ceil(reqWatt * 1.25); // 25% headroom
    const psuEl = document.getElementById('psu-warning');
    const psuTxt = document.getElementById('psu-warning-text');

    if (psu.watt >= recommended) {
      results.push({ type: 'ok', msg: `PSU ${psu.watt}W cukup (estimasi butuh ~${recommended}W) ✓` });
      if (psuEl) psuEl.classList.remove('visible');
    } else {
      const msg = `PSU ${psu.watt}W kurang! Estimasi butuh ~${recommended}W (termasuk 25% headroom)`;
      results.push({ type: 'error', msg });
      if (psuEl && psuTxt) {
        psuTxt.textContent = msg;
        psuEl.classList.add('visible');
      }
    }
  } else {
    const psuEl = document.getElementById('psu-warning');
    if (psuEl) psuEl.classList.remove('visible');
  }

  // -- Casing & Mobo form factor --
  if (state.casing && mobo) {
    const casingSupports = state.casing.formFactor.includes(mobo.formFactor);
    if (casingSupports) {
      results.push({ type: 'ok', msg: `Casing mendukung Mobo ${mobo.formFactor} ✓` });
    } else {
      results.push({ type: 'warn', msg: `Casing mungkin tidak muat Mobo ${mobo.formFactor}. Cek dimensi!` });
    }
  }

  // -- Tidak ada komponen sama sekali --
  if (Object.values(state).every(v => v === null)) {
    renderCompatResult([]);
    return;
  }

  // -- Semua lengkap & OK --
  const selectedCount = Object.values(state).filter(v => v !== null).length;
  if (selectedCount === 7 && results.every(r => r.type === 'ok')) {
    results.push({ type: 'ok', msg: 'Semua komponen kompatibel! Build siap dirakit 🎉' });
  }

  renderCompatResult(results);
}

/* ── Render hasil kompatibilitas ─────────────────────────── */
function renderCompatResult(results) {
  const list = document.getElementById('compat-list');
  const dot  = document.getElementById('compat-dot');
  if (!list || !dot) return;

  if (results.length === 0) {
    list.innerHTML = `<div class="compat-item idle" role="listitem">
      <svg class="compat-item__icon" viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="7" r="5.5" stroke="currentColor" stroke-width="1.3"/><path d="M7 5v2.5L8.5 9" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>
      Pilih komponen untuk mulai pengecekan
    </div>`;
    dot.className = 'compat-status-dot idle';
    return;
  }

  const hasError = results.some(r => r.type === 'error');
  const hasWarn  = results.some(r => r.type === 'warn');

  dot.className = 'compat-status-dot ' + (hasError ? 'error' : hasWarn ? 'warn' : 'ok');

  const icons = {
    ok:    `<svg class="compat-item__icon" viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="7" r="5.5" stroke="currentColor" stroke-width="1.3"/><path d="M4.5 7l2 2L9.5 5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
    warn:  `<svg class="compat-item__icon" viewBox="0 0 14 14" fill="none" width="12" height="12"><path d="M7 2L1 12h12L7 2z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/><path d="M7 6v2.5M7 10v.5" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>`,
    error: `<svg class="compat-item__icon" viewBox="0 0 14 14" fill="none" width="12" height="12"><circle cx="7" cy="7" r="5.5" stroke="currentColor" stroke-width="1.3"/><path d="M5 5l4 4M9 5l-4 4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/></svg>`,
  };

  list.innerHTML = results.map(r => `
    <div class="compat-item ${r.type}" role="listitem">
      ${icons[r.type] || ''}
      ${r.msg}
    </div>`).join('');
}

/* ── Reset semua ─────────────────────────────────────────── */
function resetAll() {
  Object.keys(state).forEach(k => { state[k] = null; });

  // Reset header tampilan
  ['cpu','mobo','ram','gpu','storage','psu','casing'].forEach(key => {
    const nameEl  = document.getElementById(`${key}-name`);
    const priceEl = document.getElementById(`${key}-price`);
    const card    = document.getElementById(`card-${key}`);
    if (nameEl)  { nameEl.textContent = 'Belum dipilih'; nameEl.classList.add('placeholder'); }
    if (priceEl) priceEl.textContent = '';
    if (card)    { card.classList.remove('is-selected', 'is-open', 'has-error'); }

    // Re-render options
    renderOptions(key, DATA[key]);
  });

  // Reset PSU warning
  const psuEl = document.getElementById('psu-warning');
  if (psuEl) psuEl.classList.remove('visible');

  updateSummary();
  checkCompatibility();
}

/* ── Pasang event listeners ──────────────────────────────── */
function initEvents() {
  // Toggle accordion untuk setiap card
  ['cpu','mobo','ram','gpu','storage','psu','casing'].forEach(key => {
    const header = document.querySelector(`#card-${key} .komponen-card__header`);
    if (!header) return;
    header.addEventListener('click', () => toggleCard(key));
    header.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleCard(key); }
    });
  });

  // Reset button
  const resetBtn = document.getElementById('reset-btn');
  if (resetBtn) resetBtn.addEventListener('click', resetAll);
}

/* ── Init ────────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
  initDropdowns();
  initEvents();
  updateSummary();
});
