<?php

namespace bbo51dog\jetpack\command;

use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use bbo51dog\jetpack\item\JetPack;

class JetPackCommand extends Command{

    private const PREFIX = '§6[§cJetPack§6]§r ';

    public function __construct(){
        $this->setPermission('jetpack.command');
        parent::__construct("jetpack", "Give JetPack Command", "/jetpack");
    } 
    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if(!$sender instanceof Player){
            $sender->sendMessage(self::PREFIX.'§cサーバー内で実行してください');
            return;
        }
        $inventory = $sender->getInventory();
        $jetpack = new JetPack();
        if($inventory->canAddItem($jetpack)){
            if($inventory->getItemInHand()->getId() === JetPack::AIR){
                $inventory->setItemInHand($jetpack);
            }else{
                $inventory->addItem($jetpack);
            }
            $sender->sendMessage(self::PREFIX.'JetPackを付与しました');
        }else{
            $sender->sendMessage(self::PREFIX.'インベントリにアイテムを追加できません');
        }
    }
}