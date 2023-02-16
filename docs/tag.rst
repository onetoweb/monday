.. _top:
.. title:: Tags

`Back to index <index.rst>`_

====
Tags
====

.. contents::
    :local:


Get tags
````````

.. code-block:: php
    
    $result = $client->tag->read([
        // tag fields to select
        'id',
        'name',
        'color'
    ], [
        // arguments for selecting tags
        'ids' => [123456789],
    ]);


Create or get tag
`````````````````

.. code-block:: php
    
    $tagName = 'amazing';
    $result = $client->tag->createOrGet($tagName);


`Back to top <#top>`_