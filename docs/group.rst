.. _top:
.. title:: Groups

`Back to index <index.rst>`_

======
Groups
======

.. contents::
    :local:


Read groups
```````````

.. code-block:: php
    
    $result = $client->group->read([
        // group fields to select
        'title',
        'color',
        'position'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


`Back to top <#top>`_