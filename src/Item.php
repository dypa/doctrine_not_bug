<?php

/**
 * @Entity
 * @Table(name="items")
 */
class Item 
{
	/**
     * @Id
     * @GeneratedValue(strategy="UUID")
     * @Column(type="guid")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
    	return (string)$this->id;
    }
}