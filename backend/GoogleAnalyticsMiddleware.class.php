<?php

class GoogleAnalyticsMiddleware extends \Slim\Middleware
{
    private $Client;

    public function __construct()
    {
        $this->Client = Krizon\Google\Analytics\MeasurementProtocol\MeasurementProtocolClient::factory();
    }

    public function call()
    {
        $this->next->call();

        $App = $this->app;
        $Request = $App->request;
        $Route = $App->router()->getCurrentRoute();

        if($Route->getName() !== "index" || is_null($App->config("GoogleAnalytics")['trackingId']) || is_null($App->config("GoogleAnalytics")['customerId'])) {
            $this->Client->pageview(array(
                'tid' => $App->config("GoogleAnalytics")['trackingId'],
                'cid' => $App->config("GoogleAnalytics")['customerId'],
                'dh' => $App->config("domain"),
                'dp' => $Request->getResourceUri(),
                'dt' => $Route->getName()
            ));
        }
    }
}