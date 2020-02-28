<?php

namespace bbo51dog\jetpack\item;

use pocketmine\item\ChainChestplate;

class JetPack extends ChainChestplate{

    /** @var string */
    public const NAME = 'Jet Pack';

    public function __construct(){
        parent::__construct(0);
        $this->setUnbreakable();
        $this->setCustomName(self::NAME);
        $nbt = $this->getNamedTag();
        $nbt->setByte('jetpack', true);
        $this->setNamedTag($nbt);
    }
}