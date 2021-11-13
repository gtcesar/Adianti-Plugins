# Adianti-Plugins
Plugins para Adianti Framework

Esse componente faz uso da lib Vanillatree https://github.com/finom/vanillatree

## Instalação
Rode o comando
`composer require costamarques/plugins`

Importe para suas libraries(app/templates/{$theme}/libraries.html)
    
    <!-- Vanillatree -->
    <script src="vendor/costamarques/plugins/src/VanillaTree/vanillatree.min.js" type="text/javascript"></script>
    <link href="vendor/costamarques/plugins/src/VanillaTree/vanillatree.min.css" rel="stylesheet" type="text/css" media="screen">


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
