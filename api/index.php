<?php

include 'classes/autoload.php';

// Player
$me = new Human('Yshy');
$me->wearWeapon('Sword');
$me->wearArmor('helmet', 'Iron helmet');



// Ennemy
$ennemy = new Human('Tari');
$ennemy->wearWeapon('Dagger');
$ennemy->wearWeapon('Dagger');

include_once './html.php';
