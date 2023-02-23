.. _top:
.. title:: Workspaces

`Back to index <index.rst>`_

==========
Workspaces
==========

.. contents::
    :local:


Read workspaces
```````````````

.. code-block:: php
    
    $result = $client->workspace->read([
        // workspace fields to select
        'id',
        'name',
        'kind',
        'description',
        'state',
        'created_at'
    ], [
        // arguments for selecting workspace
        'limit' => 5,
        'page' => 0
    ]);


Create workspace
````````````````

.. code-block:: php
    
    $result = $client->workspace->create([
        'name' => 'New Cool Workspace',
        'kind' => 'open',
        'description' => 'This is a cool description'
    ]);


Delete workspace
````````````````

.. code-block:: php
    
    $workspaceId = 123456789;
    $result = $client->workspace->delete($workspaceId);


Add users to workspace
``````````````````````

.. code-block:: php
    
    $workspaceId = 123456789;
    $userIds = [123456789, 123456789];
    $kind = 'subscriber'; // (optional) subscriber or owner
    $result = $client->workspace->addUsers($workspaceId, $userIds, $kind);


Remove users to workspace
`````````````````````````

.. code-block:: php
    
    $workspaceId = 123456789;
    $userIds = [123456789, 123456789];
    $result = $client->workspace->removeUsers($workspaceId, $userIds);


Add teams to workspace
``````````````````````

.. code-block:: php
    
    $workspaceId = 123456789;
    $teamIds = [123456789, 123456789];
    $result = $client->workspace->addTeams($workspaceId, $teamIds);


Remove teams to workspace
`````````````````````````

.. code-block:: php
    
    $workspaceId = 123456789;
    $teamIds = [123456789, 123456789];
    $result = $client->workspace->removeTeams($workspaceId, $teamIds);


`Back to top <#top>`_