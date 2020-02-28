<?php

namespace bbo51dog\jetpack;


use pocketmine\inventory\ShapedRecipe;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use bbo51dog\jetpack\command\JetPackCommand;
use bbo51dog\jetpack\item\JetPack;

class JetPackPlugin extends PluginBase{

    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getCommandMap()->register('jetpack', new JetPackCommand);
    }
}