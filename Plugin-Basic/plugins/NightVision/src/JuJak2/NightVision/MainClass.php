<?php
namespace JuJak2\NightVision;

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
        $this->getLogger()->info(TextFormat::WHITE . "NightVision Plugin Loaded");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        if($sender instanceof Player){

            $sender->getEffects()->add(new EffectInstance(VanillaEffects::NIGHT_VISION(), 99999, 0, false));
            $sender->sendMessage("야간투시가 적용되었습니다.");
        }
        else{

            $sender->sendMessage("console에게는 효과를 부여할 수 없습니다.");
        }

        return true;
    }
}
