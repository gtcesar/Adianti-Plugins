# Adianti-Plugins <img src="https://img.shields.io/badge/Versão-0.0.4-green"> <img src="https://img.shields.io/badge/Licença-MIT-success"> <img src="https://img.shields.io/badge/Adianti-7.x-blue"> <img src="https://img.shields.io/badge/PHP-7.x-blueviolet">

> Plugins para Adianti Framework


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
