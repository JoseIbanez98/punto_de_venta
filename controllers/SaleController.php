<?php
require_once __DIR__ . '/../models/Sale.php';
class SaleController
{

    private $sale;

    public function __construct($db)
    {
        $this->sale = new Sale($db);
    }
    public function store()
    {
        try {
            $this->sale->store();

            echo json_encode([
                "message" => "Venta registrada correctamente"
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                "error" => $e->getMessage()
            ]);
        }
    }

    public function reportSale()
    {

        try {
            $summary = $this->sale->getTodaySummary();
            error_log("Resumen del día: " . print_r($summary, true));
            $sales   = $this->sale->getTodaySales();

            echo json_encode([
                "total_today" => $summary['total_today'] ?? 0,
                "sales_count" => $summary['sales_count'] ?? 0,
                "avg_ticket"  => $summary['avg_ticket'] ?? 0,
                "items_sold"  => $this->sale->getItemsSoldToday(),
                "sales"       => $sales
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                "error" => "Error al obtener el corte"
            ]);
        }
    }
}
