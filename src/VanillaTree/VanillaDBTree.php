<?php

/**
 * VanillaDBTree
 *
 * @version    v0.0.3
 * @author     Augusto César da Costa Marques
 * @copyright  Copyright (c) 2021 Augusto César da Costa Marques
 * @license    MIT License
 */
namespace Costamarques\Plugins\Vanillatree;

use Adianti\Widget\Base\TElement;
use Adianti\Widget\Base\TScript;
use Adianti\Widget\Base\TStyle;
use Adianti\Database\TCriteria;
use Adianti\Widget\Wrapper\AdiantiDatabaseWidgetTrait;

/**
 * Class Constructor
 * @param  $tagname tag name
 * @param  $database database name
 * @param  $model model class name
 * @param  $key table field to be used as a key in the tree
 * @param  $parentkey table field used as parent reference
 * @param  $label table value to be used as label
 * @param  $ordercolumn column to order the fields (optional)
 * @param  $criteria criteria (TCriteria object) to filter the model (optional)
 */
class VanillaDBTree extends TElement
{
    private $tagname;
    private $itemAction;
    private $collapsed;
    private $key;
    private $label;
    private $parentkey;
    protected $items;

    /**
     * Class Constructor
     */
    public function __construct($tagname, $database, $model, $key, $parentkey, $label, $ordercolumn = null, TCriteria $criteria = null)
    {
        parent::__construct('main');
        $this->id = 'tree_' . uniqid();
        $this->tagname = $tagname;
        $this->key = $key;
        $this->parentkey = $parentkey;
        $this->label = $label;
        $this->collapsed = false;
        $this->items = AdiantiDatabaseWidgetTrait::getObjectsFromModel($database, $model, $key, $ordercolumn, $criteria);
    }

    /**
     * Collapse the Tree
     */
    public function collapse()
    {
        $this->collapsed = true;
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
        TStyle::importFromFile('vendor/costamarques/plugins/src/VanillaTree/vanillatree.min.css');
        TScript::importFromFile('vendor/costamarques/plugins/src/VanillaTree/vanillatree.min.js');
        
        $collapsed = $this->collapsed ? 'true' : 'false';
        $constante = $this->id;

        // creates the script element
        $script = new TElement('script');
        $script->type = 'text/javascript';

        $output = new TElement($this->tagname);
        parent::add($output);

        $script->add(
            '        
        $(document).ready(function(){ const ' .
                $this->tagname .
                '  = document.querySelector(' .
                "'{$this->tagname}'" .
                ');
        const '.$constante.' = new VanillaTree(' .
                "{$this->tagname}" .
                ');         
        '
        );

        foreach ($this->items as $item) {
           
           $key = $item->{$this->key};
           $label = $item->{$this->label};
           $parentkey = $item->{$this->parentkey};


            $tree = "{$constante}.add({label: '{$label}',";

            if ($parentkey != null) {
                $tree .= "parent: '{$parentkey}',";
            }
            $tree .= "id: '{$key}',";
            $tree .= "opened: {$collapsed}});";

            $script->add($tree);
        }

        if ($this->itemAction)
        {
            $string_action = $this->itemAction->serialize(FALSE);
            $script->add('

            '.$this->tagname.'.addEventListener("vtree-select", function(evt) {
                __adianti_load_page("index.php?'. $string_action .'&key=" + evt.detail.id);
            });    
            ');
        }

        $script->add('    
        });  
        ');

        parent::add($script);
        parent::show();
    }
}
?>
