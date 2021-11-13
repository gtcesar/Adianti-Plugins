# Adianti-Plugins
Plugins para Adianti Framework

## Componentes disponíveis
 
<table>
    <thead>
        <th>Componente</th>
        <th>Fonte de abstração</th>
    </thead>
    <tbody>
        <tr>
            <td>VanillaDBTree</td>
            <td>https://github.com/finom/vanillatree</td>
        </tr>
    </tbody>
</table>


## Instalação
Rode o comando
`composer require costamarques/plugins`



## Exemplo de uso - VanillaDBTree
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
        $panel = new TPanelGroup('NOME_PAINEL');
       
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
