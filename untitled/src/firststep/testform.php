<?php

declare(strict_types=1);

namespace firststep;

use pocketmine\form\Form;
use pocketmine\Player;

final class testform implements Form {
    var FirstStep $plugin;
    var array $worlds;

    public function __construct(FirstStep $plugin) {
        $this->plugin = $plugin;
        $this->worlds = array_values($this->plugin->getServer()->getLevels());
    }

    public function jsonSerialize(): array {

        $buttons = [];

        foreach ($this->worlds as $world) {
            $buttons[] = ["text" => $world->getFolderName() . "(으)로 이동합니다."];
        }
        return [
            "type" => "form",
            "title" => "월드 텔레포트",
            "content" => "원하는 월드를 선택시 이동",
            "buttons" => $buttons,
        ];
    }

    public function handleResponse(Player $player, $data): void {
        if ($data !== null) {
            if (isset($this->worlds[$data])) {
                $world = $this->worlds[$data];
                $player->teleport($world->getSafeSpawn());
            }
        }
    }
}