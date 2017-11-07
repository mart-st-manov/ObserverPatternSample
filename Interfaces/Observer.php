<?php

namespace Interfaces;

abstract class Observer {
    public abstract function addSubscriber(Subscriber $subscriber);
    public abstract function getAllSubscribers();
    public abstract function getAggregatedData();
}