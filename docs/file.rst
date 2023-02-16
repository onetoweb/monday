.. _top:
.. title:: Files

`Back to index <index.rst>`_

=====
Files
=====

.. contents::
    :local:


Read files
``````````

.. code-block:: php
    
    $result = $client->file->read([
        // file fields to select
        'id',
        'name',
        'url'
    ], [
        // arguments for selecting files
        'ids' => [123456789]
    ]);