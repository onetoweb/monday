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


`Back to top <#top>`_