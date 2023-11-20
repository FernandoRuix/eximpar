<?php
include "../admin/config.php";
include "../admin/functions.php";

$db = conexion($db_config);

$cart = new cartRecords($db);

if(!empty($_POST['action']) && $_POST['action'] == 'addCart') {
	$cart->add_cart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'listCart') {
	$cart->list_cart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'clearCart') {
	$cart->clear_cart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'removeCart') {
	$cart->remove_cart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateCart') {
	$cart->update_cart();
}
if(!empty($_POST['action']) && $_POST['action'] == 'finishOrder') {
	$cart->finish_order();
}

class cartRecords{
    private $conn;
	public function __construct($db){
        $this->conn = $db;
    }	

    public function update_cart(){
        $cookie_data = $_COOKIE['shopping_cart'];
        $cart_data = json_decode($cookie_data, true);

        $form_array = $_POST['formqty'];

        for ($i=0; $i < count($cart_data); $i++) { 
            $cart_data[$i]['item_quantity'] = $form_array[$i];
        }

        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400), '/', null);
        echo true;
    }

    public function remove_cart(){
        $cookie_data = $_COOKIE['shopping_cart'];
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $keys => $values) {
            if($cart_data[$keys]['item_id'] == $_POST["id"]) {
                unset($cart_data[$keys]);
            }
        }
        $cart_data = array_values($cart_data);
        $item_data = json_encode($cart_data);
        setcookie("shopping_cart", $item_data, time() + (86400), '/', null);
        echo true;
    }

    public function clear_cart(){
        setcookie("shopping_cart", "", time() - 3600, '/', null);
        echo true;
    }

    public function list_cart(){
        if(isset($_COOKIE['shopping_cart'])){
            $cart_items = json_decode($_COOKIE['shopping_cart'], true);
            $cart_quantity = count($cart_items);
        } else {
            $cart_items = false;
            $cart_quantity = 0;
        }
        $total_data = [$cart_items, $cart_quantity];
        echo json_encode($total_data);
    }

    public function add_cart(){
        $sql = 'SELECT * FROM 
                    productos A  
                JOIN 
                    marcas B
                ON
                    id_marcas = marcas_id
                WHERE 
                    productos_id = :identifier
                ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([ ':identifier' => $_POST['id'] ]);
        $allRecords = $stmt->fetchAll();
        if (isset($_COOKIE["shopping_cart"])) {
            $cookie_data = $_COOKIE['shopping_cart'];
            $cart_data = json_decode($cookie_data, true);
        } else {
            $cart_data = array();
        }
        $cart_data = array_values($cart_data);

        $item_id_list = array_column($cart_data, 'item_id');

        if(in_array($_POST["id"], $item_id_list)) {
            foreach($cart_data as $keys => $values) {
                if($cart_data[$keys]["item_id"] == $_POST["id"]) {
                    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
                }
            }
        } else {
            $item_array = array(
                'item_id'			=>	$_POST["id"],
                'item_name'			=>	$allRecords[0]['prd_titulo'],
                'item_image'	    =>	$allRecords[0]['prd_thumb'],
                'item_presentation'	=>	$allRecords[0]['prd_presentacion'],
                'item_marca'	    =>	$allRecords[0]['mar_titulo'],
                'item_dbname'		=>	$allRecords[0]['prd_dbtitulo'],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $cart_data[] = $item_array;
        }
        $cart_data = array_values($cart_data);

        
        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400), '/', null);
        echo true;
    }

    public function finish_order(){
        if(isset($_COOKIE['shopping_cart'])){
            $cookie_data = $_COOKIE['shopping_cart'];
            $cart_data = json_decode($cookie_data, true);
            $user_data = $_POST['user_info'];

            //GET A RANDOM KEYCODE FOR CART
            $l1 = strtolower(substr(base64_encode($user_data[0]), 0, 1));
            $l2 = substr(base64_encode($user_data[1]), 0, 1);
            $l3 = strtolower(substr(base64_encode($user_data[2]), 0, 1));
            $l4 = substr(base64_encode($user_data[3]), 0, 1);
            $l5 = strtolower(substr(base64_encode($user_data[4]), 0, 1));
            $l6 = substr(base64_encode($user_data[5]), 0, 1);
            $l7 = strtolower(substr(base64_encode($user_data[6]), 0, 1));
            $url = $l1.$l2.$l3.$l4.$l5.$l6.$l7;

            $sql = "
                INSERT INTO solicitudes 
                (soli_nombre, soli_apellido, soli_empresa, soli_ciudad, soli_departamento, soli_telefono, soli_correo, soli_nota, soli_url_key) 
                VALUES (:name, :apellido, :empresa, :ciudad, :depto, :telefono, :correo, :nota, :url_key)
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":name"     => $user_data[0],
                ":apellido" => $user_data[1],
                ":empresa"  => $user_data[2],
                ":ciudad"   => $user_data[3],
                ":depto"    => $user_data[4],
                ":telefono" => $user_data[5],
                ":correo"   => $user_data[6],
                ":nota"     => $user_data[7],
                ":url_key"  => $url
            ]);

            //COOKIE USUARIO PARA FORM
            

            //LAST ID
            $sql = "SELECT * FROM solicitudes ORDER BY solicitudes_id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt = $stmt->fetchAll();
            $lastID = $stmt[0]['solicitudes_id'];

            foreach($cart_data as $item){
                $sql = 'INSERT INTO items_solicitudes(
                    iteso_descripcion,
                    iteso_presen,
                    iteso_marca,
                    iteso_cantidad,
                    id_solicitudes
                )
                VALUES(
                    :descrip,
                    :presen,
                    :marca,
                    :canti,
                    :soli_id
                )';
                $stmt = $this->conn->prepare($sql);
                $status = $stmt->execute([
                    ":descrip"  => $item['item_name'],
                    ":presen"   => $item['item_presentation'],
                    ":marca"    => $item['item_marca'],
                    ":canti"    => $item['item_quantity'],
                    ":soli_id"  => $lastID
                ]);
            }

            if($status){
                setcookie("shopping_cart", "", time() - 3600, '/', null);
                //ENVIAR MAIL
                $response = [true, $lastID, $url];
                echo json_encode($response);
            }
        }else{
            echo false;
        }
    }

}







