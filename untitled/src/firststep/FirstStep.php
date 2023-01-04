<?php

namespace firststep;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class FirstStep extends PluginBase implements Listener {
    var array $cooldown;

    public function onLoad() {
        $this->getLogger()->info("플러그인 첫 걸음");
    }

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        foreach (scandir($this->getServer()->getDataPath() . "worlds/") as $folder) {
            $this->getServer()->loadLevel($folder);
        }
    }

    public function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        $player->sendMessage("환영합니다");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        if ($command->getname() == "월드"){
            if (isset($args[0])) {
               $this->getServer()->generateLevel($args[0]);
            } else {
                return false;
            }
            return true;
        }
        if ($sender instanceof Player) {
            $item = ItemFactory::get(ItemIds::DIAMOND, 0, 64);
            $sender->getInventory()->addItem($item);

            $sender->sendMessage("다이아몬드 64개");
            return true;
        }
        $sender->sendMessage("콘솔은 명령어를 사용할 수 없습니다.");
        return true;

    }

    public function onInteract(PlayerInteractEvent $event) {
        $item = $event->getItem();
        $player = $event->getPlayer();
        $name = $player->getName();

        if ($item->getId() === ItemIds::COMPASS) {
            if (!isset($this->cooldown[$name])) {
                $form = new testform($this);
                $player->sendForm($form);
                $this->cooldown[$name] = microtime(true);
            } else if (microtime(true) - $this->cooldown[$name] >= 0.5) {
                unset($this->cooldown[$name]);
            }
        }
    }

}
