<?php
class Sale
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function store()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $this->conn->beginTransaction();

        try {

            if (!isset($data['items']) || !is_array($data['items']) || empty($data['items'])) {
                throw new Exception("Datos inválidos");
            }
            foreach ($data['items'] as $item) {
                $stmt = $this->conn->prepare("
                SELECT stock, name FROM products WHERE id = ?
            ");
                $stmt->execute([$item['product_id']]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$product) {
                    throw new Exception("Producto no encontrado");
                }

                if ($product['stock'] < $item['quantity']) {
                    throw new Exception("Stock insuficiente para el producto: " . $product['name']);
                }
            }

            // 🟢 2. INSERTAR VENTA
            $stmt = $this->conn->prepare("INSERT INTO sales (total) VALUES (?)");
            $stmt->execute([$data['total']]);
            $saleId = $this->conn->lastInsertId();

            // 🟢 3. INSERTAR ITEMS + DESCONTAR STOCK
            foreach ($data['items'] as $item) {

                // guardar item
                $stmt = $this->conn->prepare("
                INSERT INTO sale_item (sale_id, product_id, quantity, price)
                VALUES (?, ?, ?, ?)
            ");
                $stmt->execute([
                    $saleId,
                    $item['product_id'],
                    $item['quantity'],
                    $item['price']
                ]);

                // descontar stock
                $stmt = $this->conn->prepare("
                UPDATE products 
                SET stock = stock - ?
                WHERE id = ?
            ");
                $stmt->execute([
                    $item['quantity'],
                    $item['product_id']
                ]);
            }

            $this->conn->commit();

            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    // 🟡 RESUMEN (usa la vista)
    public function getTodaySummary()
    {
        $stmt = $this->conn->prepare("
            SELECT * 
            FROM daily_sales_summary
            WHERE date = CURDATE()
        ");
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🟢 VENTAS DEL DÍA
    public function getTodaySales()
    {
        $stmt = $this->conn->prepare("
            SELECT * 
            FROM sales
            WHERE DATE(created_at) = CURDATE()
            ORDER BY created_at DESC
        ");
        $stmt->execute();

        $sales = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 🔥 meter items a cada venta
        foreach ($sales as &$sale) {
            $sale['items'] = $this->getItemsBySale($sale['id']);
        }

        return $sales;
    }

    // 🔵 ITEMS POR VENTA
    private function getItemsBySale($saleId)
    {
        $stmt = $this->conn->prepare("
            SELECT si.quantity, p.name
            FROM sale_item si
            JOIN products p ON p.id = si.product_id
            WHERE si.sale_id = ?
        ");
        $stmt->execute([$saleId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🟣 TOTAL DE ARTÍCULOS VENDIDOS
    public function getItemsSoldToday()
    {
        $stmt = $this->conn->prepare("
            SELECT SUM(si.quantity) as total
            FROM sale_item si
            JOIN sales s ON s.id = si.sale_id
            WHERE DATE(s.created_at) = CURDATE()
        ");
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ?? 0;
    }
}
