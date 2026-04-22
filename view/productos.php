<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Productos – POS Papelería</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@500&display=swap" rel="stylesheet" />
  <style>
    :root {
      --bg: #1a1c20;
      --surface: #23262d;
      --surface2: #2c3039;
      --border: #363b45;
      --accent: #f59e0b;
      --accent-h: #fbbf24;
      --accent-d: #d97706;
      --danger: #ef4444;
      --success: #22c55e;
      --info: #3b82f6;
      --text: #f1f3f7;
      --muted: #8b92a0;
      --radius: 12px;
      --shadow: 0 4px 24px rgba(0, 0, 0, .45);
    }

    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
    }

    /* ── NAV ── */
    nav {
      background: var(--surface);
      border-bottom: 1px solid var(--border);
      padding: 0 24px;
      height: 56px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .brand {
      font-weight: 700;
      font-size: 1.1rem;
    }

    .brand span {
      color: var(--accent);
    }

    .nav-links {
      display: flex;
      gap: 6px;
    }

    .nav-links a {
      color: var(--muted);
      text-decoration: none;
      padding: 6px 14px;
      border-radius: 8px;
      font-size: .875rem;
      font-weight: 500;
      transition: background .15s, color .15s;
    }

    .nav-links a:hover {
      background: var(--surface2);
      color: var(--text);
    }

    .nav-links a.active {
      background: var(--accent);
      color: #1a1c20;
    }

    /* ── PAGE ── */
    .page {
      max-width: 1100px;
      margin: 0 auto;
      padding: 28px 20px;
    }

    .page-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 28px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .page-header h1 {
      font-size: 1.5rem;
      font-weight: 700;
    }

    .page-header p {
      color: var(--muted);
      font-size: .875rem;
      margin-top: 2px;
    }

    /* ── GRID: FORM + TABLE ── */
    .content-grid {
      display: grid;
      grid-template-columns: 320px 1fr;
      gap: 20px;
      align-items: start;
    }

    /* ── FORM CARD ── */
    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 24px;
    }

    .card-title {
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group label {
      display: block;
      font-size: .8rem;
      font-weight: 600;
      color: var(--muted);
      margin-bottom: 6px;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .form-group input {
      width: 100%;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 8px;
      color: var(--text);
      padding: 11px 14px;
      font-family: inherit;
      font-size: .95rem;
      outline: none;
      transition: border-color .15s;
    }

    .form-group input:focus {
      border-color: var(--accent);
    }

    .form-group input[type="number"] {
      font-family: 'DM Mono', monospace;
    }

    .btn-primary {
      width: 100%;
      background: var(--accent);
      color: #1a1c20;
      border: none;
      border-radius: var(--radius);
      padding: 13px;
      font-family: inherit;
      font-size: .95rem;
      font-weight: 700;
      cursor: pointer;
      transition: background .15s, transform .12s;
      margin-top: 4px;
    }

    .btn-primary:hover {
      background: var(--accent-h);
    }

    .btn-primary:active {
      transform: scale(.98);
    }

    .btn-primary:disabled {
      background: var(--surface2);
      color: var(--muted);
      cursor: not-allowed;
    }

    .form-msg {
      margin-top: 12px;
      padding: 10px 14px;
      border-radius: 8px;
      font-size: .85rem;
      font-weight: 500;
      display: none;
    }

    .form-msg.success {
      background: rgba(34, 197, 94, .15);
      color: var(--success);
      display: block;
    }

    .form-msg.error {
      background: rgba(239, 68, 68, .15);
      color: var(--danger);
      display: block;
    }

    /* ── TABLE ── */
    .table-card {
      overflow: hidden;
    }

    .table-toolbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 16px;
      gap: 10px;
      flex-wrap: wrap;
    }

    .search-wrap {
      position: relative;
      flex: 1;
      min-width: 180px;
    }

    .search-wrap input {
      width: 100%;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 8px;
      color: var(--text);
      padding: 9px 14px 9px 38px;
      font-family: inherit;
      font-size: .88rem;
      outline: none;
      transition: border-color .15s;
    }

    .search-wrap input:focus {
      border-color: var(--accent);
    }

    .search-wrap svg {
      position: absolute;
      left: 11px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      pointer-events: none;
    }

    .product-count {
      font-size: .8rem;
      color: var(--muted);
      white-space: nowrap;
    }

    .table-wrap {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: .88rem;
    }

    thead th {
      text-align: left;
      padding: 10px 14px;
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--muted);
      border-bottom: 1px solid var(--border);
      white-space: nowrap;
    }

    tbody tr {
      border-bottom: 1px solid var(--border);
      transition: background .1s;
    }

    tbody tr:last-child {
      border-bottom: none;
    }

    tbody tr:hover {
      background: var(--surface2);
    }

    td {
      padding: 13px 14px;
      vertical-align: middle;
    }

    td.mono {
      font-family: 'DM Mono', monospace;
    }

    td.price {
      color: var(--accent);
    }

    .stock-pill {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: .78rem;
      font-weight: 600;
    }

    .stock-pill.ok {
      background: rgba(34, 197, 94, .15);
      color: var(--success);
    }

    .stock-pill.low {
      background: rgba(245, 158, 11, .15);
      color: var(--accent);
    }

    .stock-pill.out {
      background: rgba(239, 68, 68, .15);
      color: var(--danger);
    }

    .btn-del {
      border: none;
      background: none;
      color: var(--muted);
      cursor: pointer;
      padding: 4px 6px;
      border-radius: 6px;
      transition: color .12s, background .12s;
      display: inline-flex;
      align-items: center;
    }

    .btn-del:hover {
      color: var(--danger);
      background: rgba(239, 68, 68, .1);
    }

    .btn-toggle {
      border: none;
      background: none;
      cursor: pointer;
      padding: 4px 6px;
      border-radius: 6px;
      transition: color .12s, background .12s;
      display: inline-flex;
      align-items: center;
    }

    .btn-toggle.active {
      color: var(--success);
    }

    .btn-toggle.active:hover {
      color: var(--danger);
      background: rgba(239, 68, 68, .1);
    }

    .btn-toggle.inactive {
      color: var(--muted);
    }

    .btn-toggle.inactive:hover {
      color: var(--success);
      background: rgba(34, 197, 94, .1);
    }

    tbody tr.row-inactive td:not(.action-td) {
      opacity: .45;
    }

    tbody tr.row-inactive td.action-td {
      opacity: 1;
    }

    .active-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: .72rem;
      font-weight: 700;
    }

    .active-badge.on {
      background: rgba(34, 197, 94, .13);
      color: var(--success);
    }

    .active-badge.off {
      background: rgba(239, 68, 68, .13);
      color: var(--danger);
    }

    .btn-restock {
      border: none;
      background: none;
      color: var(--muted);
      cursor: pointer;
      padding: 4px 6px;
      border-radius: 6px;
      transition: color .12s, background .12s;
      display: inline-flex;
      align-items: center;
    }

    .btn-restock:hover {
      color: var(--info);
      background: rgba(59, 130, 246, .1);
    }

    .action-cell {
      display: flex;
      align-items: center;
      gap: 4px;
    }

    /* ── MODAL ── */
    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .65);
      backdrop-filter: blur(4px);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 200;
      opacity: 0;
      pointer-events: none;
      transition: opacity .2s;
    }

    .modal-backdrop.open {
      opacity: 1;
      pointer-events: all;
    }

    .modal {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 28px;
      width: 100%;
      max-width: 400px;
      box-shadow: var(--shadow);
      transform: translateY(16px) scale(.97);
      transition: transform .22s cubic-bezier(.34, 1.56, .64, 1);
    }

    .modal-backdrop.open .modal {
      transform: none;
    }

    .modal-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 20px;
      gap: 12px;
    }

    .modal-icon {
      width: 42px;
      height: 42px;
      background: rgba(59, 130, 246, .15);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      flex-shrink: 0;
    }

    .modal-title {
      font-size: 1.05rem;
      font-weight: 700;
      margin-bottom: 3px;
    }

    .modal-subtitle {
      font-size: .8rem;
      color: var(--muted);
    }

    .modal-close {
      border: none;
      background: none;
      color: var(--muted);
      cursor: pointer;
      padding: 4px;
      border-radius: 6px;
      display: flex;
      flex-shrink: 0;
      transition: color .12s;
    }

    .modal-close:hover {
      color: var(--text);
    }

    .modal-current-stock {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 12px 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .modal-current-stock .label {
      font-size: .8rem;
      color: var(--muted);
      font-weight: 600;
    }

    .modal-current-stock .value {
      font-family: 'DM Mono', monospace;
      font-size: 1.1rem;
      font-weight: 700;
    }

    .modal-current-stock .value.ok {
      color: var(--success);
    }

    .modal-current-stock .value.low {
      color: var(--accent);
    }

    .modal-current-stock .value.out {
      color: var(--danger);
    }

    .restock-input-wrap {
      position: relative;
      margin-bottom: 8px;
    }

    .restock-prefix {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--info);
      font-weight: 700;
      font-size: 1rem;
      pointer-events: none;
    }

    .restock-input-wrap input {
      width: 100%;
      background: var(--surface2);
      border: 2px solid var(--info);
      border-radius: 10px;
      color: var(--text);
      padding: 14px 14px 14px 34px;
      font-family: 'DM Mono', monospace;
      font-size: 1.5rem;
      font-weight: 700;
      text-align: left;
      outline: none;
      transition: border-color .15s, box-shadow .15s;
    }

    .restock-input-wrap input:focus {
      border-color: var(--info);
      box-shadow: 0 0 0 3px rgba(59, 130, 246, .18);
    }

    .restock-preview {
      font-size: .82rem;
      color: var(--muted);
      margin-bottom: 20px;
      min-height: 20px;
    }

    .restock-preview strong {
      color: var(--success);
    }

    .modal-actions {
      display: flex;
      gap: 10px;
    }

    .btn-cancel {
      flex: 1;
      background: var(--surface2);
      border: 1px solid var(--border);
      color: var(--text);
      border-radius: var(--radius);
      padding: 12px;
      font-family: inherit;
      font-size: .9rem;
      font-weight: 600;
      cursor: pointer;
      transition: background .15s;
    }

    .btn-cancel:hover {
      background: var(--border);
    }

    .btn-confirm {
      flex: 2;
      background: var(--info);
      color: #fff;
      border: none;
      border-radius: var(--radius);
      padding: 12px;
      font-family: inherit;
      font-size: .9rem;
      font-weight: 700;
      cursor: pointer;
      transition: background .15s, transform .12s;
    }

    .btn-confirm:hover {
      background: #2563eb;
    }

    .btn-confirm:active {
      transform: scale(.98);
    }

    .btn-confirm:disabled {
      background: var(--surface2);
      color: var(--muted);
      cursor: not-allowed;
    }

    .table-empty {
      text-align: center;
      padding: 48px;
      color: var(--muted);
    }

    .table-loading {
      text-align: center;
      padding: 32px;
      color: var(--muted);
      font-size: .9rem;
    }

    /* ── TOAST ── */
    #toast {
      position: fixed;
      bottom: 24px;
      left: 50%;
      transform: translateX(-50%) translateY(80px);
      background: var(--success);
      color: #fff;
      padding: 12px 24px;
      border-radius: 30px;
      font-weight: 600;
      font-size: .9rem;
      box-shadow: var(--shadow);
      transition: transform .3s cubic-bezier(.34, 1.56, .64, 1);
      z-index: 1000;
      pointer-events: none;
    }

    #toast.show {
      transform: translateX(-50%) translateY(0);
    }

    #toast.error {
      background: var(--danger);
    }

    .spinner {
      display: inline-block;
      width: 15px;
      height: 15px;
      border: 2px solid rgba(26, 28, 32, .4);
      border-top-color: #1a1c20;
      border-radius: 50%;
      animation: spin .7s linear infinite;
      vertical-align: middle;
      margin-right: 6px;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    @media (max-width: 900px) {
      .content-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

  <nav>
    <div class="brand">✏️ <span>Papel</span>POS</div>
    <div class="nav-links">
      <a href="ventas">Ventas</a>
      <a href="productos" class="active">Productos</a>
      <a href="corte">Corte</a>
    </div>
  </nav>

  <div class="page">
    <div class="page-header">
      <div>
        <h1>Catálogo de Productos</h1>
        <p>Agrega, consulta y administra el inventario de tu papelería.</p>
      </div>
    </div>

    <div class="content-grid">

      <!-- ── FORMULARIO ── -->
      <div class="card">
        <p class="card-title">Agregar producto</p>

        <div class="form-group">
          <label for="fNombre">Nombre del producto</label>
          <input type="text" id="fNombre" placeholder="Ej. Cuaderno universitario" maxlength="120" />
        </div>
        <div class="form-group">
          <label for="fPrecio">Precio ($)</label>
          <input type="number" id="fPrecio" placeholder="0.00" min="0" step="0.01" />
        </div>
        <div class="form-group">
          <label for="fStock">Stock inicial</label>
          <input type="number" id="fStock" placeholder="0" min="0" step="1" />
        </div>

        <button class="btn-primary" id="btnSave" onclick="saveProduct()">
          Guardar producto
        </button>
        <div class="form-msg" id="formMsg"></div>
      </div>

      <!-- ── TABLA ── -->
      <div class="card table-card">
        <div class="table-toolbar">
          <div class="search-wrap">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <circle cx="11" cy="11" r="8" />
              <path d="m21 21-4.35-4.35" />
            </svg>
            <input type="text" placeholder="Buscar en catálogo…" oninput="filterTable(this.value)" />
          </div>
          <span class="product-count" id="productCount">–</span>
        </div>

        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="tableBody">
              <tr>
                <td colspan="6" class="table-loading">Cargando…</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- ── MODAL RE-STOCK ── -->
  <div class="modal-backdrop" id="restockModal" onclick="closeRestockModal(event)">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <div class="modal-header">
        <div style="display:flex;gap:12px;align-items:flex-start">
          <div class="modal-icon">📦</div>
          <div>
            <p class="modal-title" id="modalTitle">Re-stock de producto</p>
            <p class="modal-subtitle" id="modalProductName">–</p>
          </div>
        </div>
        <button class="modal-close" onclick="closeRestockModal()" aria-label="Cerrar">
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path d="M18 6 6 18M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="modal-current-stock">
        <span class="label">Stock actual</span>
        <span class="value" id="modalCurrentStock">–</span>
      </div>

      <div class="form-group" style="margin-bottom:6px">
        <label for="restockQty">Unidades a agregar</label>
        <div class="restock-input-wrap">
          <span class="restock-prefix">+</span>
          <input type="number" id="restockQty" min="1" step="1" placeholder="0"
            oninput="updateRestockPreview()" onkeydown="onRestockKey(event)" />
        </div>
      </div>
      <p class="restock-preview" id="restockPreview"></p>

      <div class="modal-actions">
        <button class="btn-cancel" onclick="closeRestockModal()">Cancelar</button>
        <button class="btn-confirm" id="btnConfirmRestock" onclick="confirmRestock()">
          Confirmar re-stock
        </button>
      </div>
    </div>
  </div>

  <div id="toast"></div>

  <script>
    let products = [];
    let filtered = [];
    let restockTarget = null; // { id, name, stock }

    // ── CARGAR ──────────────────────────────────────────────
    async function loadProducts() {
      try {
        const res = await fetch('/products');
        if (!res.ok) throw new Error();
        products = await res.json();
      } catch {
        products = [];
      }
      filtered = [...products];
      renderTable();
    }

    // ── RENDERIZAR TABLA ────────────────────────────────────
    function renderTable() {
      const tbody = document.getElementById('tableBody');
      document.getElementById('productCount').textContent = `${filtered.length} producto${filtered.length !== 1 ? 's' : ''}`;

      if (!filtered.length) {
        tbody.innerHTML = '<tr><td colspan="6" class="table-empty">Sin productos</td></tr>';
        return;
      }

      tbody.innerHTML = filtered.map((p, i) => {
        const stockClass = p.stock === 0 ? 'out' : p.stock < 10 ? 'low' : 'ok';
        const stockLabel = p.stock === 0 ? 'Sin stock' : p.stock < 10 ? 'Bajo' : 'OK';
        const isActive = p.status !== false && p.status !== 0;
        const rowClass = isActive ? '' : 'row-inactive';
        const toggleClass = isActive ? 'active' : 'inactive';
        const toggleTitle = isActive ? 'Desactivar producto' : 'Activar producto';
        // Eye-on icon when active, eye-off when inactive
        const toggleIcon = isActive ?
          `<svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
             <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
             <circle cx="12" cy="12" r="3"/>
           </svg>` :
          `<svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
             <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
             <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
             <line x1="1" y1="1" x2="23" y2="23"/>
           </svg>`;
        return `
        <tr class="${rowClass}">
          <td class="mono" style="color:var(--muted)">${p.id}</td>
          <td style="font-weight:500">${esc(p.name)}</td>
          <td class="mono price">$${fmt(p.price)}</td>
          <td>
            <span class="stock-pill ${stockClass}">
              ${p.stock} · ${stockLabel}
            </span>
          </td>
          <td>
            <span class="active-badge ${isActive ? 'on' : 'off'}">
              ${isActive ? 'Activo' : 'Inactivo'}
            </span>
          </td>
          <td class="action-td">
            <div class="action-cell">
              <button class="btn-restock" onclick="openRestockModal(${p.id})" title="Re-stock"
                ${isActive ? '' : 'disabled style="opacity:.3;cursor:not-allowed"'}>
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path d="M12 5v14M5 12l7-7 7 7"/>
                </svg>
              </button>
              <button class="btn-toggle ${toggleClass}" onclick="toggleProductStatus(${p.id})" title="${toggleTitle}">
                ${toggleIcon}
              </button>
            </div>
          </td>
        </tr>
      `;
      }).join('');
    }

    // ── TOGGLE ESTADO ───────────────────────────────────────
    async function toggleProductStatus(id) {
      const p = products.find(x => x.id === id);
      if (!p) return;

      const isActive = p.status === 1;
      const newStatus = isActive ? 0 : 1;


      // Optimistic update
      p.status = newStatus;
      filtered = [...products];
      renderTable();

      try {
        const res = await fetch(`/products/status`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            product_id: id

          })
        });
        const data = await res.json();

        if (!res.ok) {
          throw new Error(data.error || 'Error al Cambiar el estado del producto');
        }
        showToast(data.status ? '✅ Producto activado' : '⏸ Producto desactivado');
        filtered = [...products];
        renderTable();
      } catch (e){
        // Revertir si falla
        p.active = isActive;
        filtered = [...products];
        renderTable();
        showToast('❌ ' + e.message, true);
      }
    }


    function filterTable(q) {
      const lower = q.toLowerCase();
      filtered = products.filter(p => p.name.toLowerCase().includes(lower));
      renderTable();
    }

    // ── GUARDAR PRODUCTO ────────────────────────────────────
    async function saveProduct() {
      const nombre = document.getElementById('fNombre').value.trim();
      const precio = parseFloat(document.getElementById('fPrecio').value);
      const stock = parseInt(document.getElementById('fStock').value) || 0;

      if (!nombre) return showMsg('El nombre no puede estar vacío.', 'error');
      if (isNaN(precio) || precio < 0) return showMsg('Ingresa un precio válido.', 'error');

      const btn = document.getElementById('btnSave');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner"></span>Guardando…';

      const payload = {
        name: nombre,
        price: precio,
        stock
      };

      try {
        const res = await fetch('/products', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(payload)
        });
        const data = await res.json();
        if (!res.ok) {
          throw new Error(data.error || 'Error al guardar el producto');
        }
        products.push(data.product);
        filtered = [...products];
        renderTable();
        clearForm();
        showMsg('✅ Producto guardado correctamente.', 'success');
        showToast('Producto agregado');
      } catch (e) {
        showMsg('❌ ' + e.message, 'error');
      } finally {
        btn.disabled = false;
        btn.textContent = 'Guardar producto';
      }
    }

    // ── ELIMINAR ────────────────────────────────────────────
    async function deleteProduct(id) {
      if (!confirm('¿Eliminar este producto?')) return;
      try {
        await fetch(`/products/${id}`, {
          method: 'DELETE'
        });
      } catch {
        /* demo: continuar */
      }
      products = products.filter(p => p.id !== id);
      filtered = filtered.filter(p => p.id !== id);
      renderTable();
      showToast('Producto eliminado');
    }

    // ── UTILIDADES ───────────────────────────────────────────
    function clearForm() {
      ['fNombre', 'fPrecio', 'fStock'].forEach(id => document.getElementById(id).value = '');
    }

    function showMsg(msg, type) {
      const el = document.getElementById('formMsg');
      el.textContent = msg;
      el.className = 'form-msg ' + type;
      setTimeout(() => {
        el.className = 'form-msg';
      }, 4000);
    }

    function fmt(n) {
      return (+n).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function esc(s) {
      const d = document.createElement('div');
      d.textContent = s;
      return d.innerHTML;
    }

    function showToast(msg, isError = false) {
      const t = document.getElementById('toast');
      t.textContent = msg;
      t.className = isError ? 'error' : '';
      void t.offsetWidth;
      t.classList.add('show');
      setTimeout(() => t.classList.remove('show'), 2500);
    }

    // ── RE-STOCK ─────────────────────────────────────────────
    function openRestockModal(id) {
      const p = products.find(x => x.id === id);
      if (!p) return;
      restockTarget = p;

      document.getElementById('modalProductName').textContent = p.name;
      const stockClass = p.stock === 0 ? 'out' : p.stock < 10 ? 'low' : 'ok';
      const el = document.getElementById('modalCurrentStock');
      el.textContent = p.stock + ' unidades';
      el.className = 'value ' + stockClass;

      document.getElementById('restockQty').value = '';
      document.getElementById('restockPreview').innerHTML = '';
      document.getElementById('btnConfirmRestock').disabled = true;

      document.getElementById('restockModal').classList.add('open');
      setTimeout(() => document.getElementById('restockQty').focus(), 120);
    }

    function closeRestockModal(e) {
      if (e && e.target !== document.getElementById('restockModal')) return;
      document.getElementById('restockModal').classList.remove('open');
      restockTarget = null;
    }

    function updateRestockPreview() {
      const qty = parseInt(document.getElementById('restockQty').value) || 0;
      const preview = document.getElementById('restockPreview');
      const btn = document.getElementById('btnConfirmRestock');
      if (!restockTarget || qty <= 0) {
        preview.innerHTML = '';
        btn.disabled = true;
        return;
      }
      const newStock = restockTarget.stock + qty;
      preview.innerHTML = `Nuevo stock: <strong>${restockTarget.stock} + ${qty} = ${newStock} unidades</strong>`;
      btn.disabled = false;
    }

    function onRestockKey(e) {
      if (e.key === 'Enter') confirmRestock();
      if (e.key === 'Escape') closeRestockModal();
    }

    async function confirmRestock() {
      if (!restockTarget) return;

      const qty = parseInt(document.getElementById('restockQty').value) || 0;
      if (qty <= 0) return;

      const btn = document.getElementById('btnConfirmRestock');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner"></span>Guardando…';

      try {
        const res = await fetch(`/products/restock`, {
          method: 'POST', // 🔥 CAMBIO CLAVE
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            product_id: restockTarget.id,
            quantity: qty
          })
        });

        const data = await res.json();

        if (!res.ok) {
          throw new Error(data.error || 'Error al registrar el restock');
        }

        // ✅ SOLO SI TODO SALE BIEN
        const p = products.find(x => x.id === restockTarget.id);
        if (p) p.stock += qty;

        filtered = [...products];
        renderTable();

        document.getElementById('restockModal').classList.remove('open');
        restockTarget = null;

        showToast(`✅ Re-stock aplicado: +${qty} unidades`);

      } catch (e) {
        showToast('❌ ' + e.message, true);
        return; // 🔥 IMPORTANTE
      } finally {
        btn.disabled = false;
        btn.textContent = 'Confirmar re-stock';
      }
    }

    loadProducts();
  </script>
</body>

</html>