<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController
{

    private $product;

    public function __construct($db)
    {
        $this->product = new Product($db);
    }

    public function index()
    {
        echo json_encode($this->product->getAll());
    }

    public function store()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        try {
            $product = $this->product->create($data);

            echo json_encode([
                "message" => "Producto creado",
                "product" => $product
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
    }
    public function restock()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        try {
            $this->product->restock(
                $data['product_id'],
                $data['quantity']
            );

            echo json_encode([
                "message" => "Stock actualizado correctamente"
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
    }

    public function changeStatus()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['product_id'] ?? null;
        try {
            $newStatus = $this->product->toggleStatus($id);

            echo json_encode([
                "message" => $newStatus == 1 ? "Producto activado" : "Producto desactivado",
                "status" => $newStatus

            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
    }
}
