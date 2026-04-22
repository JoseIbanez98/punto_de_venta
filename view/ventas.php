<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ventas – POS Papelería</title>
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
      display: flex;
      flex-direction: column;
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
      flex-shrink: 0;
    }

    .brand {
      font-weight: 700;
      font-size: 1.1rem;
      letter-spacing: -.3px;
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

    /* ── LAYOUT ── */
    .pos-layout {
      display: grid;
      grid-template-columns: 1fr 340px;
      gap: 0;
      flex: 1;
      overflow: hidden;
    }

    /* ── PRODUCTOS ── */
    .products-panel {
      padding: 20px;
      overflow-y: auto;
    }

    .panel-title {
      font-size: .75rem;
      font-weight: 600;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 14px;
    }

    .search-wrap {
      position: relative;
      margin-bottom: 16px;
    }

    .search-wrap input {
      width: 100%;
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      color: var(--text);
      padding: 10px 16px 10px 40px;
      font-family: inherit;
      font-size: .95rem;
      outline: none;
      transition: border-color .15s;
    }

    .search-wrap input:focus {
      border-color: var(--accent);
    }

    .search-wrap svg {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      pointer-events: none;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
      gap: 12px;
    }

    .product-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 18px 14px;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      gap: 8px;
      transition: border-color .15s, transform .12s, box-shadow .15s;
      user-select: none;
    }

    .product-card:hover {
      border-color: var(--accent);
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(245, 158, 11, .15);
    }

    .product-card:active {
      transform: scale(.97);
    }

    .product-card .emoji {
      font-size: 1.6rem;
    }

    .product-card .name {
      font-size: .9rem;
      font-weight: 600;
      line-height: 1.3;
      color: var(--text);
    }

    .product-card .price {
      font-family: 'DM Mono', monospace;
      font-size: .95rem;
      color: var(--accent);
      font-weight: 500;
    }

    .product-card .stock-badge {
      font-size: .72rem;
      color: var(--muted);
    }

    .no-products {
      grid-column: 1/-1;
      text-align: center;
      padding: 48px 0;
      color: var(--muted);
    }

    /* ── CARRITO ── */
    .cart-panel {
      background: var(--surface);
      border-left: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }

    .cart-header {
      padding: 18px 20px 14px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .cart-header h2 {
      font-size: 1rem;
      font-weight: 700;
    }

    .cart-count {
      background: var(--accent);
      color: #1a1c20;
      border-radius: 20px;
      font-size: .75rem;
      font-weight: 700;
      padding: 2px 9px;
    }

    .cart-items {
      flex: 1;
      overflow-y: auto;
      padding: 12px;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .cart-empty {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 8px;
      color: var(--muted);
      font-size: .9rem;
    }

    .cart-empty svg {
      opacity: .35;
    }

    .cart-item {
      background: var(--surface2);
      border-radius: 10px;
      padding: 12px;
      display: flex;
      flex-direction: column;
      gap: 6px;
      animation: slideIn .18s ease;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-6px);
      }

      to {
        opacity: 1;
        transform: none;
      }
    }

    .cart-item-name {
      font-size: .875rem;
      font-weight: 600;
    }

    .cart-item-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
    }

    .qty-control {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .qty-btn {
      width: 26px;
      height: 26px;
      border-radius: 6px;
      border: 1px solid var(--border);
      background: var(--surface);
      color: var(--text);
      font-size: 1rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background .1s;
    }

    .qty-btn:hover {
      background: var(--accent);
      color: #1a1c20;
      border-color: var(--accent);
    }

    .qty-num {
      font-family: 'DM Mono', monospace;
      font-size: .9rem;
      min-width: 20px;
      text-align: center;
    }

    .item-subtotal {
      font-family: 'DM Mono', monospace;
      font-size: .88rem;
      color: var(--accent);
      font-weight: 500;
    }

    .remove-btn {
      border: none;
      background: none;
      color: var(--muted);
      cursor: pointer;
      padding: 2px;
      border-radius: 4px;
      display: flex;
      transition: color .12s;
    }

    .remove-btn:hover {
      color: var(--danger);
    }

    /* ── TOTAL & BOTÓN ── */
    .cart-footer {
      padding: 16px 20px;
      border-top: 1px solid var(--border);
    }

    .total-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 14px;
    }

    .total-label {
      font-size: .85rem;
      color: var(--muted);
      font-weight: 600;
      letter-spacing: .04em;
      text-transform: uppercase;
    }

    .total-amount {
      font-family: 'DM Mono', monospace;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--accent);
    }

    .btn-sell {
      width: 100%;
      background: var(--accent);
      color: #1a1c20;
      border: none;
      border-radius: var(--radius);
      padding: 16px;
      font-family: inherit;
      font-size: 1.05rem;
      font-weight: 700;
      cursor: pointer;
      transition: background .15s, transform .12s;
      letter-spacing: .02em;
    }

    .btn-sell:hover {
      background: var(--accent-h);
    }

    .btn-sell:active {
      transform: scale(.98);
    }

    .btn-sell:disabled {
      background: var(--surface2);
      color: var(--muted);
      cursor: not-allowed;
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

    /* ── LOADING ── */
    .spinner {
      display: inline-block;
      width: 18px;
      height: 18px;
      border: 2px solid rgba(26, 28, 32, .4);
      border-top-color: #1a1c20;
      border-radius: 50%;
      animation: spin .7s linear infinite;
      vertical-align: middle;
      margin-right: 8px;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .pos-layout {
        grid-template-columns: 1fr;
        grid-template-rows: 1fr auto;
        height: calc(100vh - 56px);
        overflow: hidden;
      }

      .products-panel {
        overflow-y: auto;
      }

      .cart-panel {
        border-left: none;
        border-top: 1px solid var(--border);
        max-height: 42vh;
      }
    }
  </style>
</head>

<body>

  <nav>
    <div class="brand">✏️ <span>Papel</span>POS</div>
    <div class="nav-links">
      <a href="ventas" class="active">Ventas</a>
      <a href="productos">Productos</a>
      <a href="corte">Corte</a>
    </div>
  </nav>

  <div class="pos-layout">

    <!-- PANEL IZQUIERDO: PRODUCTOS -->
    <div class="products-panel">
      <p class="panel-title">Productos disponibles</p>

      <div class="search-wrap">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <circle cx="11" cy="11" r="8" />
          <path d="m21 21-4.35-4.35" />
        </svg>
        <input type="text" id="searchInput" placeholder="Buscar producto…" oninput="filterProducts()" />
      </div>

      <div class="products-grid" id="productsGrid">
        <div class="no-products">Cargando productos…</div>
      </div>
    </div>

    <!-- PANEL DERECHO: CARRITO -->
    <div class="cart-panel">
      <div class="cart-header">
        <h2>Carrito</h2>
        <span class="cart-count" id="cartCount">0</span>
      </div>

      <div class="cart-items" id="cartItems">
        <div class="cart-empty" id="cartEmpty">
          <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
          </svg>
          <span>El carrito está vacío</span>
        </div>
      </div>

      <div class="cart-footer">
        <div class="total-row">
          <span class="total-label">Total</span>
          <span class="total-amount" id="cartTotal">$0.00</span>
        </div>
        <button class="btn-sell" id="btnSell" onclick="processSale()" disabled>
          Registrar venta
        </button>
      </div>
    </div>
  </div>

  <div id="toast"></div>

  <script>
    // ── ESTADO ──────────────────────────────────────────────
    let allProducts = [];
    let cart = []; // [{ product_id, name, price, quantity }]

    const EMOJIS = ['📏', '✏️', '🖊️', '📐', '📌', '🖇️', '📎', '📓', '📔', '🗂️', '🗃️', '📦', '🔏', '✂️', '🖍️', '🖋️'];

    // ── CARGAR PRODUCTOS ────────────────────────────────────
    async function loadProducts() {
      try {
        const res = await fetch('/products');
        if (!res.ok) throw new Error('Error al cargar productos');
        allProducts = await res.json();
      } catch (e) {
        allProducts = [];
      }
      renderProducts(allProducts);
    }

    function renderProducts(products) {
      const grid = document.getElementById('productsGrid');

      // 🔥 filtrar solo activos
      const activeProducts = products.filter(p => p.status == 1);

      if (!activeProducts.length) {
        grid.innerHTML = '<div class="no-products">No hay productos disponibles</div>';
        return;
      }

      grid.innerHTML = activeProducts.map((p, i) => `
    <div class="product-card" onclick="addToCart(${p.id})">
      <span class="emoji">${EMOJIS[i % EMOJIS.length]}</span>
      <span class="name">${esc(p.name)}</span>
      <span class="price">$${fmt(p.price)}</span>
      <span class="stock-badge">Stock: ${p.stock ?? '–'}</span>
    </div>
  `).join('');
    }

    function filterProducts() {
      const q = document.getElementById('searchInput').value.toLowerCase();
      renderProducts(allProducts.filter(p => p.name.toLowerCase().includes(q)));
    }

    // ── CARRITO ─────────────────────────────────────────────
    function addToCart(productId) {
      const product = allProducts.find(p => p.id === productId);
      if (!product) return;
      if (product.stock <= 0) {
        showToast('❌ Sin stock disponible', true);
        return;
      }
      const existing = cart.find(i => i.product_id === productId);
      if (existing) {
        if (existing.quantity >= product.stock) {
          showToast('❌ No hay más stock disponible', true);
          return;
        }
        existing.quantity++;
      } else {
        cart.push({
          product_id: product.id,
          name: product.name,
          price: product.price,
          quantity: 1
        });
      }
      renderCart();
    }

    function changeQty(productId, delta) {
      const item = cart.find(i => i.product_id === productId);
      if (!item) return;
      item.quantity += delta;
      if (item.quantity <= 0) cart = cart.filter(i => i.product_id !== productId);
      renderCart();
    }

    function removeItem(productId) {
      cart = cart.filter(i => i.product_id !== productId);
      renderCart();
    }

    function renderCart() {
      const container = document.getElementById('cartItems');
      const countEl = document.getElementById('cartCount');
      const totalEl = document.getElementById('cartTotal');
      const btn = document.getElementById('btnSell');

      const total = cart.reduce((s, i) => s + i.price * i.quantity, 0);
      const count = cart.reduce((s, i) => s + i.quantity, 0);

      countEl.textContent = count;
      totalEl.textContent = '$' + fmt(total);
      btn.disabled = cart.length === 0;

      if (!cart.length) {
        container.innerHTML = `
        <div class="cart-empty" id="cartEmpty">
          <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
            <line x1="3" y1="6" x2="21" y2="6"/>
          </svg>
          <span>El carrito está vacío</span>
        </div>`;
        return;
      }

      container.innerHTML = cart.map(item => `
      <div class="cart-item" data-id="${item.product_id}">
        <span class="cart-item-name">${esc(item.name)}</span>
        <div class="cart-item-row">
          <div class="qty-control">
            <button class="qty-btn" onclick="changeQty(${item.product_id}, -1)">−</button>
            <span class="qty-num">${item.quantity}</span>
            <button class="qty-btn" onclick="changeQty(${item.product_id}, 1)">+</button>
          </div>
          <span class="item-subtotal">$${fmt(item.price * item.quantity)}</span>
          <button class="remove-btn" onclick="removeItem(${item.product_id})" title="Eliminar">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path d="M18 6 6 18M6 6l12 12"/>
            </svg>
          </button>
        </div>
      </div>
    `).join('');
    }

    // ── VENTA ────────────────────────────────────────────────
    async function processSale() {
      if (!cart.length) return;
      const btn = document.getElementById('btnSell');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner"></span>Procesando…';

      const payload = {
        total: +cart.reduce((s, i) => s + i.price * i.quantity, 0).toFixed(2),
        items: cart.map(i => ({
          product_id: i.product_id,
          quantity: i.quantity,
          price: i.price
        }))
      };

      try {
        const res = await fetch('/sales', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(payload)
        });
        const data = await res.json();

        if (!res.ok) {
          throw new Error(data.error || 'Error al registrar la venta');
        }
        cart = [];
        renderCart();
        loadProducts();
        showToast('✅ Venta registrada exitosamente', false);
      } catch (e) {
        showToast('❌ ' + e.message, true);
      } finally {
        btn.innerHTML = 'Registrar venta';
        btn.disabled = !cart.length;
      }
    }

    // ── UTILIDADES ───────────────────────────────────────────
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
      setTimeout(() => t.classList.remove('show'), 2800);
    }

    // ── INIT ─────────────────────────────────────────────────
    loadProducts();
  </script>
</body>

</html>