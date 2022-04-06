<?php

namespace App\Controllers;
use App\Models\CommandModel;
use App\Models\AdressModel;
use App\Models\CardsModel;
use App\Models\ProductModel;

class CommandController extends CommandModel
{

    public function __construct()
    {
        $this->adress = new AdressModel;
        $this->product = new ProductModel;
    }

    public function allUserCommands()
    {
        $this->table = 'command';
        $this->setId_user($_SESSION['user']['id'])->getAllById_user();
    }

    public function delivery_choice()
    {
        if(!empty($_SESSION['cart']))
        {
            $titrepage = 'Votre Livraison';
            $this->table = 'adresses';
            $adress = $this->adress->setId_user($_SESSION['user']['id'])->getAllById_user();
            dump($_SESSION);
            $params = ['titre' => $titrepage, 'adress' => $adress];
            return AbstractController::render('order', $params);
        }
        else {
            header("location:/products");
        }
       
    }

    public function delivery_setrelay()
    {
        $titrepage = 'Votre point relais';
        $adress = $this->adress->setId_user($_SESSION['user']['id'])->getAllById_user();
        // $cards = $this->card->setId_user($_SESSION['user']['id'])->getAllById_user();
        $params = ['titre' => $titrepage, 'adress' => $adress, 'css' => 'after-payement'];
        $_SESSION['order']['delivery'] = "relay";
        $_SESSION['order']['typedelivery'] = "relay";
        AbstractController::render('mrelay', $params);
    }

    public function orderSession()
    {
        if(!empty($_SESSION['order']))
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function resumeOrder()
    {
        // if($this->orderSession()==true)
        // {
            $id_user = $_SESSION['user']['id'];
            $type = $_POST['typedelivery'];  
            if($type != 'Mondial Relay')
            {
                $adress = $this->adress->getCurrentAdress($type, $id_user);
                $_SESSION['order']['resume']['adress'] =  $adress->adress;
                $_SESSION['order']['resume']['zip'] =  $adress->postal_code;
            }else{
                $adress = $_REQUEST;
                $_SESSION['order']['resume']['adress'] = $adress['DeliveryAdress'];   
                $_SESSION['order']['resume']['zip'] = $adress['DeliveryPostalCode'];
            }
            $titrepage = "Resume";
            $params = ['titre' => $titrepage, 'css'=>'after-payement', 'adress' => $adress];
            AbstractController::render('payement', $params);
        
    }
    
    public function redirect ()
    {
        $_SESSION['order']['typedelivery'] = $_REQUEST['typedelivery'];
        $_SESSION['order']['delivery'] = "home";
        header("location:/order/resume");       
    }

    public function setStripe2()
    {
        \Stripe\Stripe::setApiKey('sk_test_51KTkiULE6khc7hP3fAiVe5LCBrZCbIGRxUJoEJ7lEapYq0iz02JL5GF2ataOxyjsLtMtt7lE0m17MJNYZs3bjime00DZwC9S2r');

        $email = $_SESSION['user']['email'];
        $token = $_POST['stripeToken'];

        // Create Customer In Stripe
        $customer = \Stripe\Customer::create(array(
          "email" => $email,
          "source" => $token
        ));

        // Charge Customer
        $charge = \Stripe\Charge::create(array(
          "amount" => 5000,
          "currency" => "eur",
          "description" => "Intro To React Course",
          "customer" => $customer->id
        ));

        $_SESSION['order']['resume']['last4'] = $charge->source->last4;

        // Redirect to success
        header('Location:/payement/resume');
    }


    public function newCommand()
    {
        if(!empty($_SESSION['order']))
        {
            $date = date("Y-m-d H:i:s");
            // $full_name = $_SESSION['order']['resume']['full_name'];
            $full_name = 'test';
            $command_num = rand(1000000000, 99999999999);
            if($this->checkNum_Command($command_num)>true);
            {
                $command_num = rand(1000000000, 99999999999);
            }
            $id_user = $_SESSION['user']['id'];
            $delivery_adress = $_SESSION['order']['resume']['adress'];
            $billing_adress = $_SESSION['order']['resume']['adress'];
            $four_last = $_SESSION['order']['resume']['last4'];
            $this->setDate($date)->setFull_name($full_name)->setCommand_num($command_num)->setId_user($id_user)->setDelivery_adress($delivery_adress)->setBilling_adress($billing_adress)->setFour_last($four_last);
            $this->setCommand();
    
            
                foreach($_SESSION['cart'] as $key => $product)
                {
                    $slug_id = explode('-' , $key);
                    $id = $slug_id[1];
                    $this->setId_product($id)->setQuantity($product['quantity'])->setProducts_Command();
                    $this->updateStock($id , $product['quantity']);
                }
    
                $products_command = $this->getProducts_CommandByNum();
                $command = $this->getCommandByNum();
                unset($_SESSION['order']);
                unset($_SESSION['cart']);
    
                $params = ['titre'=>'resume paiement' , 'command'=>$command, 'products'=>$products_command, 'css' => 'after-payement'];
                AbstractController::render('payement.resume', $params);
        }
        else{
            header("location:/");
        }
        
        
    }

}
