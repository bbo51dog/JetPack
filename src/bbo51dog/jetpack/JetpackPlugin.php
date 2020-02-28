<?php

namespace bbo51dog\jetpack;

use pocketmine\inventory\ShapedRecipe;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginBase;
use bbo51dog\jetpack\item\JetPack;
use bbo51dog\jetpack\item\JetPackFactory;

class JetPackPlugin extends PluginBase{

    public function onEnable(){
        $jetpack = new JetPack();
        JetPackFactory::register($jetpack);
        //Item::addCreativeItem($jetpack);

        $recipe = new ShapedRecipe(
            [
                'iai',
                'iii',
                'ccc',
            ],
            [
                'i' => Item::get(Item::IRON_INGOT),
                'a' => Item::get(Item::AIR),
                'c' => Item::get(Item::COAL),
            ],
            [
                JetPackFactory::get(JetPack::ID),
            ]
        );
        $this->getServer()->getCraftingManager()->registerShapedRecipe($recipe);
    }
}