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
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


`Back to top <#top>`_