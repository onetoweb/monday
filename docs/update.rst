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


`Back to top <#top>`_