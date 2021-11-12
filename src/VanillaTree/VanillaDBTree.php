<?php
namespace Costamarques\Plugins\Vanillatree;
use Adianti\Widget\Base\TElement;
use Adianti\Widget\Base\TScript;
use Adianti\Database\TCriteria;

use Exception;

/**
 * VanillaDBTree
 * 
 * @version    0.0.1
 * @author     Augusto César da Costa Marques
 * @copyright  Copyright (c) 2021 Augusto César da Costa Marques
 * @license    MIT License
 */

use AdiantiDatabaseWidgetTrait;

    /**
     * Class Constructor
     * @param  $tagname     tag name
     * @param  $database database name
     * @param  $model    model class name
     * @param  $key      table field to be used as a key in the tree
     * @param  $parentkey  table field used as parent reference
     * @param  $value    table field to be shown in tree
     * @param  $ordercolumn column to order the fields (optional)
     * @param  $criteria criteria (TCriteria object) to filter the model (optional)
     */
class VanillaDBTree extends TElement
{
    private $tagname;
    private $itemAction;
    private $collapsed;
    private $parentkey;
    protected $items;
    
    /**
     * Class Constructor
     */
    public function __construct($tagname, $database, $model, $key, $parentkey, $value, $ordercolumn = NULL, TCriteria $criteria = NULL)
    {
        parent::__construct('main');
        $this->id = 'tree_' . uniqid();
        $this->tagname = $tagname;
        $this->parentkey = $parentkey;
        $this->collapsed = FALSE;
        $this->items = self::getItemsFromModel($database, $model, $key, $value, $ordercolumn, $criteria);

    }

    /**
     * Collapse the Tree
     */
    public function collapse()
    {
        $this->collapsed = TRUE;
    }

    /**
     * Set item action
     * @param $action item action
     */
    public function setItemAction($action)
    {
        $this->itemAction = $action;
    } 

        /**
     * Shows the plugin at the screen
     */
    public function show()
    {
        // creates the script element
        $script = new TElement('script');
        $script->type = 'text/javascript';

        $output = new TElement($this->tagname);
        parent::add($output);

       // $script->add('        
       // $(document).ready(function(){ const ' . $this->tagname .  '  = document.querySelector('.$this->tagname.');
       // const tree = new VanillaTree('.$this->tagname.');         
        //');

        print_r($this->items);
        
        //TStyle::importFromFile('vendor/costamarques/plugins/src/VanilaTree/vanillatree.min.css');
        //TScript::importFromFile('vendor/costamarques/plugins/src/VanilaTree/vanillatree.min.js');
        
        parent::show();
    }
    
}
?>