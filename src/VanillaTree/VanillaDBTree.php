<?php
namespace Costamarques\Plugins\Vanillatree;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Base\TScript;
use Adianti\Widget\Base\TStyle;
use Adianti\Database\TCriteria;
/**
 * VanillaDBTree
 */
class VanillaDBTree extends TElement
{
    protected $items;
    
    /**
     * Class Constructor
     */
    public function __construct()
    {
        parent::__construct('main');
        $this->id = 'tree_' . uniqid();

    }
    
}
?>