<?php

namespace ObserverPatternSample;

use Controller;

spl_autoload_register(function ($className){
   require "$className.php";
});

    // Observer

    /** @var Controller\Client $client */
    $client = new Controller\Client();

    // Subscribers

    /** @var Controller\ServiceGoogleAnalytics $serviceGoogleAnalytics */
    $serviceGoogleAnalytics = new Controller\ServiceGoogleAnalytics();
    /** @var Controller\ServiceFlurryAnalytics $serviceFlurryAnalytics */
    $serviceFlurryAnalytics = new Controller\ServiceFlurryAnalytics();

    /** @var array $services */
    $services = [
        $serviceGoogleAnalytics,
        $serviceFlurryAnalytics,
    ];

    foreach ($services as $service) {
        if (!in_array($service, $client->getAllSubscribers())){
            $client->addSubscriber($service);
        }
    }

    $data = $client->getAggregatedData();

    echo $data;