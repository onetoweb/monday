.. _top:
.. title:: Plan

`Back to index <index.rst>`_

====
Plan
====

.. contents::
    :local:


Get plan
````````

.. code-block:: php
    
    $result = $client->plan->read([
        // plan fields to select
        'max_users',
        'period',
        'tier',
        'version'
    ]);


`Back to top <#top>`_