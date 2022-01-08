<?php
    session_start();
    $url = 'https://api.paymongo.com/v1/payments';
    // $data = array('key1' => 'value1', 'key2' => 'value2');

    $public_key = 'pk_test_dDMnoENhY29bNe44tEajyA8E';
    $secret_key = 'sk_test_ZMMN26Bfi8f36XFZVRk6Q5Nr';

    $data =[ "data" => [
            "attributes" => [
                // changeable
                "amount" => (float)($_SESSION['current_product_price'])*100,
                "source" => [
                    "id" => $_SESSION['current_gcash_source_id'],
                    "type" => "source"
                ],
                //changeable
                "description" => $_SESSION['current_gcash_product_description'],
                //changeable
                "statement_descriptor" => $_SESSION['current_gcash_product_description'],                
                "currency" => "PHP",
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
 <h1>Order paid successfully!</h1>
 <a href="http://localhost/infinitegreen\index1.php" class="btn btn-primary">Back to Home</a>
</div>

</body>
</html>
