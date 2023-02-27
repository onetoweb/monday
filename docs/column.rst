.. _top:
.. title:: Columns

`Back to index <index.rst>`_

=======
Columns
=======

.. contents::
    :local:


Read columns from board
```````````````````````

.. code-block:: php
    
    $result = $client->column->read([
        // column fields to select
        'id',
        'title',
        'type',
        'description',
        'width',
        'settings_str',
        'archived'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


Create column
`````````````

.. code-block:: php
    
    $result = $client->column->create([
        'board_id' => 123456789,
        'title' => 'New column',
        'description' => 'Column description',
        'column_type' => 'text'
    ]);


Update a simple column value
````````````````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $itemId = 123456789;
    $columnId = 'column1';
    $value = 'foo bar';
    $result = $client->column->updateSimpleValue($boardId, $itemId, $columnId, $value);


Update a column value
`````````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $itemId = 123456789;
    $columnId = 'column1';
    $value = ['ids' => [1, 2]];
    $result = $client->column->updatValue($boardId, $itemId, $columnId, $value);


Update multiple column values
`````````````````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $itemId = 123456789;
    $columnValues = ['column1' => 'foo bar', 'column2' => ['ids' => [1, 2]]];
    $result = $client->column->updateMultipleValues($boardId, $itemId, $columnValues);


Update column metadata
``````````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $columnId = 'column1';
    $columnProperty = 'description';
    $value = 'foo bar';
    $result = $client->column->updateMetadata($boardId, $columnId, $columnProperty, $value);


Update column title
```````````````````

.. code-block:: php
    
    $boardId = 123456789;
    $columnId = 'column1';
    $title = 'new title';
    $result = $client->column->updateTitle($boardId, $columnId, $title);


Delete column
`````````````

.. code-block:: php
    
    $boardId = 123456789;
    $columnId = 'new_column';
    $result = $client->column->delete($boardId, $columnId);


`Back to top <#top>`_