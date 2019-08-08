# laravel-asaas-api-v3
Pacote independente de integracao Asaas.com para Laravel 5

# How to use

install the package with command
```
composer require fabianobn/laravel-asaas-api-v3
```

## Create cliente

``` 
use Asaas\Api\Asaas;

$asaas = new Asaas;
$cliente = [
  'name' => 'Laravel',
  'cpfCnpj' => '99999999999999',
  'email' => 'laravel@laravel.com'
];
$create_cliente = $asaas->cliente->create($cliente);
$response = json_decode($create_cliente['response']->getContents(), true);
$cliente_id = $response['id];
```

## Create cobrança

```
$cobranca = [
  'customer' => $cliente_id['id'],
  'billingType' => 'BOLETO',
  'value' => '100',
  'dueDate' => date('Y-m-d'),
  'description' => 'Payment info'
];
$create_cobranca = $asaas->cobranca->create($cobranca);
```

## Credits
First credit to [Rafael - Laravel Asaas](https://github.com/rafaelxavierborges/laravel-asaas-api-v3)
