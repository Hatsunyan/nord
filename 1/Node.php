<?php

/**
 * Created by PhpStorm.
 * User: Hatsu
 * Date: 07.07.2017
 * Time: 1:35
 */
class Node
{
    protected $name;
    protected $parent;
    protected $children = [];


    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param Node $node
     */
    public function addChild(Node $node) : void
    {
        $this->children[$node->getName()] = $node;
    }

    /**
     * @param Node $node
     * @throws Exception
     */
    public function removeChild(Node $node) : void
    {
        foreach ($this->children as $key=>$child)
        {
            if($child === $node)
            {
                unset($this->children[$key]);
                return;
            }
        }
        throw new Exception('Child not exist');
    }

    /**
     * @param Node|null $node
     */
    public function setParent(?Node $node)
    {
        $this->parent = $node;
    }

    /**
     * @return Node
     */
    public function getParent() : ?Node
    {
        return $this->parent;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        /**
         * @var $child Node
         */
        $result[$this->getName()] = [];
        if(empty($this->children))
        {
            return $result;
        }
        foreach ($this->children as $child)
        {
            $result[$this->getName()] = $result[$this->getName()] + $child->toArray();
        }
        return $result;
    }

}