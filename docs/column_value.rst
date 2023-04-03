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


Extended read column values from board
``````````````````````````````````````

Includes board / item fields and arguments for collum values


.. code-block:: php
    
    $result = $client->columnValue->readExtended([
        // board fields to select
        'id',
        'name'
    ], [
        // item fields to select
        'id',
        'name'
    ], [
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
        'limit' => 5,
        'page' => 1
    ], [
        // arguments for selecting collum values
        'ids' => ['text'],
    ]);


`Back to top <#top>`_