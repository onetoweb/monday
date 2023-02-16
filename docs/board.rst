.. _top:
.. title:: Boards

`Back to index <index.rst>`_

======
Boards
======

.. contents::
    :local:


Read boards
```````````

.. code-block:: php
    
    $result = $client->board->read([
        // board fields to select
        'id',
        'name',
        'description',
        'items_count',
        'board_kind',
        'board_folder_id',
        'permissions',
        'state',
        'workspace_id',
        'communication'
    ], [
        // arguments for selecting boards
        'limit' => 5,
    ]);


Create board
````````````

.. code-block:: php
    
    $result = $client->board->create([
        'board_name' => 'new board created via api',
        'board_kind' => 'public',
        'description' => 'board description'
    ]);


Update board field
``````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $field = 'description';
    $newValue = 'This is my new description';
    $result = $client->board->update($boardId, $field, $newValue);


Archive board
`````````````

.. code-block:: php
    
    $boardId = 123456789;
    $result = $client->board->archive($boardId);


Delete board
````````````

.. code-block:: php
    
    $boardId = 123456789;
    $result = $client->board->delete($boardId);


Add teams to board
``````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $teamIds = [123456789];
    $result = $client->board->addTeams($boardId, $teamIds);


`Back to top <#top>`_