.. _top:
.. title:: Activity logs

`Back to index <index.rst>`_

=============
Activity logs
=============

.. contents::
    :local:


Read activity logs
``````````````````

.. code-block:: php
    
    // example: select activity logs for the last 10 days
    $from = (new DateTime())->modify('-10 days');
    $to = new DateTime();
    
    $result = $client->activityLog->read([
        // activity logs fields to select
        'id',
        'event',
        'data',
        'entity',
        'user_id',
        'account_id',
        'created_at'
    ], [
        // arguments for selecting boards
        'ids' => [123456789],
    ], [
        // arguments for selecting activity logs
        'from' => $from,
        'to' => $to
    ]);


`Back to top <#top>`_