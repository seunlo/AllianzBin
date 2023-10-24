<?php
include_once "../classes/Payment.php";
if ($_POST) {
  $reference = $_POST["reference"];
  $cust_id = $_POST["cust_id"];

  $curl = curl_init();
  curl_setopt_array(
    $curl,
    array(
      CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_43be7f0842fd571d3b97c09adc269d6067b875c5",
        "Cache-Control: no-cache",
      ),
    )
  );

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    //echo $response;
    $res = json_decode($response);
    $response = $res->data;
    //($do_refcode, $do_amount, $do_userid, $do_status, $do_data, $do_payment_time)
    //$response->reference
    //$response->amount
    //$user_id
    //$response->do_status
    //$response
    //$response->paid_at

    //convert final response to json
    $f_response = json_encode($response);
    $dona = new Payment();
    $result = $dona->insert_payment_record($response->reference, $response->amount/100, $cust_id, $response->status, $f_response, $response->paid_at);
    //first was the record inserted in db
    if ($result) {
      //was the payment successful
      if ($response->status == "success") {
        $final_response = [
          "success" => true,
          "message" => "Donation successful"
        ];
      } else { //payment was not successful
        $final_response = [
          "success" => false,
          "message" => "Donation not successful"
        ];
        echo json_encode($final_response);
      }
    }

  }
}

?>