.. _top:
.. title:: Documents blocks

`Back to index <index.rst>`_

================
Documents blocks
================

.. contents::
    :local:


Read documents blocks
`````````````````````

.. code-block:: php
    
    $result = $client->documentBlock->read([
        // document block fields to select
        'id',
        'type',
        'position',
        'content'
    ], [
        // arguments for selecting documents
        'ids' => [123456789]
    ]);


`Back to top <#top>`_