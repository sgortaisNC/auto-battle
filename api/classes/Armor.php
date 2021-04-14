<?php


class Armor
{
    private string $nom;
    private int $hp;
    private int $esquive;
    private int $vitesse;
    private int $armor;

    public function __construct(string $nom, int $hp,int $esquive,int $vitesse,int $armor)
    {
        $this->setNom($nom);
        $this->setHp($hp);
        $this->setEsquive($esquive);
        $this->setVitesse($vitesse);
        $this->setArmor($armor);
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @return int
     */
    public function getVitesse(): int
    {
        return $this->vitesse;
    }

    /**
     * @return int
     */
    public function getEsquive(): int
    {
        return $this->esquive;
    }

    /**
     * @return int
     */
    public function getArmor(): int
    {
        return $this->armor;
    }

    /**
     * @param string $nom
     * @return Armor
     */
    public function setNom(string $nom): Armor
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @param int $hp
     * @return Armor
     */
    public function setHp(int $hp): Armor
    {
        $this->hp = $hp;
        return $this;
    }

    /**
     * @param int $esquive
     * @return Armor
     */
    public function setEsquive(int $esquive): Armor
    {
        $this->esquive = $esquive;
        return $this;
    }

    /**
     * @param int $vitesse
     * @return Armor
     */
    public function setVitesse(int $vitesse): Armor
    {
        $this->vitesse = $vitesse;
        return $this;
    }

    /**
     * @param int $armor
     * @return Armor
     */
    public function setArmor(int $armor): Armor
    {
        $this->armor = $armor;
        return $this;
    }


}
