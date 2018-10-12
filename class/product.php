<?php
    class Product{

        function sendToAPI($url,$type,$data = ''){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url); 
            // curl_setopt($ch, CURLOPT_SSLVERSION, 1);
            // curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'TLSv1');
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);

            if($type == 'POST'){
                $data = array('data' => $data);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            $response = curl_exec($ch);
            curl_close($ch);
            $ToReturn = json_decode($response, true);
            return $ToReturn;
        }

        function getProducts(){
            $url='http://localhost/CRUD_Productos/api/products/getProducts.php';
            $ToReturn = $this->sendToAPI($url,'GET');
            return $ToReturn;
        }
        function getCategories(){
            $url='http://localhost/CRUD_Productos/api/products/getCategories.php';
            $ToReturn = $this->sendToAPI($url,'GET');
            return $ToReturn;
        }
        public function storeProduct($data){
            $url='http://localhost/CRUD_Productos/api/products/storeProduct.php';
            $ToReturn = $this->sendToAPI($url,'POST',$data);
            return $ToReturn;
            
        }
        function getProduct($data){
            $url='http://localhost/CRUD_Productos/api/products/getProduct.php';
            $ToReturn = $this->sendToAPI($url,'POST',$data);
            return $ToReturn;
        }
        public function updateProduct($data){
            $url='http://localhost/CRUD_Productos/api/products/updateProduct.php';
            $ToReturn = $this->sendToAPI($url,'POST',$data);
            return $ToReturn;
        }
        public function deleteProduct($data){
            $url='http://localhost/CRUD_Productos/api/products/deleteProduct.php';
            $ToReturn = $this->sendToAPI($url,'POST',$data);
            return $ToReturn;
        }
    }
?>