.. _top:
.. title:: Teams

`Back to index <index.rst>`_

=====
Teams
=====

.. contents::
    :local:


Read teams
``````````

.. code-block:: php
    
    $result = $client->team->read([
        // team fields to select
        'id',
        'name',
        'picture_url'
    ], [
        // arguments for selecting teams
        'ids' => [123456789]
    ]);


`Back to top <#top>`_