.. _top:
.. title:: Me

`Back to index <index.rst>`_

==
Me
==

.. contents::
    :local:


Get me (current user) data
``````````````````````````

.. code-block:: php
    
    $result = $client->me->read([
        // me fields to select
        'id',
        'name',
        'title',
        'country_code',
        'email',
        'birthday',
        'join_date',
        'location'
    ]);


`Back to top <#top>`_