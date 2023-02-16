.. _top:
.. title:: Notifications

`Back to index <index.rst>`_

=============
Notifications
=============

.. contents::
    :local:


Create notifications
````````````````````

.. code-block:: php
    
    $userId = 123456789;
    $targetId = 123456789;
    $text = 'This is a notification';
    $type = 'Project';
    $result = $client->notification->create($userId, $targetId, $text, $type);


`Back to top <#top>`_