<?php
namespace JuJak2\Compass;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class MainClass extends PluginBase{

    public function onLoad(): void
    {
        $this->getLogger()->info(TextFormat::WHITE . "Compass Plugin Loaded");
    }
}

