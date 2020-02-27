<?php

namespace bbo51dog\jetpack;

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginBase;
use bbo51dog\jetpack\item\JetPack;

class JetPackPlugin extends PluginBase{

    public function onEnable(){
        $jetpack = new JetPack(JetPack::ID, JetPack::META, JetPack::NAME);
        ItemFactory::registerItem($jetpack);
        Item::addCreativeItem($jetpack);
    }
}