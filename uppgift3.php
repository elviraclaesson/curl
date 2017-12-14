<?php

require(__DIR__.'/config.php');

$curl = curl_init();
$fileName = "milletech.json";
$fp = fopen($fileName, "w");

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.milletech.se/invoicing/export/customers",
  CURLOPT_FILE => $fp,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "postman-token: d0f852d2-e7c3-62dd-f118-8566fb29cf0f"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

fclose($fp);
$content = file_get_contents($fileName);
$data = json_decode($content, true);

foreach ($data as $row)  {
var_dump($row);
$email = $row['email'];
$firstname = $row['firstname'];
$lastname =$row['lastname'];
$gender =$row['gender'];
$customer_activated =$row['customer_activated'];
$group_id =$row['group_id'];
$customer_company =$row['customer_company'];
$default_billing=$row['default_billing'];
$default_shipping =$row['default_shipping'];
$is_activate =$row['is_active'];
$created_at =$row['created_at'];
$updated_at =$row['updated_at'];
$customer_invoice_email =$row['customer_invoice_email'];
$customer_extra_text =$row['customer_extra_text'];
$customer_due_date_period =$row['customer_due_date_period'];
$id =$row['id'];

$id_adress=$row['address']['id'];
$customer_id=$row['address']['customer_id'];
$customer_address_id=$row['address']['customer_address_id'];
$email_adress=$row['address']['email'];
$firstname_adress=$row['address']['firstname'];
$lastname_adress=$row['address']['lastname'];
$postcode=$row['address']['postcode'];
$street=$row['address']['street'];
$city=$row['address']['city'];
$telephone=$row['address']['telephone'];
$country_id=$row['address']['country_id'];
$address_type=$row['address']['address_type'];
$company=$row['address']['company'];
$country=$row['address']['country'];
die();





  if (isset($id)) {
  $sql = "INSERT INTO user_1 (email, firstname, lastname, gender, customer_activated, group_id, customer_company, default_shipping, default_billing, is_activate, created_at, updated_at, customer_invoice_email, customer_extra_text, customer_due_date_period, id)
  VALUES (:email, :firstname, :lastname, :gender, :customer_activated, :group_id, :customer_company, :default_shipping, :default_billing, :is_activate, :created_at, :updated_at, :customer_invoice_email, :customer_extra_text, :customer_due_date_period, :id)";
      $intoDb = $pdo->prepare($sql);
      $intoDb->execute([
        'email' => $email,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'gender' => $gender,
        'customer_activated' => $customer_activated,
        'group_id' => $group_id,
        'customer_company' => $customer_company,
        'default_billing' => $default_billing,
        'default_shipping' => $default_shipping,
        'is_activate' => $is_activate,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
        'customer_invoice_email' => $customer_invoice_email,
        'customer_extra_text' => $customer_extra_text,
        'customer_due_date_period' => $customer_due_date_period,
        'id' => $id
        ]); 
  
  
 
  }
}