<?php

namespace app\entity;

class Reservation
{
    private int $id_reservation;
    private int $id_user;
    private int $id_event;
    private int $nbplaces;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    /**
     * Hydrate method for constructor
     * @param array $data
     * @return void
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);

            }
        }
    }

    /**
     * @return int
     */
    public function getId_reservation(): int
    {
        return $this->id_reservation;
    }

    /**
     * @param int $id_reservation
     */
    public function setId_reservation(int $id_reservation): void
    {
        $this->id_reservation = $id_reservation;
    }

    /**
     * @return int
     */
    public function getId_user(): int
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setId_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /**
     * @return int
     */
    public function getId_event(): int
    {
        return $this->id_event;
    }

    /**
     * @param int $idEvent
     */
    public function setId_event(int $id_event): void
    {
        $this->id_event = $id_event;
    }

    /**
     * @return int
     */
    public function getNbplaces(): int
    {
        return $this->nbplaces;
    }

    /**
     * @param int $nbplaces
     */
    public function setNbplaces(int $nbplaces): void
    {
        $this->nbplaces = $nbplaces;
    }



}