<?php


class Weapon
{
    private string $nom;
    private int $atk;
    private int $crit;
    private int $esquive;
    private int $vitesse;

    public function __construct($nom,$atk,$crit,$esquive,$vitesse)
    {
        $this->setNom($nom);
        $this->setAtk($atk);
        $this->setCrit($crit);
        $this->setEsquive($esquive);
        $this->setVitesse($vitesse);
    }

    /**
     * @param string $nom
     * @return Weapon
     */
    public function setNom(string $nom): Weapon
    {
        $this->nom = $nom;
        return $this;
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
     * @return Weapon
     */
    public function setAtk(int $atk): Weapon
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
     * @return Weapon
     */
    public function setCrit(int $crit): Weapon
    {
        $this->crit = $crit;
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
     * @return Weapon
     */
    public function setEsquive(int $esquive): Weapon
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
     * @return Weapon
     */
    public function setVitesse(int $vitesse): Weapon
    {
        $this->vitesse = $vitesse;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }


}
