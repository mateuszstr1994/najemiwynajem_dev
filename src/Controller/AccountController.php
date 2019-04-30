<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2019-04-23
 * Time: 22:24
 */

namespace App\Controller;


class AccountController extends BaseController
{
    public function myAccountAction(){
        return $this->render('Account/my_account.html.twig', [
        ]);
    }

}