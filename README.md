use Yubi\Xendit\Invoice;

app(Invoice::class)->create([
'external_id' => 'x-'.time(),
'payer_email' => 'hasandotprayoga@gmail.com',
'description' => 'Desc',
'amount' => 10000
]);

use Yubi\Xendit\QrCodes;
app(QrCodes::class)->create([
'external_id' => 'x-'.time(),
'type' => 'DYNAMIC',
'callback_url' => 'https://hasanprayoga.com',
'amount' => 100000
]);

use Yubi\Xendit\CardlessCredit;
app(CardlessCredit::class)->create([
'cardless_credit_type' => 'KREDIVO',
'external_id' => 'X-'.time(),
'amount' => 100000,
'payment_type' => '3_months',
'items' => [
[
"id" => "123123",
"name" => "Phone Case",
"price" => 100000,
"type" => "Smartphone",
"url"=> "http://example.com/phone/phone_case",
"quantity"=> 1
]
],
"customer_details"=>[
"first_name"=> "customer first name",
"last_name"=> "customer last name",
"email"=> "customer@yourwebsite.com",
"phone"=> "081513114262"
],
"shipping_address"=>[
"first_name"=> "first name",
"last_name"=> "last name",
"address"=> "Jalan Teknologi No. 12",
"city"=> "Jakarta",
"postal_code"=> "12345",
"phone"=> "081513114262",
"country_code"=> "IDN"
],
"redirect_url"=> "https://example.com",
"callback_url"=> "http://example.com/callback-cardless-credit"
]);
