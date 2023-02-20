.. _top:
.. title:: Documents

`Back to index <index.rst>`_

=========
Documents
=========

.. contents::
    :local:


Read documents
``````````````

.. code-block:: php
    
    $result = $client->document->read([
        // docs fields to select
        'id',
        'name',
        'object_id',
        'doc_folder_id',
        'workspace_id',
        'created_at'
    ], [
        // arguments for selecting docs
        'limit' => 5
    ]);


`Back to top <#top>`_