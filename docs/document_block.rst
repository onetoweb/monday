.. _top:
.. title:: Documents blocks

`Back to index <index.rst>`_

================
Documents blocks
================

.. contents::
    :local:


Read documents blocks
`````````````````````

.. code-block:: php
    
    $result = $client->documentBlock->read([
        // document block fields to select
        'id',
        'parent_block_id',
        'type',
        'position',
        'content'
    ], [
        // arguments for selecting documents
        'ids' => [123456789]
    ]);


Create document block
`````````````````````

.. code-block:: php
    
    $documentId = 123456789;
    $type = 'normal_text';
    $content = [
        'alignment' => 'left',
        'direction' => 'ltr',
        'deltaFormat' => [
            [
                'insert' => 'Lorem ipsum dolor sit amet.'
            ]
        ]
    ];
    $afterBlockId = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'; // (optional) if omitted the new document block will be placed at the top of the document
    $result = $client->documentBlock->create($documentId, $type, $content, $afterBlockId);


Update document block
`````````````````````

.. code-block:: php
    
    $blockId = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $content = [
        'alignment' => 'left',
        'direction' => 'ltr',
        'deltaFormat' => [
            [
                'insert' => 'Lorem ipsum dolor sit amet.'
            ]
        ]
    ];
    $result = $client->documentBlock->update($blockId, $content);


Delete document block
`````````````````````

.. code-block:: php
    
    $blockId = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
    $result = $client->documentBlock->delete($blockId);


`Back to top <#top>`_