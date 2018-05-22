<?php

class Routing
{

    /** @var  Request */
    protected $request;
    /** @var  array */
    public $urlValues;

    public function __construct($request)
    {
        $this->request = $request;

    }

    public function getMatch()
    {
        foreach (routes::getRoutes() as $routeName => $route) {
            $patternRegex = $this->getRegex($route['pattern']);
            if (preg_match($patternRegex, $this->request->getUrl(), $matches)) {
                unset($matches[0]);
                preg_match_all('/{([a-z_0-9]*)}/', $route['pattern'], $keyMatches);
                $this->urlValues = array_combine($keyMatches[1], $matches);
                return $route;
            }
        }
        return false;

    }

    public function getRegex($pattern)
    {
        return '/' . preg_replace('/{([a-z_0-9]*)}/', '([a-z 0-9]*)', str_replace('/', '\/', $pattern)) . '/';
    }

    /**
     * @return array
     */
    public function getUrlValues()
    {
        return $this->urlValues;
    }

    /**
     * @param array $urlValues
     * @return Routing
     */
    public function setUrlValues($urlValues)
    {
        $this->urlValues = $urlValues;

        return $this;
    }




}

