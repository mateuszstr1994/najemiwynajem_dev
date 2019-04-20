<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2019-04-20
 * Time: 18:26
 */

namespace App\Service;
use App\Entity\EmailTemplate;

class EmailTemplateService extends AbstractBaseEntityService
{
    protected $entityClass = EmailTemplate::class;

}