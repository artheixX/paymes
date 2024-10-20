<?php

namespace Paymes;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Payment {
    public $apiUrl;
    public $publicKey;

    function __construct($public_key='') {
        $this->apiUrl = "https://api.paym.es/v4.6/";
        $this->publicKey = $public_key; 
    }

    public function createOrder($orderData = []) {
        $client = new Client();
        /*
            $orderData = [
                'amount' => 1000, // Miktar
                'currency' => 'USD', // Para birimi
                'description' => 'Test Order', // Sipariş açıklaması
                // Diğer gerekli alanlar...
            ];

        */
        try {
            $response = $client->post($this->apiUrl . 'order_create', [
                'json' => $orderData,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            $body = json_decode($response->getBody(), true);
            return $body;
        } catch (RequestException $e) {
            // Hata durumunda log yaz
            $logger = new Log();
            $logger->writeEventLog('Error creating order: ' . $e->getMessage());
            return null; // Veya uygun bir hata yönetimi yapın
        }
    }
}
?>
