<?php

namespace bbo51dog\jetpack;


use pocketmine\inventory\ShapedRecipe;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use bbo51dog\jetpack\item\JetPack;

class JetPackPlugin extends PluginBase{

    public function onEnable(){
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
                new JetPack(),
            ]
        );
        $this->getServer()->getCraftingManager()->registerShapedRecipe($recipe);
    }
}