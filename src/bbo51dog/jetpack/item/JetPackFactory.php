<?php

namespace bbo51dog\jetpack\item;

use bbo51dog\jetpack\JetPackException;
use pocketmine\item\Item;

class JetPackFactory{

    /** @var Item[] */
    private static $items;

    public static function register(Item $item): void{
        $id = $item->getId();
        if(self::isRegistered($id)){
            throw new JetPackException("Item {$item->getName()} already registered");
        }
        self::$items[$id] = clone $item;
    }

    public static function get(int $id): Item{
        if(!self::isRegistered($id)){
            throw new JetPackException("Item {$id} not found");
        }
        return clone self::$items[$id];
    }

    public static function isRegistered(int $id): bool{
        return isset(self::$items[$id]);
    }
}