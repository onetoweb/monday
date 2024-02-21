.. _top:
.. title:: Column values

`Back to index <index.rst>`_

=============
Column values
=============

.. contents::
    :local:


Read column values by item
``````````````````````````

.. code-block:: php
    
    $result = $client->columnValue->readByItem([
        // column value fields to select
        'id',
        'type',
        'value'
    ], [
        // arguments for selecting items
        'ids' => [123456789]
    ]);


Read column values by board
```````````````````````````

.. code-block:: php
    
    $result = $client->columnValue->readByBoard([
        // column value fields to select
        'id',
        'type',
        'value'
    ], [
        
        // item fields to select
        'id',
        'name',
        'state',
        'created_at',
        'updated_at',
        'email',
        'relative_link'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


Read all item and column values by board
````````````````````````````````````````

.. code-block:: php
    
    $cursor = null;
    do {
        
        $result = $client->columnValue->readByBoard([
            
            // column value fields to select
            'id',
            'type',
            'value'
        ], [
            
            // item fields to select
            'id',
            'name',
            'state',
            'created_at',
            'updated_at',
            'email',
            'relative_link'
        ], [
            
            // arguments for selecting boards
            'ids' => 123456789,
        ], [
            
            // arguments for selecting items under boards
            'limit' => 500,
            'cursor' => $cursor
            
        ]);
        
        // find cursor in result
        $cursor = \Onetoweb\Monday\Utils::findCursor($result);
        
        // result contains item and column values
        $result;
    }
    while ($cursor !== null);


`Back to top <#top>`_