.. _top:
.. title:: Updates

`Back to index <index.rst>`_

=======
Updates
=======

.. contents::
    :local:


Get updates
```````````

.. code-block:: php
    
    $result = $client->update->read([
        // update fields to select
        'body',
        'id',
        'created_at',
    ], [
        // arguments for selecting updates
        'limit' => 5
    ]);


Create update
`````````````

.. code-block:: php
    
    $body = 'This update will be added to the item';
    $itemId = 123456789;
    $parentId = 123456789; // (optional) the parent update id, this can be used to create a reply to an update
    $result = $client->update->create($body, $itemId, $parentId);


Delete update
`````````````

.. code-block:: php
    
    $id = 123456789;
    $result = $client->update->delete($id);


`Back to top <#top>`_