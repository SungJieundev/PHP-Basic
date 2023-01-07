<?php

namespace com\github\jujak\bookskill;

use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\ItemIds;
use pocketmine\plugin\PluginBase;

class BookSkill extends PluginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onInteract(PlayerInteractEvent $event) {
        $item = $event->getItem();
        $player = $event->getPlayer();
        $name = $player->getName();
//25 tick = 1 초
        if ($item->getId() === ItemIds::BOOK) {
            $heal = new EffectInstance(Effect::getEffect(Effect::INSTANT_HEALTH), 1, 0);
            $regen = new EffectInstance(Effect::getEffect(Effect::REGENERATION), 25 * 5, 0);

            $player->addEffect($heal);
            $player->addEffect($regen);
        }
    }
}