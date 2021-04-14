<?php


class Fight
{
    private Human $p1;
    private Human $p2;
    private array $log = [];
    private DateTime $time;

    public function __construct(Human $p1,Human $p2)
    {
        $this->setTime(new DateTime('2020-01-01 00:00:00'));
        $this->setP1($p1);
        $this->setP2($p2);
    }

    /**
     * @param Human $p1
     * @return Fight
     */
    public function setP1(Human $p1): Fight
    {
        $this->p1 = $p1;
        return $this;
    }

    /**
     * @param Human $p2
     * @return Fight
     */
    public function setP2(Human $p2): Fight
    {
        $this->p2 = $p2;
        return $this;
    }

    public function isSomeoneDead(): bool
    {
        return $this->p1->isDead() || $this->p2->isDead();
    }

    public function newRound()
    {
        //TODO Timing function with logs
        if ($this->p1->getVitesse() > $this->p2->getVitesse()) {
            $this->p1->hit($this->p2);
            if (!self::isSomeoneDead()){
                $this->p2->hit($this->p1);
            }
        } else {
            $this->p2->hit($this->p1);
            if (!self::isSomeoneDead()){
                $this->p1->hit($this->p2);
            }
        }
    }

    /**
     * @param DateTime $dateTime
     */
    private function setTime(DateTime $dateTime): void
    {
        $this->time = $dateTime;
    }
}
