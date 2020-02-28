<?php

namespace bbo51dog\jetpack;

use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\event\player\PlayerJumpEvent;

class EventListener implements Listener{

    public function onJump(PlayerJumpEvent $event){
        $player = $event->getPlayer();
        $jetpack = $player->getArmorInventory()->getChestplate();
        $nbt = $jetpack->getNamedTag() ?? new CompoundTag('', []);
        if($jetpack->getId() !== Item::CHAIN_CHESTPLATE || empty($nbt->getTag('custom'))){
            return;
        }
        if($nbt->getTag('custom')->getValue() !== 'jetpack'){
            return;
        }
        $event->setCancelled();
    	$vector = $player->getDirectionVector();
        $player->setMotion(new Vector3($vector->x * 0.5, 0.3, $vector->z * 0.5));
    }
}