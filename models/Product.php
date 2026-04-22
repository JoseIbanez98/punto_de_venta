<?php
class Product
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->query("SELECT * FROM products ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
        INSERT INTO products (name, price, stock)
        VALUES (?, ?, ?)
    ");

        $stmt->execute([
            $data['name'],
            $data['price'],
            $data['stock']
        ]);

        $id = $this->conn->lastInsertId();


        return [
            "id" => $id,
            "name" => $data['name'],
            "price" => $data['price'],
            "stock" => $data['stock']
        ];
    }

    public function restock($productId, $quantity)
    {

        if ($quantity <= 0) {
            throw new Exception("Cantidad inválida");
        }

        $stmt = $this->conn->prepare("
        UPDATE products 
        SET stock = stock + ? 
        WHERE id = ?
    ");

        $stmt->execute([$quantity, $productId]);

        if ($stmt->rowCount() === 0) {
            throw new Exception("Producto no encontrado");
        }

        return true;
    }

    public function toggleStatus($id)
    {
        // 1. obtener estado actual
        $stmt = $this->conn->prepare("
        SELECT status FROM products WHERE id = ?
    ");
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            throw new Exception("Producto no encontrado");
        }

        // 2. invertir estado
        $newStatus = $product['status'] == 1 ? 0 : 1;

        // 3. actualizar
        $stmt = $this->conn->prepare("
        UPDATE products SET status = ? WHERE id = ?
    ");
        $stmt->execute([$newStatus, $id]);

        return $newStatus;
    }
}
