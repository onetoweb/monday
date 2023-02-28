.. _top:
.. title:: Subitems

`Back to index <index.rst>`_

========
Subitems
========

.. contents::
    :local:


Get subitems
````````````

.. code-block:: php
    
    $result = $client->subitem->read([
        // subitem fields to select
        'id',
        'name'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ], [
        // arguments for selecting items
        'limit' => 5
    ]);


Create subitems
```````````````

.. code-block:: php
    
    $parentItemId = 123456789;
    $name = 'new subitem';
    $values = ['text' => 'foo bar']; // (optional)
    $createLabels = true; // (optional)
    $result = $client->item->createSubitem($parentItemId, $name, $values, $createLabels);


`Back to top <#top>`_