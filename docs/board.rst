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


Duplicate board
```````````````

.. code-block:: php
    
    $result = $client->board->duplicate([
        'board_id' => 123456789,
        'duplicate_type' => 'duplicate_board_with_pulses_and_updates',
        // (optional) parameters
        'board_name' => 'Board duplicate',
        'workspace_id' => 123456789,
        'folder_id' => 123456789,
        'keep_subscribers' => true
    ]);


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