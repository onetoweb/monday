.. _top:
.. title:: Webhooks

`Back to index <index.rst>`_

========
Webhooks
========

.. contents::
    :local:


Read webhooks
`````````````

.. code-block:: php
    
    $result = $client->webhook->read([
        // webhook fields to select
        'id',
        'config',
        'event',
        'board_id'
    ], [
        // arguments for selecting webhooks
        'board_id' => 123456789,
    ]);


Create webhook
``````````````

Before you create a webhook you must acknowledge the webhook challenge

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    // add this line of code to the script you want to receive the webhook data on (e.g. https://example.com/webhook.php) 
    \Onetoweb\Monday\Webhook::acknowledge();

Create the webhook

.. code-block:: php
    
    $boardId = 123456789;
    $url = 'https://example.com/webhook.php';
    $event = 'change_specific_column_value';
    $config = ['columnId' => 'status']; // optional only required for certain events
    $result = $client->webhook->create($boardId, $url, $event, $config);


Delete webhook
``````````````

.. code-block:: php
    
    $webhookId = 123456789;
    $result = $client->webhook->delete($webhookId);


`Back to top <#top>`_