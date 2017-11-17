<?php

namespace ArmTheDev;

# Main
use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
#Utils
use pocketmine\utils\{TextFormat};
#Item
use pocketmine\item\Item;
use pocketmine\item\enchantment\Enchantment;
#Event
use pocketmine\event\Listener;
#Entity
use pocketmine\entity\{Entity, Effect};
#Player
use pocketmine\event\player\{PlayerMoveEvent, PlayerJoinEvent, PlayerQuitEvent, PlayerExhaustEvent, PlayerInteractEvent, PlayerDropItemEvent};
#API
use jojoe77777\FormAPI;
use onebone\economyapi\EconomyAPI;

class ArmTheDev extends PluginBase implements Listener{

	public $nomoney = TextFormat::RED . "you do not have enough money!"
	
	public function onEnable(){
		$this->getLogger()->info("ShopUI by ArmTheDev");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onPlayerInteract(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$this->mainFrom($player);
    }
    
	public function mainFrom($player){
		$plugin = $this->getServer()->getPluginManager();
		$formapi = $plugin->getPlugin("FormAPI");
		$form = $formapi->createSimpleForm(function (Player $event, array $args){
			$result = $args[0];
			$player = $event->getPlayer();
			if($result === null){
			}
			switch($result){
				case 0:
				return;
				case 1:
				$this->weaponsForm($player);
				return;
				case 2:
				$this->toolsForm($player);
				return;
				case 3:
				$this->armorsForm($player);
				return;
				case 4:
				return;
				case 5:
				$this->rankForm($player);
				return;
				case 6:
				$this->maskForm($player);
				return;
		}
		});
		$form->setTitle(TextFormat::WHITE . "--= " . TextFormat::BOLD . TextFormat::RED . "Shop" . TextFormat::RESET . TextFormat::WHITE . " =--");
		$name = $player->getName();
		$eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$money = $eco->myMoney($name);
		$form->setContent("Your Money: " . $money);
		$form->addButton("");
		$form->addButton("WEAPONS");
		$form->addButton("TOOLS");
		$form->addButton("ARMORS");
		$form->addButton("BLOCKS");
		$form->addButton("RANK");
		$form->addButton("MASK");
		$form->sendToPlayer($player);
    }
	
	public function weaponsForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $event, array $data){
		$result = $data[0];
		$player = $event->getPlayer();
		if($result === null){
		}
		switch($result){
			case 0:
			$this->mainFrom($player);
			break;
			case 1:
			$this->itemId = 268;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 1));
			break;
			case 2:
			$this->itemId = 272;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 1));
			EconomyAPI::getInstance()->reduceMoney($player, 10);
			break;
			case 3:
			$this->itemId = 267;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 1));
			EconomyAPI::getInstance()->reduceMoney($player, 50);
			break;
			case 4:
			$this->itemId = 283;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 1));
			EconomyAPI::getInstance()->reduceMoney($player, 100);
			break;
			case 5:
			$this->itemId = 276;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 1));
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			case 6:
			$this->itemId = 261;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 1));
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 7:
			$this->itemId = 262;
			$player->getInventory()->addItem(Item::get($this->itemId, 0, 64));
			EconomyAPI::getInstance()->reduceMoney($player, 100);
			break;
			}
			});
			$form->setTitle("WEAPONS");
			$name = $player->getName();
			$eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			$money = $eco->myMoney($name);
			$form->setContent("Your Money: " . $money);
			$form->addButton("BACK");
			$form->addButton("WOODEN SWORD : 0$", 0, "textures/items/wood_sword");
			$form->addButton("STONE SWORD : 10$", 0, "textures/items/stone_sword");
			$form->addButton("GOLDEN SWORD : 50$", 0, "textures/items/gold_sword");
			$form->addButton("IRON SWORD : 100$", 0, "textures/items/iron_sword");
			$form->addButton("DIAMOND SWORD : 1 000$", 0, "textures/items/diamond_sword");
			$form->addButton("BOW : 500$", 0, "textures/items/bow_standby");
			$form->addButton("ARROW(64x) : 100$", 0, "textures/items/arrow");
			$form->sendToPlayer($player);
	}
	
	public function toolsForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $event, array $data){
		$result = $data[0];
		$player = $event->getPlayer();
		if($result === null){
		}
		switch($result){
			case 0:
			$this->mainFrom($player);
			break;
			case 1:
			break;
			case 2:
			break;
			case 3:
			break;
			}
			});
			$form->setTitle("TOOLS");
			$name = $player->getName();
			$eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			$money = $eco->myMoney($name);
			$form->setContent("Your Money: " . $money);
			$form->addButton("BACK");
			$form->addButton("diamond pickaxe : 1000$", 0, "textures/items/diamond_pickaxe");
			$form->addButton("gold pickaxe : 50$", 0, "textures/items/gold_pickaxe");
			$form->addButton("iron pickaxe : 100$", 0, "textures/items/iron_pickaxe");
			$form->addButton("stone pickaxe : 10$", 0, "textures/items/stone_pickaxe");
			$form->addButton("wood pickaxe : 0$", 0, "textures/items/wood_pickaxe");
			$form->addButton("diamond axe : 1 000$", 0, "textures/items/diamond_axe");
			$form->addButton("gold axe : 50$", 0, "textures/items/gold_axe");
			$form->addButton("iron axe : 100$", 0, "textures/items/iron_axe");
			$form->addButton("stone axe : 10$", 0, "textures/items/stone_axe");
			$form->addButton("wood axe : 0$", 0, "textures/items/wood_axe");
			$form->addButton("diamond hoe : n/a", 0, "textures/items/diamond_hoe");
			$form->addButton("gold hoe : n/a", 0, "textures/items/gold_hoe");
			$form->addButton("iron hoe : n/a", 0, "textures/items/iron_hoe");
			$form->addButton("stone hoe : n/a", 0, "textures/items/stone_hoe");
			$form->addButton("wood hoe : n/a", 0, "textures/items/wood_hoe");
			$form->sendToPlayer($player);
	}
	
	public function armorsForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $event, array $data){
		$result = $data[0];
		$player = $event->getPlayer();
		if($result === null){
		}
		switch($result){
			case 0:
			$this->mainFrom($player);
			break;
			case 1:
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			case 2:
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			case 3:
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			case 4:
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			case 5:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 6:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 7:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 8:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 9:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 10:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 11:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 12:
			EconomyAPI::getInstance()->reduceMoney($player, 500);
			break;
			case 13:
			EconomyAPI::getInstance()->reduceMoney($player, 100);
			break;
			case 14:
			EconomyAPI::getInstance()->reduceMoney($player, 100);
			break;
			case 15:
			EconomyAPI::getInstance()->reduceMoney($player, 100);
			break;
			case 16:
			EconomyAPI::getInstance()->reduceMoney($player, 100);
			break;
			}
			});
			$form->setTitle("ARMORS");
			$name = $player->getName();
			$eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			$money = $eco->myMoney($name);
			$form->setContent("Your Money: " . $money);
			$form->addButton("BACK");
			//DIAMOND
			$form->addButton("diamond helmet : 1 000$", 0, "textures/items/diamond_helmet");
			$form->addButton("diamond chestplate : 1 000$", 0, "textures/items/diamond_chestplate");
			$form->addButton("diamond leggings : 1 000$", 0, "textures/items/diamond_leggings");
			$form->addButton("diamond boots : 1 000$", 0, "textures/items/diamond_boots");
			//chainmail
			$form->addButton("chainmail helmet : 500$", 0, "textures/items/chainmail_helmet");
			$form->addButton("chainmail chestplate : 500$", 0, "textures/items/chainmail_chestplate");
			$form->addButton("chainmail leggings : 500$", 0, "textures/items/chainmail_leggings");
			$form->addButton("chainmail boots : 500$", 0, "textures/items/chainmail_boots");
			//IRON
			$form->addButton("iron helmet : 500$", 0, "textures/items/iron_helmet");
			$form->addButton("iron chestplate : 500$", 0, "textures/items/iron_chestplate");
			$form->addButton("iron leggings : 500$", 0, "textures/items/iron_leggings");
			$form->addButton("iron boots : 500$", 0, "textures/items/iron_boots");
			//GOLD
			$form->addButton("gold helmet : 100$", 0, "textures/items/gold_helmet");
			$form->addButton("gold chestplate : 100$", 0, "textures/items/gold_chestplate");
			$form->addButton("gold leggings : 100$", 0, "textures/items/gold_leggings");
			$form->addButton("gold boots : 100$", 0, "textures/items/gold_boots");
			//LEATHER
			$form->addButton("leather helmet : 0$", 0, "textures/items/leather_helmet");
			$form->addButton("leather chestplate : 0$", 0, "textures/items/leather_chestplate");
			$form->addButton("leather leggings : 0$", 0, "textures/items/leather_leggings");
			$form->addButton("leather boots : 0$", 0, "textures/items/leather_boots");
			$form->sendToPlayer($player);
	}
	
	public function rankForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $event, array $data){
		$result = $data[0];
		$player = $event->getPlayer();
		if($result === null){
		}
		switch($result){
			case 0:
			$this->mainFrom($player);
			break;
			case 1:
			EconomyAPI::getInstance()->reduceMoney($player, 100000);
			break;
			case 2:
			EconomyAPI::getInstance()->reduceMoney($player, 50000);
			break;
			case 3:
			EconomyAPI::getInstance()->reduceMoney($player, 10000);
			break;
			}
			});
			$form->setTitle("RANK");
			$name = $player->getName();
			$eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			$money = $eco->myMoney($name);
			$form->setContent("Your Money: " . $money);
			$form->addButton("BACK");
			$form->addButton("VIP+ : 100 000$", 1, "http://i.imgur.com/WGwW3bk.png");
			$form->addButton("VIP : 50 000$", 1, "http://i.imgur.com/nh2PufL.png");
			$form->addButton("MINI-VIP : 10 000$", 1, "https://s3.amazonaws.com/files.enjin.com/1166187/modules/shopping/36709375-1352495080580fbeea668e41.84791572.png");
			$form->sendToPlayer($player);
	}
	
	public function maskForm($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $event, array $data){
		$result = $data[0];
		$player = $event->getPlayer();
		if($result === null){
		}
		switch($result){
			case 0:
			$this->mainFrom($player);
			break;
			case 1:
			EconomyAPI::getInstance()->reduceMoney($player, 10000);
			break;
			case 2:
			EconomyAPI::getInstance()->reduceMoney($player, 5000);
			break;
			case 3:
			EconomyAPI::getInstance()->reduceMoney($player, 2000);
			break;
			case 4:
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			case 5:
			EconomyAPI::getInstance()->reduceMoney($player, 1000);
			break;
			}
			});
			$form->setTitle("MASK");
			$name = $player->getName();
			$eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
			$money = $eco->myMoney($name);
			$form->setContent("Your Money: " . $money);
			$form->addButton("BACK");
			$form->addButton("DRAGON : 10 000$", 1, "https://img4.hostingpics.net/pics/436796skulldragon.png");
			$form->addButton("WETHER : 5 000$", 1, "https://img4.hostingpics.net/pics/826437skullwither.png");
			$form->addButton("CREEPER : 2 000$", 1, "https://img4.hostingpics.net/pics/556676skullcreeper.png");
			$form->addButton("ZOMBIE : 1 000$", 1, "https://img4.hostingpics.net/pics/415562skullzombie.png");
			$form->addButton("SKELETON : 1 000$", 1, "https://img4.hostingpics.net/pics/589367skullskeleton.png");
			$form->sendToPlayer($player);
	}
}





	
	
	
