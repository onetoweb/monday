.. _top:
.. title:: Groups

`Back to index <index.rst>`_

======
Groups
======

.. contents::
    :local:


Read groups
```````````

.. code-block:: php
    
    $result = $client->group->read([
        // group fields to select
        'title',
        'color',
        'position'
    ], [
        // arguments for selecting boards
        'ids' => [123456789]
    ]);


Create group
````````````

.. code-block:: php
    
    $boardId = 123456789;
    $name = 'new group';
    $position = '100000'; // (optional) if omitted the group will be placed at the top
    $result = $client->group->create($boardId, $name, $position);


Update group
````````````

.. code-block:: php
    
    $boardId = 123456789;
    $groupId = 'group12345';
    $attribute  = 'title'; // title, position or color
    $value = 'New title';
    $result = $client->group->update($boardId, $groupId, $attribute, $value);


Duplicate group
```````````````

.. code-block:: php
    
    $boardId = 123456789;
    $groupId = 'group12345';
    $addToTop = true;
    $title = 'New title'; // (optional)
    $result = $client->group->duplicate($boardId, $groupId, $addToTop, $title);


Archive group
`````````````

.. code-block:: php
    
    $boardId = 123456789;
    $groupId = 'group12345';
    $result = $client->group->archive($boardId, $groupId);


Delete group
````````````

.. code-block:: php
    
    
    $boardId = 123456789;
    $groupId = 'group12345';
    $result = $client->group->delete($boardId, $groupId);


`Back to top <#top>`_