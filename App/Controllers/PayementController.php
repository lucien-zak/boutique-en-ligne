<?php
namespace App\Controllers;
require '../vendor/autoload.php';


class PayementController
{

    public function setStripe()
    {
        \Stripe\Stripe::setApiKey('sk_test_51KTkiULE6khc7hP3fAiVe5LCBrZCbIGRxUJoEJ7lEapYq0iz02JL5GF2ataOxyjsLtMtt7lE0m17MJNYZs3bjime00DZwC9S2r');

        $intent = \Stripe\PaymentIntent::create([
            'amount' => 2000,
            'currency' => 'eur'
        ]);
        
        
        $titrepage = "test";
        $data = $intent;
        AbstractController::render('payement', $params = ['data'=> $data, 'titre' => $titrepage]);
    }

    
}