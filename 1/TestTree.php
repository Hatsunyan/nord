<?php

/**
 * Created by PhpStorm.
 * User: Hatsu
 * Date: 07.07.2017
 * Time: 1:37
 */

class TestTree extends Tree
{
    protected $nodes = [];
    protected $root;

    /**
     * @param Node $node
     * @param null $parentNode
     */
    public function createNode(Node $node, $parentNode = NULL)
    {
        /**
         * @var $parentNode Node
         */
        if(is_null($parentNode))
        {
            $this->root = $node;
            $this->nodes[$node->getName()] = $node;
            return;
        }
        $this->nodes[$node->getName()] = $node;
        $node->setParent($parentNode);
        $parentNode->addChild($node);
    }

    /**
     * @param string $nodeName
     * @return bool
     * @throws Exception
     */
    protected function nodeExist(string $nodeName) : bool
    {
        if(!isset($this->nodes[$nodeName]))
        {
            throw new Exception('Node '.$nodeName.' not exist');
        }
        return true;

    }

    /**
     * @param Node $node
     */
    public function deleteNode(Node $node) : void
    {
        $this->nodeExist($node->getName());
        $node->getParent()->removeChild($node);
    }

    /**
     * @param Node $node
     * @param Node $parent
     */
    public function attachNode(Node $node, Node $parent) : void
    {
        $this->nodeExist($node->getName());
        $this->nodeExist($parent->getName());
        $node->getParent()->removeChild($node);
        $node->setParent($parent);
        $parent->addChild($node);
    }

    /**
     * @param $nodeName
     * @return Node
     */
    public function getNode($nodeName) : Node
    {
        $this->nodeExist($nodeName);
        return $this->nodes[$nodeName];
    }

    /**
     * @return mixed
     */
    public function export()
    {
        return $this->root->toArray();
    }
}