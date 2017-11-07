<?php

namespace Controller;

use Interfaces\Subscriber;

    class ServiceFlurryAnalytics extends Subscriber {

        public $id = "FA456";
        public $name = "Flurry Analytics";

        /**
         * @return array
         */
        public function getData()
        {
            // TODO: Implement Flurry Analytics API to get actual data for an actual site

            /** @var int $visits */
            $visits = 0; // and other data if needed in a better format
            /** @var bool $error */
            $error = false;
            /** @var string $message */
            $message = "";

            try {
                // Retrieve data from service
                $visits = 40;

            } catch (\Exception $exc) {
                $error = true;
                $message = $exc->getMessage();
            }

            /** @var array $response */
            $response = [
                "error" => $error,
                "message" =>$message,
                "serviceId" => $this->id,
                "serviceName" => $this->name,
                "visits" => $visits,
            ];

            return $response;

        }

    }