.. _top:
.. title:: App subscriptions

`Back to index <index.rst>`_

=================
App subscriptions
=================

.. contents::
    :local:


Read app subscriptions
``````````````````````

.. code-block:: php
    
    $result = $client->appSubscription->read([
        // app subscriptions fields to select
        'billing_period',
        'days_left',
        'is_trial',
        'plan_id',
        'renewal_date'
    ]);


`Back to top <#top>`_