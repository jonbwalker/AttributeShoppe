<?

function get_product_name($pid){
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "select NAME from product where id=$pid";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['name'];
}

function get_price($pid){
    $conn = new mysqli('localhost', 'attrib', 'password', 'attribute_shoppe');
    $sql = "select price from product where id=$pid";
    $result = $conn->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    return $row['price'];
}

function get_order_total(){
    $max=count($_SESSION['cart']);
    $sum=0;
    for($i=0;$i<$max;$i++){
        $pid=$_SESSION['cart'][$i]['productid'];
        $q=$_SESSION['cart'][$i]['qty'];
        $price=get_price($pid);
        $sum+=$price*$q;
    }
    return $sum;
}

function addtocart($pid,$q){
    if($pid<1 or $q<1) return;

    if(is_array($_SESSION['cart'])){
        if(product_exists($pid)) return;
        $max=count($_SESSION['cart']);
        $_SESSION['cart'][$max]['productid']=$pid;
        $_SESSION['cart'][$max]['qty']=$q;
    }
    else{
        $_SESSION['cart']=array();
        $_SESSION['cart'][0]['productid']=$pid;
        $_SESSION['cart'][0]['qty']=$q;
    }
}

function remove_product($pid){
    $pid=intval($pid);
    $max=count($_SESSION['cart']);
    for($i=0;$i<$max;$i++){
        if($pid==$_SESSION['cart'][$i]['productid']){
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart']=array_values($_SESSION['cart']);
}

function product_exists($pid){
    $pid=intval($pid);
    $max=count($_SESSION['cart']);
    $flag=0;
    for($i=0;$i<$max;$i++){
        if($pid==$_SESSION['cart'][$i]['productid']){
            $flag=1;
            break;
        }
    }
    return $flag;
}

?>