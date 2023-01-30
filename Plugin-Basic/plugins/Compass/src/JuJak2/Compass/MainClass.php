<?php
namespace JuJak2\Compass;

use jojoe77777\FormAPI\ModalForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\item\ItemIds;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemUseEvent;

class MainClass extends PluginBase implements Listener{

    public function onLoad(): void
    {
        $this->getLogger()->info(TextFormat::WHITE . "Compass Plugin Loaded");
    }

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function OnCompassClick(PlayerItemUseEvent $compassUseEvent){

        if($compassUseEvent->getItem()->getId() == ItemIds::COMPASS){

            $compassUseEvent->getPlayer()->sendMessage("나침반을 사용하였습니다.");

            $form = new ModalForm(function (Player $player , $data) use($compassUseEvent){

                var_dump($data);
                if($data == null){

                    $compassUseEvent->getPlayer()->sendMessage("창을 닫았습니다.");
                }
                if($data){

                    $compassUseEvent->getPlayer()->sendMessage("예를 눌렀습니다.");
                }
                if(!$data){
                    $compassUseEvent->getPlayer()->sendMessage("아니오를 눌렀습니다.");
                }
            });

            $form->setTitle("나침반");
            $form->setContent("나침반임");
            $form->setButton1("예");
            $form->setButton2("아니오");

            $compassUseEvent->getPlayer()->sendForm($form);
        }
    }
}

