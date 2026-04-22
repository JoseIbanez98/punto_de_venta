<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Corte del Día – POS Papelería</title>
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
      max-width: 960px;
      margin: 0 auto;
      padding: 28px 20px;
    }

    .page-header {
      display: flex;
      align-items: flex-start;
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
      margin-top: 3px;
    }

    .btn-refresh {
      display: flex;
      align-items: center;
      gap: 7px;
      background: var(--surface);
      border: 1px solid var(--border);
      color: var(--text);
      border-radius: 8px;
      padding: 9px 16px;
      font-family: inherit;
      font-size: .875rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color .15s, background .15s;
      flex-shrink: 0;
    }

    .btn-refresh:hover {
      border-color: var(--accent);
      background: var(--surface2);
    }

    .btn-refresh svg {
      transition: transform .5s;
    }

    .btn-refresh.spinning svg {
      animation: spin .7s linear infinite;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* ── STATS GRID ── */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-bottom: 24px;
    }

    .stat-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 22px 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      animation: fadeUp .3s ease both;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(12px);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    .stat-card:nth-child(2) {
      animation-delay: .06s;
    }

    .stat-card:nth-child(3) {
      animation-delay: .12s;
    }

    .stat-card:nth-child(4) {
      animation-delay: .18s;
    }

    .stat-card.highlight {
      border-color: var(--accent);
      background: linear-gradient(135deg, rgba(245, 158, 11, .12), transparent);
    }

    .stat-icon {
      width: 36px;
      height: 36px;
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.1rem;
    }

    .stat-icon.amber {
      background: rgba(245, 158, 11, .18);
    }

    .stat-icon.green {
      background: rgba(34, 197, 94, .18);
    }

    .stat-icon.blue {
      background: rgba(59, 130, 246, .18);
    }

    .stat-icon.purple {
      background: rgba(168, 85, 247, .18);
    }

    .stat-label {
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--muted);
    }

    .stat-value {
      font-family: 'DM Mono', monospace;
      font-size: 1.75rem;
      font-weight: 700;
      color: var(--text);
      line-height: 1;
    }

    .stat-card.highlight .stat-value {
      color: var(--accent);
    }

    .stat-sub {
      font-size: .78rem;
      color: var(--muted);
    }

    .stat-trend {
      display: inline-flex;
      align-items: center;
      gap: 3px;
      font-size: .78rem;
      font-weight: 600;
      color: var(--success);
    }

    /* ── SALES TABLE ── */
    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      overflow: hidden;
      animation: fadeUp .3s .22s ease both;
    }

    .card-header {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .card-title {
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--muted);
    }

    .sale-count {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 20px;
      font-size: .75rem;
      font-weight: 600;
      padding: 2px 10px;
      color: var(--text);
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
      padding: 11px 16px;
      font-size: .72rem;
      font-weight: 700;
      letter-spacing: .07em;
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
      padding: 13px 16px;
      vertical-align: middle;
    }

    td.mono {
      font-family: 'DM Mono', monospace;
    }

    .status-badge {
      display: inline-block;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: .72rem;
      font-weight: 700;
    }

    .status-badge.completed {
      background: rgba(34, 197, 94, .15);
      color: var(--success);
    }

    .status-badge.pending {
      background: rgba(245, 158, 11, .15);
      color: var(--accent);
    }

    .sale-items-mini {
      font-size: .78rem;
      color: var(--muted);
      margin-top: 2px;
    }

    .table-empty {
      text-align: center;
      padding: 52px;
      color: var(--muted);
    }

    .table-empty svg {
      opacity: .3;
      margin-bottom: 10px;
    }

    .table-empty p {
      margin-top: 8px;
    }

    /* ── LOADING STATE ── */
    .loading-state {
      text-align: center;
      padding: 48px;
      color: var(--muted);
    }

    .skeleton {
      background: linear-gradient(90deg, var(--surface2) 25%, var(--border) 50%, var(--surface2) 75%);
      background-size: 200% 100%;
      animation: shimmer 1.4s infinite;
      border-radius: 6px;
      height: 14px;
      margin-bottom: 8px;
    }

    @keyframes shimmer {
      to {
        background-position: -200% 0;
      }
    }

    /* ── FOOTER NOTE ── */
    .footer-note {
      text-align: center;
      margin-top: 24px;
      color: var(--muted);
      font-size: .8rem;
    }

    .footer-note strong {
      color: var(--accent);
    }

    @media (max-width: 600px) {
      .stats-grid {
        grid-template-columns: 1fr 1fr;
      }

      .stat-value {
        font-size: 1.4rem;
      }
    }
  </style>
</head>

