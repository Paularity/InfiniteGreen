
<?php
    session_start();
   
    $url = 'https://api.paymongo.com/v1/sources';
    // $data = array('key1' => 'value1', 'key2' => 'value2');

    // changeable
    $public_key = 'pk_test_dDMnoENhY29bNe44tEajyA8E';
    $secret_key = 'sk_test_ZMMN26Bfi8f36XFZVRk6Q5Nr';

    $data =[ "data" => [
            "attributes" => [
                //changeable
                "amount" => (float)($_SESSION['current_product_price'])*100,
                "redirect" => array(
                    // success and invalid page changeable
                    "success" => "http://localhost/infinitegreen/success-payment.php",
                    "failed" => "http://localhost/infinitegreen/invalid-payment.php",
                ),
                "type" => "gcash",
                "currency" => "PHP",
                "billing" => [
                    "name" => "#orderId_" . $_SESSION['current_product_id'] . "-" . $_SESSION['current_product_name'],
                    "phone" => "09560585678",
                    "email" => "bjay@infinitegreen.com"
                ]
            ]
        ]
        ]; 

    $dataText = $data_string = json_encode($data);
    // var_dump(urlencode($dataText));
    // var_dump(($dataText));

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERPWD, "$secret_key:$secret_key");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);                                                                     
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json')
    ); 
    
    
    $resp = curl_exec($curl);
    curl_close($curl);
    $json_a=json_decode($resp,true);    
    
    if( (float)($_SESSION['current_product_price']) >= 100 ){
    $_SESSION['current_gcash_source_id'] = $json_a['data']['id'];
    //changeable
    $_SESSION['current_gcash_product_description'] = $json_a['data']['attributes']['billing']['name'] . $json_a['data']['attributes']['created_at'];
}
    // var_dump($resp);    
    // echo 'Status: ' . $json_a['data']['attributes']['status'];
    
    // header('location: ' . $json_a['data']['attributes']['redirect']['checkout_url']);

    // echo "Name: " . $_SESSION['current_product_name'];
    // echo "Id: " . $_SESSION['current_product_id'];
    // echo "Price: " . $_SESSION['current_product_price'];
    // echo "#orderId_" . $_SESSION['current_product_id'] . "-" . $_SESSION['current_product_name'];
?>

  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">       
    <?php  if( (float)($_SESSION['current_product_price']) >= 100 )
    {  ?>
  <table class="table table-bordered">      
    <tbody>
        <tr>
            <th>Order</th>
            <td><?php echo $json_a['data']['attributes']['billing']['name'];  ?></td>
        </tr>      
        <tr>
            <th>Total Payment</th>
            <td><?php echo '₱ '. number_format((float)($json_a['data']['attributes']['amount'] / 100), 2, '.', '')  ?></td>
        </tr>      
        <tr>
            <th>Status</th>
            <td><?php echo $json_a['data']['attributes']['status']; ?></td>
        </tr>  
        <tr>
            <th>GCash Payment Number</th>
            <td><input type="text" name="" id="" /></td>
        </tr>  
        <tr >
            <td colspan="2" class="text-right">
                <a href="<?php echo $json_a['data']['attributes']['redirect']['checkout_url']; ?>" class="btn btn-primary">Continue</button>
            </td>
        </tr>  
    </tbody>
  </table>
  <?php }
  else {
    ?>
    <h3>Amount cannot be less than 100.00</h3>
        <a href="http://localhost/infinitegreen\index1.php" class="btn btn-primary">Back to Home</a>
    <?php
  }
  ?>  
</div>

</body>
</html>
