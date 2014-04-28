<?

function get_product_name($productId){
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "select NAME from PRODUCT where id='$productId'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['NAME'];
}

function get_price($productId){
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "select PRICE from PRODUCT where id='$productId'";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['PRICE'];
}

function get_order_total(){
    if(isset($_SESSION['cart'])){
    $lineItem=count($_SESSION['cart']);
    $sum=0;
    for($i=0;$i<$lineItem;$i++){
        $productId=$_SESSION['cart'][$i]['productid'];
        $quantity=$_SESSION['cart'][$i]['qty'];
        $price=get_price($productId);
        $sum+=$price*$quantity;
    }
    return $sum;
    }
}

function addtocart($productId,$quantity){
    if($productId<1 or $quantity<1) return;

    if(is_array($_SESSION['cart'])){
        if(product_exists($productId)) return;
        $lineItem=count($_SESSION['cart']);
        $_SESSION['cart'][$lineItem]['productid']=$productId;
        $_SESSION['cart'][$lineItem]['qty']=$quantity;
    }
    else{
        $_SESSION['cart']=array();
        $_SESSION['cart'][0]['productid']=$productId;
        $_SESSION['cart'][0]['qty']=$quantity;
    }
}

function remove_product($productId){
    $productId=intval($productId);
    $lineItem=count($_SESSION['cart']);
    for($i=0;$i<$lineItem;$i++){
        if($productId==$_SESSION['cart'][$i]['productid']){
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart']=array_values($_SESSION['cart']);
}

function product_exists($productId){
    $productId=intval($productId);
    $lineItem=count($_SESSION['cart']);
    $flag=0;
    for($i=0;$i<$lineItem;$i++){
        if($productId==$_SESSION['cart'][$i]['productid']){
            $flag=1;
            break;
        }
    }
    return $flag;
}

function getUserAddress() {
    $username = $_SESSION['username'];

    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $user = "SELECT * FROM USER WHERE USERNAME= '$username' ";
    $result = $conn->query($user);
    $userResults = $result->fetch_array(MYSQLI_ASSOC);

    $userId = $userResults['ADDRESS_ID'];

    $address = "SELECT * FROM ADDRESS WHERE ID = '$userId' ";
    $addressQuery = $conn->query($address);
    $addressResults = $addressQuery->fetch_array(MYSQLI_ASSOC);
    $street = $addressResults['STREET'];
    $city = $addressResults['CITY'];
    $state = $addressResults['STATE'];
    $zip = $addressResults['ZIPCODE'];
    return compact("street", "city", "state", "zip");
}

?>