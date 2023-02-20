.. _top:
.. title:: Columns

`Back to index <index.rst>`_

=======
Columns
=======

.. contents::
    :local:


Read columns from board
```````````````````````

.. code-block:: php
    
    $result = $client->column->read([
        // column fields to select
        'title',
        'type',
        'description',
        'width',
        'settings_str',
        'archived'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


`Back to top <#top>`_