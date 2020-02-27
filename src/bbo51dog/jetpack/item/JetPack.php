<?php

namespace bbo51dog\jetpack\item;

use pocketmine\item\Armor;

class JetPack extends Armor{

    /** @var int */
    public const ID = 600;

    /** @var int */
    public const META = 0;

    /** @var string */
    public const NAME = 'Jet Pack';

    public function __construct(){
        parent::__construct(self::ID, self::META, self::NAME);
        $this->setUnbreakable();
    }

    public function getMaxDurability(): int{
        return 0;
    }
}