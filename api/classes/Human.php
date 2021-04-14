<?php

use JetBrains\PhpStorm\Pure;

class Human
{

    const CRIT_DAMAGE = 2;

    private string $nom;
    private int $atk = 1;
    private int $crit = 0;
    private int $hp = 100;
    private int $esquive = 0;
    private int $vitesse = 0;
    private int $armor = 0;
    private Weapon $weapon;
    private Weapon $secondaryWeapon;
    private array $stuff;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function __toString(): string
    {
        return 'I am ' . $this->nom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getAtk(): int
    {
        return $this->atk;
    }

    /**
     * @param int $atk
     * @return Human
     */
    public function setAtk(int $atk): Human
    {
        $this->atk = $atk;
        return $this;
    }

    /**
     * @return int
     */
    public function getCrit(): int
    {
        return $this->crit;
    }

    /**
     * @param int $crit
     * @return Human
     */
    public function setCrit(int $crit): Human
    {
        $this->crit = $crit;
        return $this;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     * @return Human
     */
    public function setHp(int $hp): Human
    {
        $this->hp = $hp;
        return $this;
    }

    /**
     * @return int
     */
    public function getEsquive(): int
    {
        return $this->esquive;
    }

    /**
     * @param int $esquive
     * @return Human
     */
    public function setEsquive(int $esquive): Human
    {
        $this->esquive = $esquive;
        return $this;
    }

    /**
     * @return int
     */
    public function getVitesse(): int
    {
        return $this->vitesse;
    }

    /**
     * @param int $vitesse
     * @return Human
     */
    public function setVitesse(int $vitesse): Human
    {
        $this->vitesse = $vitesse;
        return $this;
    }

    public function hit(Human $ennemy,$silent = false): Human
    {
        $damage = $this->getAtk() - $ennemy->getArmor();
        $damageStr = $damage;
        $critStr = "";

        if (rand(0, 100) < $this->getCrit()) {
            $damage = $damage * self::CRIT_DAMAGE;
            $damageStr = $damage.'('.$damage/2 . " x " . self::CRIT_DAMAGE.')';
            $critStr = "(CRITICAL)";
        }

        if (rand(0, 100) < $ennemy->getEsquive()) {
            $damage = 0;
            $damageStr = "0";
            $critStr = "(DODGE)";
        }

        $ennemy->setHp($ennemy->getHp() - $damage);
        if ($ennemy->getHp() < 0) {
            $ennemy->setHp(0);
        }
        if  (!$silent) {
            echo sprintf("<b>%s</b> hit <b>%s</b> %s for %s damage%s. <span style='color: red'>%d HP left</span>. <br/>",
                $this->getNom(),
                $ennemy->getNom(),
                $critStr,
                $damageStr,
                $damage > 1 ? 's' : '',
                $ennemy->getHp()
            );
        }
        return $this;
    }

    /**
     *
     * @param string $weaponName weapon's exact name
     * @return $this
     */
    public function wearWeapon(string $weaponName): Human
    {
        if (!isset($this->secondaryWeapon)){
            $db = new PDO('mysql:host=localhost;dbname=rp','root','root');

            $stmt = $db->prepare('SELECT * FROM weapon WHERE name LIKE ?');
            $stmt->execute([$weaponName]);
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            if (!empty($res)) {
                $weapon = new Weapon($res->name, $res->atk, $res->crit, $res->esquive, $res->vitesse);
                if (!isset($this->weapon)) {
                    $this->setWeapon($weapon);
                } else {
                    $this->setSecondaryWeapon($weapon);
                }
                $this->setAtk($this->getAtk() + $weapon->getAtk());
                $this->setCrit($this->getCrit() + $weapon->getCrit());
                $this->setEsquive($this->getEsquive() + $weapon->getEsquive());
                $this->setVitesse($this->getVitesse() + $weapon->getVitesse());
            }
        }
        return $this;
    }


    /**
     * @param Weapon $weapon
     * @return Human
     */
    public function setWeapon(Weapon $weapon): Human
    {
        $this->weapon = $weapon;
        return $this;
    }

    #[Pure] function isDead(): bool
    {
        return $this->getHp() == 0;
    }

    /**
     * @param Weapon $secondaryWeapon
     * @return Human
     */
    public function setSecondaryWeapon(Weapon $secondaryWeapon): Human
    {
        $this->secondaryWeapon = $secondaryWeapon;
        return $this;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }


    public function wearArmor(string $type, string $name): Human
    {
        if (!isset($this->stuff[$type])){
            $db = new PDO('mysql:host=localhost;dbname=rp','root','root');

            $stmt = $db->prepare('SELECT * FROM armor WHERE name LIKE ?');
            $stmt->execute([$name]);
            $res = $stmt->fetch(PDO::FETCH_OBJ);
            if (!empty($res)) {
                $armor = new Armor($res->name, $res->hp, $res->esquive, $res->vitesse, $res->armor);
                $this->addStuff($type,$armor);
                $this->setHp($this->getHp() + $armor->getHp());
                $this->setEsquive($this->getEsquive() + $armor->getEsquive());
                $this->setVitesse($this->getVitesse() + $armor->getVitesse());
                $this->setArmor($this->getArmor() + $armor->getArmor());
            }
        }
        return $this;
    }

    public function addStuff(string $type, Armor $equipement): Human
    {

        $this->stuff[$type] = $equipement;
        return $this;
    }

    /**
     * @param int $armor
     * @return Human
     */
    public function setArmor(int $armor): Human
    {
        $this->armor = $armor;
        return $this;
    }

    /**
     * @return Weapon
     */
    public function getWeapon(): Weapon
    {
        return $this->weapon;
    }

    /**
     * @return Weapon|null
     */
    public function getSecondaryWeapon(): ?Weapon
    {
        if (isset($this->secondaryWeapon)){
            return $this->secondaryWeapon;
        }
        return null;
    }

}


