<?php

namespace app\entity;

class Event
{
    private int $id_event;
    private string $typeEvent;
    private int $id_article;
    private string $description;
    private int $remainingPlaces;
    private int $placesLimit;
    private string $dateEvent;

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
     * @return string
     */
    public function getTypeEvent(): string
    {
        return $this->typeEvent;
    }

    /**
     * @param string $typeEvent
     */
    public function setTypeEvent(string $typeEvent): void
    {
        $this->typeEvent = $typeEvent;
    }

    /**
     * @return int
     */
    public function getId_article(): int
    {
        return $this->id_article;
    }

    /**
     * @param int $article
     */
    public function setId_article(int $id_article): void
    {
        $this->id_article = $id_article;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getRemainingPlaces(): int
    {
        return $this->remainingPlaces;
    }

    /**
     * @param int $remainingPlaces
     */
    public function setRemainingPlaces(int $remainingPlaces): void
    {
        $this->remainingPlaces = $remainingPlaces;
    }

    /**
     * @return int
     */
    public function getPlacesLimit(): int
    {
        return $this->placesLimit;
    }

    /**
     * @param int $placeLimit
     */
    public function setPlacesLimit(int $placesLimit): void
    {
        $this->placesLimit = $placesLimit;
    }

    /**
     * @return string
     */
    public function getDateEvent(): string
    {
        return $this->dateEvent;
    }

    /**
     * @param string $dateEvent
     */
    public function setDateEvent(string $dateEvent): void
    {
        $this->dateEvent = $dateEvent;
    }





}