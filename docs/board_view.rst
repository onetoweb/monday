.. _top:
.. title:: Board views

`Back to index <index.rst>`_

===========
Board views
===========

.. contents::
    :local:


Read boards views
`````````````````

.. code-block:: php
    
    $result = $client->boardView->read([
        // board view fields to select
        'id',
        'name',
        'settings_str',
        'type'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


`Back to top <#top>`_