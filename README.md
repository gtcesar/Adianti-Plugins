# Adianti-Plugins
Plugins para Adianti Framework

Esse componente faz uso da lib Vanillatree https://github.com/finom/vanillatree

## Instalação
`composer require costamarques/plugins`

## Exemplo de uso
```php

use Costamarques\Plugins\VanillaTree\VanillaDBTree;

class SeuController extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    function __construct()
    {
        parent::__construct();
        
        // creates a panel
        $panel = new TPanelGroup('Segmentos');
        $panel->addHeaderActionLink('Cadastrar',  new TAction(['SegmentoForm', 'onShow']), 'fa:plus green');
        
        $arvore = new VanillaDBTree('NOME_OBJETO', 'DATABASE', 'MODEL', 'ID', 'ID_REFERENCIA', 'LABEL', 'ORDER', ' CRITERIA');
        $arvore->collapse();
        $arvore->setItemAction(new TAction(array('CLASSE', 'METODO')));
        
        $panel->add($arvore);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add($panel);

        parent::add($vbox);
    }
    

}
```
