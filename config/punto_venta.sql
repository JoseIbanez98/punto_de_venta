CREATE DATABASE IF NOT EXISTS punto_venta;
USE punto_venta;

-- =========================
-- TABLA PRODUCTS
-- =========================
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) DEFAULT 0,
  stock INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status TINYINT DEFAULT 1
) ENGINE=InnoDB;

-- =========================
-- TABLA SALES
-- =========================
CREATE TABLE IF NOT EXISTS sales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  total DECIMAL(10,2) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- =========================
-- TABLA SALE_ITEM
-- =========================
CREATE TABLE IF NOT EXISTS sale_item (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sale_id INT,
  product_id INT,
  quantity INT DEFAULT 1,
  price DECIMAL(10,2) DEFAULT 0,
  
  FOREIGN KEY (sale_id) REFERENCES sales(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;

-- =========================
-- VISTA
-- =========================
CREATE OR REPLACE VIEW daily_sales_summary AS
SELECT 
  DATE(created_at) AS date,
  COUNT(*) AS sales_count,
  SUM(total) AS total_today,
  AVG(total) AS avg_ticket
FROM sales
GROUP BY DATE(created_at);