<?php
    class Product{

        public function __construct(){
            $this->db = new Db;
        }

        function getProducts(){
            $query = "  SELECT
                            p.id,
                            p.code,
                            p.name,
                            c.name AS category,
                            p.stock,
                            p.price 
                        FROM
                            products p
                            INNER JOIN categories c ON p.category_id = c.id";
            $ToReturn = $this->db->select($query);
            return $ToReturn;
        }
        function getCategories(){
            $query = "  SELECT
                            id,
                            name
                        FROM
                            categories";
            $ToReturn = $this->db->select($query);
            return $ToReturn;
        }
        public function storeProduct($code,$name,$category_id,$stock,$price){
            $query = "INSERT INTO products (code, name, category_id, stock, price, created_at) VALUES ('".$code."', '".$name."', '".$category_id."', '".$stock."', '".$price."', NOW())";
            $ToReturn = $this->db->insert($query);
            return $ToReturn;
            
        }
        function getProduct($id){
            $query = "  SELECT
                            id,
                            code,
                            name,
                            category_id,
                            stock,
                            price
                        FROM
                            products
                        WHERE
                            id = '".$id."'";
            $ToReturn = $this->db->select($query);
            return $ToReturn[0];
        }
        public function updateProduct($code,$name,$category_id,$stock,$price,$id){
            $query = "UPDATE products SET name = '".$name."', category_id = '".$category_id."', stock = '".$stock."', price = '".$price."', updated_at = NOW() WHERE id = '".$id."'";
            $ToReturn = $this->db->update($query);
            return $ToReturn;
        }
        public function deleteProduct($id){
            $query = "DELETE FROM products WHERE id = '".$id."'";
            $ToReturn = $this->db->delete($query);
            return $ToReturn;
        }
    }
?>