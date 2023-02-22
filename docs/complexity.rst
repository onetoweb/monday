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
    
    use Onetoweb\Monday\Payload\Payload;
    
    // payload complexity you want to test
    $payload = new Payload('boards', [], [
        new Payload('items', [], ['id', 'name'])
    ]);
    
    $result = $client->complexity->test([
        // complexity fields to select
        'query',
        'before',
        'after',
        'reset_in_x_seconds'
    ], $payload);


`Back to top <#top>`_