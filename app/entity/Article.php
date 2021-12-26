<?php

namespace app\entity;

class Article
{
    private int $id_article;
    private string $nomArticle;
    private string $description;
    private string $typeArticle;
    private string $img;
    private string $credits;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @return int
     */
    public function getId_article(): int
    {
        return $this->id_article;
    }

    /**
     * @param int $id_article
     */
    public function setId_article(int $id_article): void
    {
        $this->id_article = $id_article;
    }



    /**
     * @return string
     */
    public function getNomArticle(): string
    {
        return $this->nomArticle;
    }

    /**
     * @param string $nomArticle
     */
    public function setNomArticle(string $nomArticle): void
    {
        $this->nomArticle = $nomArticle;
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
     * @return string
     */
    public function getTypeArticle(): string
    {
        return $this->typeArticle;
    }

    /**
     * @param string $typeArticle
     */
    public function setTypeArticle(string $typeArticle): void
    {
        $this->typeArticle = $typeArticle;
    }

    /**
     * @return string
     */
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     */
    public function setImg(string $img): void
    {
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getCredits(): string
    {
        return $this->credits;
    }

    /**
     * @param string $credits
     */
    public function setCredits(string $credits): void
    {
        $this->credits = $credits;
    }



    /**
     * Method to create an object form an array of data
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
}