<?php

namespace bbo51dog\jetpack\task;

use pocketmine\Player;
use pocketmine\level\particle\FlameParticle;
use pocketmine\math\Vector3;
use pocketmine\scheduler\Task;

class ParticleTask extends Task{

    /** @var Player */
    private $player;

    /** @var int */
    private $count;

    public function __construct(Player $player){
        $this->player = $player;
    }

    public function onRun(int $tick){
        if($this->count === 10 || !$this->player->isOnline()){
            $this->getHandler()->cancel();
            return;
        }
        $particle = new FlameParticle(new Vector3($this->player->x, $this->player->y + 1, $this->player->z));
        $this->player->getLevel()->addParticle($particle);
        $this->count++;
    }
}