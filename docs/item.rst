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
        // arguments for selecting items
        'limit' => 5,
        'page' => 1,
        'ids' => [123456789]
    ]);


`Back to top <#top>`_