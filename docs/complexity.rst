.. _top:
.. title:: Complexity

`Back to index <index.rst>`_

==========
Complexity
==========

.. contents::
    :local:


Test complexity
```````````````

.. code-block:: php
    
    use Onetoweb\Monday\Payload\Query;
    
    // query complexity you want to test
    $query = new Query('boards', [], [
        new Query('items', [], ['id', 'name'])
    ]);
    
    $result = $client->complexity->test([
        // complexity fields to select
        'query',
        'before',
        'after',
        'reset_in_x_seconds'
    ], $query);


`Back to top <#top>`_