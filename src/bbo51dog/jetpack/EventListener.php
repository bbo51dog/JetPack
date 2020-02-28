<?php

namespace bbo51dog\jetpack;

use bbo51dog\jetpack\task\ParticleTask;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJumpEvent;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\scheduler\TaskScheduler;

class EventListener implements Listener{

    /** @var TaskScheduler */
    private $scheduler;

    public function __construct(TaskScheduler $scheduler){
        $this->scheduler = $scheduler;
    }

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
        $vector = $player->getDirectionVector();
        $player->setMotion(new Vector3($vector->x * 0.1 , 0.9, $vector->z * 0.1));
        $this->scheduler->scheduleRepeatingTask(new ParticleTask($player), 2);
    }
}