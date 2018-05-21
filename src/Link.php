<?php

/**
 * @Entity
 * @Table(name="links")
 */
class Link
{
    /**
     * @Id
     * @JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @ManyToOne(targetEntity="Item")
     * @Column(name="`from`")
     */
    private $from;

    /**
     * @Id
     * @JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @ManyToOne(targetEntity="Item")
     * @Column(name="`to`")
     */
    private $to;

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }    
}
