<?php



class UserModel
{
 public static function logOut(){
     //Выход из учётной записи
    unset($_SESSION["login"]);
    unset($_SESSION["password"]);
    $_SESSION['auth'] = 0;
 }
//  public static function loadOrderInfo()
//  {
//     $orders = self::getOrdersList();
//     foreach ($orders as $order){
//         $orders_info = 
//     }
//     //  //получение данных о пользователе
    //  $login = $_SESSION["login"];
    //  $sql_user_id = "SELECT user_id FROM users WHERE user_login = '$login'";
    //  $user_id = DataBaseConnection::connect()->query($sql_user_id)->fetch_column();
    //  //получение данных о заказах пользователя
    //  $sql_order_info = "SELECT order_id, order_date, order_sum
    // FROM orders
    // INNER JOIN users ON orders.order_user_id = users.user_id
    // WHERE users.user_id = '$user_id'";
    // $sql_order_cart = "SELECT order_product_id, product_count,product_price 
    // FROM order_product
    // ";
    //  $sql_result = DataBaseConnection::connect()->query($sql_order_info)->fetch_all();
    //  return $sql_result;
    
//  }
public static function getOrdersList() {
   // Получение данных о пользователе
   $login = $_SESSION["login"];
   $sql_user_id = "SELECT user_id FROM users WHERE user_login = '$login'";
   $user_id = DataBaseConnection::connect()->query($sql_user_id)->fetch_column();
   
   // Получение информации о продуктах
   $json = $_SESSION['products'];
   $json = json_decode($json, true);
   
   // Получение всех заказов пользователя
   $sql_orders_list = "SELECT order_id, order_date, order_sum
                       FROM orders
                       WHERE order_user_id = '$user_id'
                       ORDER BY order_date DESC";
  
   $orders_list = DataBaseConnection::connect()->query($sql_orders_list)->fetch_all();
   
   $result = '<div class="orders-container">';
   $result .= '<h2 class="orders-title">Ваши заказы</h2>';
   
   foreach ($orders_list as $order) {
       $order_num = $order[0];
       $order_date = $order[1];
       $order_total = $order[2];
       
       $result .= '<div class="order-card">';
       $result .= '<div class="order-header">';
       $result .= '<span class="order-number">Заказ #'.$order_num.'</span>';
       $result .= '<span class="order-date">'.date('d.m.Y', strtotime($order_date)).'</span>';
       $result .= '</div>';
       
       $sql_orders_info = "SELECT op.order_product_id, op.product_count, op.product_price, 
                          p.product_title, p.product_image
                          FROM order_product op
                          JOIN products p ON op.order_product_id = p.product_id
                          WHERE op.order_id = '$order_num'";
       
       $order_info = DataBaseConnection::connect()->query($sql_orders_info)->fetch_all();
       
       $result .= '<div class="order-items">';
       foreach ($order_info as $product) {
           $product_id = $product[0];
           $quantity = $product[1];
           $price = $product[2];
           $product_title = $product[3];
           $product_image = $product[4];
           
           $result .= '<div class="order-item">';
           $result .= '<div class="product-image-container">';
           $result .= '<img class="order-product-image" 
                          src="/assets/images/products/'.$product_image.'" 
                          alt="'.$product_title.'"
                          width="360"
                          height="144">';
           $result .= '</div>';
           $result .= '<div class="product-info">';
           $result .= '<a href="product/'.$product_id.'" class="product-title">'.$product_title.'</a>';
           $result .= '<div class="product-price">'.$price.'₽ × '.$quantity.'</div>';
           $result .= '</div>';
           $result .= '<div class="product-total">'.($price * $quantity).'₽</div>';
           $result .= '</div>'; // закрытие order-item
       }
       $result .= '</div>'; // закрытие order-items
       
       $result .= '<div class="order-footer">';
       $result .= '<div class="order-total">Итого: '.$order_total.'₽</div>';
       $result .= '</div>';
       
       $result .= '</div>'; // закрытие order-card
   }
   
   $result .= '</div>'; // закрытие orders-container
   
   return $result;
}
}