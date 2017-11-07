<?php

namespace Controller;

use Interfaces\Observer;
use Interfaces\Subscriber;

    class Client extends Observer {

        private $subscribers = [];

        public function addSubscriber(Subscriber $subscriber) {

            array_push($this->subscribers, $subscriber);
        }

        public function getAggregatedData() {

            $aggregatedData = [];
            $response = [];

            foreach ($this->subscribers as $sub) {
                $data = $sub->getData();

                $response["error"] = $data["error"];
                $response["message"] = $data["message"];

                if ($response["error"]) {
                    return json_encode($response);
                }

                array_push($aggregatedData, [
                    $data["serviceName"] => $data["visits"]
                ]);
            }

            $response["Data"] = $aggregatedData;

            $response = json_encode($response);
            return $response;
        }

        public function getAllSubscribers() {
            return $this->subscribers;
        }

    }