<?php
namespace App\Controllers;

class PayementController
{

    public function setStripe2()
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

    // public function setStripe2()
    // {
    //     $stripe = new \Stripe\StripeClient(
    //         'sk_test_51KTkiULE6khc7hP3fAiVe5LCBrZCbIGRxUJoEJ7lEapYq0iz02JL5GF2ataOxyjsLtMtt7lE0m17MJNYZs3bjime00DZwC9S2r'
    //       );
    //       $intent = $stripe->paymentMethods->create([
    //         'type' => 'card',
    //         'card' => [
    //           'number' => '4242424242424242',
    //           'exp_month' => 3,
    //           'exp_year' => 2023,
    //           'cvc' => '314',
    //         ],
    //       ]);
    //     $titrepage = "test";

    //   AbstractController::render('payement', $params = ['data'=> $intent, 'titre' => $titrepage]);

    // }

}