.. _top:
.. title:: Accounts

`Back to index <index.rst>`_

========
Accounts
========

.. contents::
    :local:


Read accounts
`````````````

.. code-block:: php
    
    $result = $client->account->read([
        // account fields to select
        'id',
        'name',
        'logo',
        'tier',
        'slug',
        'country_code',
        'first_day_of_the_week',
        'show_timeline_weekends',
        'sign_up_product_kind'
    ]);


`Back to top <#top>`_