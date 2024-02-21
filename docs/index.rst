.. title:: Index

===========
Basic Usage
===========

Setup client:

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\Monday\Client as MondayClient;
    
    // param
    $apiKey = 'api_key';
    
    // setup client
    $client = new MondayClient($apiKey);


=========
Endpoints
=========

You can use one of the built in endpoints see examples below:

* `Accounts <account.rst>`_
* `Activity logs <activity_log.rst>`_
* `App subscriptions <app_subscription.rst>`_
* `Boards <board.rst>`_
* `Board views <board_view.rst>`_
* `Columns <column.rst>`_
* `Column values <column_value.rst>`_
* `Complexity <complexity.rst>`_
* `Documents <document.rst>`_
* `Document blocks <document_block.rst>`_
* `Files <file.rst>`_
* `Groups <group.rst>`_
* `Items <item.rst>`_
* `Me <me.rst>`_
* `Notifications <notification.rst>`_
* `Plan <plan.rst>`_
* `Subitems <subitem.rst>`_
* `Tags <tag.rst>`_
* `Teams <team.rst>`_
* `Updates <update.rst>`_
* `Users <user.rst>`_
* `Webhooks <webhook.rst>`_
* `Workspaces <workspace.rst>`_


======================
Build your own payload
======================

You can fetch data by building a query payload:

.. code-block:: php
    
    use Onetoweb\Monday\Payload\Payload;
    
    // example selecting boards, items, subitems and updates
    $payload = new Payload('query', [], [
        new Payload('boards', ['limit' => 5, 'page' => 0], ['id', 'name',
            new Payload('items_page', ['limit' => 3], [
                'cursor', // contains cursor token to load the next item page
                new Payload('items', [], ['id', 'name',
                    new Payload('subitems', [], ['id', 'name',
                        new Payload('updates', [], ['body'])
                    ])
                ])
            ])
        ])
    ]);
    
    $result = $client->request($payload);

You can manipulate data by building a mutation payload:

.. code-block:: php
    
    use Onetoweb\Monday\Payload\Payload;
    
    // create board
    $payload = new Payload('mutation', [], [
        new Payload('create_board', [
            'board_name' => 'new board created via api',
            'board_kind' => 'public',
            'description' => 'board description'
        ], ['id'])
    ]);
    
    $result = $client->request($payload);
