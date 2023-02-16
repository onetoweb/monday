.. _top:
.. title:: Users

`Back to index <index.rst>`_

=====
Users
=====

.. contents::
    :local:


Read users
``````````

.. code-block:: php
    
    $result = $client->user->read([
        // user fields to select 
        'id',
        'created_at',
        'email',
    ], [
        // arguments for selecting users
        'ids' => [123456789]
    ]);


`Back to top <#top>`_