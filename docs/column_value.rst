.. _top:
.. title:: Column values

`Back to index <index.rst>`_

=============
Column values
=============

.. contents::
    :local:


Read column values from board
`````````````````````````````

.. code-block:: php
    
    $result = $client->columnValue->read([
        // column value fields to select
        'id',
        'title',
        'description',
        'type',
        'value',
        'text',
        'additional_info'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ], [
        // arguments for selecting items
        'limit' => 50
    ]);


`Back to top <#top>`_