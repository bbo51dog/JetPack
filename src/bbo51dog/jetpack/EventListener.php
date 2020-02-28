<?php

namespace bbo51dog\jetpack;

use pocketmine\Server;
use bbo51dog\jetpack\task\ParticleTask;
use pocketmine\item\Item;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJumpEvent;
use pocketmine\math\Vector3;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
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
        if($jetpack->getId() !== Item::CHAIN_CHESTPLATE || empty($nbt->getTag('custom') || $player->isSneaking())){
            return;
        }
        if($nbt->getTag('custom')->getValue() !== 'jetpack'){
            return;
        }
        $vector = $player->getDirectionVector();
        $player->setMotion(new Vector3($vector->x * 0.1 , 0.9, $vector->z * 0.1));
        $pk = new PlaySoundPacket();
        $pk = new PlaySoundPacket();
        $pk->soundName = 'firework.launch';
        $pk->x = $player->x;
        $pk->y = $player->y;
        $pk->z = $player->z;
        $pk->volume = 1;
        $pk->pitch = 1;
        Server::getInstance()->broadcastPacket($player->getLevel()->getPlayers(), $pk);
        $this->scheduler->scheduleRepeatingTask(new ParticleTask($player), 2);
    }
}