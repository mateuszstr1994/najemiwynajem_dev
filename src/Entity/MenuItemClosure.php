<?php

namespace App\Entity;

use Gedmo\Tree\Entity\MappedSuperclass\AbstractClosure;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class MenuItemClosure extends AbstractClosure
{
}