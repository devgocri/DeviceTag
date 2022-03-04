<?php

namespace devgocri\DeviceTag;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{

    private array $deviceData = [];

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->deviceData = [
            -1 => "Unknown",
            1 => "Android",
            2 => "iOS",
            3 => "MacOS",
            4 => "FireOS",
            5 => "VRGear",
            6 => "VRHololens",
            7, 8 => "Windows",
            9 => "Dedicated",
            10 => "tvOS",
            11 => "PS4",
            12 => "Nintendo Switch",
            13 => "Xbox",
            20 => "Linux"
        ];
    }

    public function onJoin(PlayerJoinEvent $event): void
    {
        $player = $event->getPlayer();
        $player->setNameTag($player->getDisplayName() . "\n§7" . $this->deviceData[$player->getPlayerInfo()->getExtraData()["DeviceOS"]]);
    }

}