<?php
/**
 * Created by PhpStorm.
 * User: Hatsu
 * Date: 07.07.2017
 * Time: 1:58
 */

require_once 'Node.php';
require_once 'Tree.php';
require_once 'TestTree.php';

$tree = new TestTree();
    // 1. создать корень country
    $tree->createNode(new Node('country'));

    // 2. создать в нем узел kiev
    $tree->createNode(new Node('kiev'), $tree->getNode('country'));

    // 3. в узле kiev создать узел kremlin
    $tree->createNode(new Node('kremlin'), $tree->getNode('kiev'));

    // 4. в узле kremlin создать узел house
    $tree->createNode(new Node('house'), $tree->getNode('kremlin'));

    // 5. в узле kremlin создать узел tower
    $tree->createNode(new Node('tower'), $tree->getNode('kremlin'));

    // 4. в корневом узле создать узел moskow
    $tree->createNode(new Node('moskow'), $tree->getNode('country'));

    // 5. сделать узел kremlin дочерним узлом у moskow
    $tree->attachNode($tree->getNode('kremlin'), $tree->getNode('moskow'));

    // 6. в узле kiev создать узел maidan
    $tree->createNode(new Node('maidan'), $tree->getNode('kiev'));

    // 7. удалить узел kiev
    $tree->deleteNode($tree->getNode('kiev'));

    // 8. получить дерево в виде массива, сделать print_r
    print_r($tree->export());