<body>

  <nav>
    <div class="brand">✏️ <span>Papel</span>POS</div>
    <div class="nav-links">
      <a href="ventas">Ventas</a>
      <a href="productos">Productos</a>
      <a href="corte" class="active">Corte</a>
    </div>
  </nav>

  <div class="page">

    <div class="page-header">
      <div>
        <h1>Corte del Día</h1>
        <p id="dateLabel">–</p>
      </div>
      <button class="btn-refresh" id="btnRefresh" onclick="loadReport()">
        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path d="M23 4v6h-6M1 20v-6h6" />
          <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15" />
        </svg>
        Actualizar
      </button>
    </div>

    <!-- ── TARJETAS ESTADÍSTICAS ── -->
    <div class="stats-grid" id="statsGrid">
      <!-- Se llena dinámicamente -->
      <div class="stat-card highlight">
        <div class="skeleton" style="width:60%;height:12px"></div>
        <div class="skeleton" style="width:80%;height:28px;margin-top:4px"></div>
      </div>
      <div class="stat-card">
        <div class="skeleton" style="width:55%;height:12px"></div>
        <div class="skeleton" style="width:65%;height:28px;margin-top:4px"></div>
      </div>
      <div class="stat-card">
        <div class="skeleton" style="width:50%;height:12px"></div>
        <div class="skeleton" style="width:70%;height:28px;margin-top:4px"></div>
      </div>
      <div class="stat-card">
        <div class="skeleton" style="width:60%;height:12px"></div>
        <div class="skeleton" style="width:50%;height:28px;margin-top:4px"></div>
      </div>
    </div>

    <!-- ── TABLA DE VENTAS ── -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Ventas registradas hoy</span>
        <span class="sale-count" id="saleCount">–</span>
      </div>
      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>#Venta</th>
              <th>Hora</th>
              <th>Artículos</th>
              <th>Total</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody id="salesBody">
            <tr>
              <td colspan="5" class="loading-state">Cargando ventas…</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <p class="footer-note" id="lastUpdate">–</p>
  </div>

  <script>
    // ── FECHA ────────────────────────────────────────────────
    function setDateLabel() {
      const now = new Date();
      const opts = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      };
      const str = now.toLocaleDateString('es-MX', opts);
      document.getElementById('dateLabel').textContent =
        str.charAt(0).toUpperCase() + str.slice(1);
    }

    // ── CARGAR REPORTE ───────────────────────────────────────
    async function loadReport() {
      const btn = document.getElementById('btnRefresh');
      btn.classList.add('spinning');

      try {
        const res = await fetch('/sales/today');
        if (!res.ok) throw new Error();
        const data = await res.json();
        renderStats(data);
        renderSales(data.sales || []);
      } catch {
        // Demo data
        const sales = [];

      }

      btn.classList.remove('spinning');
      document.getElementById('lastUpdate').innerHTML =
        'Última actualización: <strong>' + new Date().toLocaleTimeString('es-MX') + '</strong>';
    }

    // ── ESTADÍSTICAS ─────────────────────────────────────────
    function renderStats(data) {
      const total = data.total_today ?? 0;
      const count = data.sales_count ?? (data.sales?.length ?? 0);
      const avg = data.avg_ticket ?? (count > 0 ? total / count : 0);
      const items = data.items_sold ?? 0;

      document.getElementById('statsGrid').innerHTML = `
      <div class="stat-card highlight">
        <div class="stat-icon amber">💰</div>
        <span class="stat-label">Total vendido</span>
        <span class="stat-value">$${fmt(total)}</span>
        <span class="stat-sub">Ingresos del día</span>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">🧾</div>
        <span class="stat-label">Ventas realizadas</span>
        <span class="stat-value">${count}</span>
        <span class="stat-sub">Transacciones</span>
      </div>
      <div class="stat-card">
        <div class="stat-icon blue">📊</div>
        <span class="stat-label">Ticket promedio</span>
        <span class="stat-value">$${fmt(avg)}</span>
        <span class="stat-sub">Por venta</span>
      </div>
      <div class="stat-card">
        <div class="stat-icon purple">📦</div>
        <span class="stat-label">Artículos vendidos</span>
        <span class="stat-value">${items || '–'}</span>
        <span class="stat-sub">Unidades totales</span>
      </div>
    `;
    }

    // ── TABLA DE VENTAS ──────────────────────────────────────
    function renderSales(sales) {
      const tbody = document.getElementById('salesBody');
      document.getElementById('saleCount').textContent = `${sales.length} venta${sales.length !== 1 ? 's' : ''}`;

      if (!sales.length) {
        tbody.innerHTML = `
        <tr><td colspan="5" class="table-empty">
          <svg width="40" height="40" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
            <path d="M16 10a4 4 0 0 1-8 0"/>
          </svg>
          <p>No hay ventas registradas hoy.</p>
        </td></tr>`;
        return;
      }

      tbody.innerHTML = sales.map(sale => {
        const date = new Date(sale.created_at);
        const hour = isNaN(date) ? '–' : date.toLocaleTimeString('es-MX', {
          hour: '2-digit',
          minute: '2-digit'
        });
        const itemsSummary = Array.isArray(sale.items) ?
          sale.items.slice(0, 2).map(i => `${i.quantity}× ${i.name}`).join(', ') +
          (sale.items.length > 2 ? ` +${sale.items.length - 2} más` : '') :
          '–';
        const status = sale.status === 'completed' ? 'completed' : 'pending';
        const statusLabel = status === 'completed' ? 'Completada' : 'Pendiente';

        return `
        <tr>
          <td class="mono" style="color:var(--muted)">#${sale.id}</td>
          <td class="mono">${hour}</td>
          <td>
            <span>${itemsSummary || '–'}</span>
          </td>
          <td class="mono" style="color:var(--accent);font-weight:600">$${fmt(sale.total)}</td>
          <td><span class="status-badge ${status}">${statusLabel}</span></td>
        </tr>
      `;
      }).join('');
    }

    // ── UTILIDADES ───────────────────────────────────────────
    function fmt(n) {
      return (+n).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // ── INIT ─────────────────────────────────────────────────
    setDateLabel();
    loadReport();
  </script>
</body>

</html>