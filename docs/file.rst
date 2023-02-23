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


Add file to update
``````````````````

.. code-block:: php
    
    $filepath = '/path/to/file.txt';
    $updateId = 123456789;
    $result = $client->file->addToUpdate($filepath, $updateId);


Add file to column
``````````````````

.. code-block:: php
    
    $filepath = '/path/to/file.txt';
    $itemId = 123456789;
    $columnId = 'files';
    $result = $client->file->addToColumn($filepath, $itemId, $columnId);


`Back to top <#top>`_