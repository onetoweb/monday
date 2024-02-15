.. _top:
.. title:: Items

`Back to index <index.rst>`_

=====
Items
=====

.. contents::
    :local:


Read items
``````````

.. code-block:: php
    
    $result = $client->item->read([
        // item fields to select
        'id',
        'name',
        'state',
        'created_at',
        'updated_at',
        'email',
        'relative_link'
    ], [
        // arguments for selecting board(s)
        'limit' => 5,
        'page' => 1,
        'ids' => [123456789]
    ], [
        // arguments for selecting items under boards
        'limit' => 5
    ]);


Create item
```````````

.. code-block:: php
    
    $name = 'new item';
    $boardId = 123456789;
    $groupId = 'topics';
    $values = ['text' => 'foo bar']; // (optional)
    $createLabels = true; // (optional)
    $result = $client->item->create($name, $boardId, $groupId, $values, $createLabels);


Create subitem
``````````````

.. code-block:: php
    
    $parentItemId = 123456789;
    $name = 'new subitem';
    $values = ['text' => 'foo bar']; // (optional)
    $createLabels = true; // (optional)
    $result = $client->item->createSubitem($parentItemId, $name, $values, $createLabels);


Clear item updates
``````````````````

.. code-block:: php
    
    $itemId = 123456789;
    $result = $client->item->clearUpdates($itemId);


Move item to group
``````````````````

.. code-block:: php
    
    $itemId = 123456789;
    $groupId = 'group_id';
    $result = $client->item->moveToGroup($itemId, $groupId);


Archive Item
````````````

.. code-block:: php
    
    $itemId = 123456789;
    $result = $client->item->archive($itemId);


Delete Item
```````````

.. code-block:: php
    
    $itemId = 123456789;
    $result = $client->item->delete($itemId);


Duplicate Item
``````````````

.. code-block:: php
    
    $boardId = 123456789;
    $itemId = 123456789;
    $withUpdates = true;
    $result = $client->item->duplicate($boardId, $itemId, $withUpdates);


`Back to top <#top>`_