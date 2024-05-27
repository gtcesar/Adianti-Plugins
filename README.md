## Aviso

Este projeto foi desativado e não está mais sendo mantido. Decidimos descontinuar o desenvolvimento deste componente em favor de uma solução mais atualizada e abrangente.

A partir de agora, recomendamos o uso do pacote [gtcesar/recursive-db-tree](https://github.com/gtcesar/recursive-db-tree) como alternativa. Este pacote oferece recursos mais recentes e estáveis para suas necessidades de manipulação de árvores de banco de dados.

Agradecemos a todos os usuários que contribuíram e apoiaram este projeto ao longo dos anos. Esperamos que você encontre o pacote recomendado útil para suas futuras necessidades de desenvolvimento.

Se você tiver alguma dúvida ou precisar de assistência adicional, sinta-se à vontade para entrar em contato conosco.

Atenciosamente,
Equipe de Desenvolvimento

## Adianti-Plugins <img src="https://img.shields.io/badge/Versão-0.0.5-green"> <img src="https://img.shields.io/badge/Licença-MIT-success"> <img src="https://img.shields.io/badge/Adianti-7.x-blue"> <img src="https://img.shields.io/badge/PHP-7.x-blueviolet">

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
```sql
CREATE TABLE IF NOT EXISTS `segmento` (
  `id` int(11) NOT NULL,
  `segmento_id` int(11) DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `segmento` (`id`, `segmento_id`, `descricao`) VALUES
(1, NULL, 'Transporte'),
(2, 1, 'Executivo'),
(3, 1, 'Fracionado'),
(4, NULL, 'Informática'),
(5, 4, 'Software'),
(6, 4, 'Suporte e manutenção'),
(7, NULL, 'Varejo'),
(8, 7, 'Materiais de limpeza'),
(16, 8, 'Químicos'),
(17, 16, 'Controlados');

```
```php

use Costamarques\Plugins\VanillaTree\VanillaDBTree;

class SegmentoForm extends TPage
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
       
        $segmentos = new VanillaDBTree('segmento', 'DATABASE', 'Segmento', 'id', 'segmento_id', 'descricao', 'id asc');
        $segmentos->collapse();
        $segmentos->setItemAction(new TAction(array($this, 'onSelect')));
        
        $panel->add($segmentos);
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add($panel);

        parent::add($vbox);
    }
    
    public function onSelect($param)
    {
        new TMessage('info', str_replace(',', '<br>', json_encode($param)));
    }    

}
```
## Resultado
<img src="https://github.com/gtcesar/Adianti-Plugins/blob/main/print-screen/vanilladbtree.png?raw=true">
