<?php
class Parser
{
    protected $cache;
    protected $data;
    protected $ttl = 3600;
    public function __construct($cache)
    {
        $this->cache = $cache;
        $this->data = new Data;
    }
    
    public function parse($msisdn)
    {
        $msisdn = $this->validate($msisdn);
        return $msisdn === false ? $msisdn : $this->lookup($msisdn);
    }
    protected function validate($msisdn)
    {
        $msisdn = trim($msisdn);
        if ($msisdn === '') {
            return false;
        }
        if (!preg_match('/\+\d+/', $msisdn)) {
            return false;
        }
        return (int)trim($msisdn, '+');
    }
    protected function lookup($msisdn)
    {
        $countryData = $this->lookupCountry($msisdn);
        if ($countryData !== false) {
            $data = array(
                'msisdn' => '+' . $msisdn,
                'countryDialingCode' => $countryData['countryCode'],
                'country' => $countryData['country'],
                'subscriberNumber' => $countryData['subscriberNumber']
            );
            $operator = $this->lookupOperator(
                $countryData['subscriberNumber'],
                $countryData['country']
            );
            if ($operator !== false) {
                $data['operator'] = $operator;
            }
            return $data;
        }
        return false;
    }
    protected function lookupCountry($countryCode, $subscriberNumber = '')
    {
        $countries = $this->getCountriesData();
        do {
            if (isset($countries[$countryCode])) {
                return array(
                    'country' => $countries[$countryCode],
                    'countryCode' => (int)$countryCode,
                    'subscriberNumber' => (int)$subscriberNumber
                );
            }
            $subscriberNumber = substr($countryCode, -1).$subscriberNumber;
            $countryCode = floor($countryCode/10);
        } while ($countryCode > 0);
        return false;
    }
    protected function lookupOperator($operatorCode, $country)
    {
        $operatorData = $this->getOperatorData($country);
        if (!$operatorData) {
            return false;
        }
        do {
            if (isset($operatorData[$operatorCode])) {
                return $operatorData[$operatorCode];
            }
            $operatorCode = floor($operatorCode/10);
        } while ($operatorCode > 0);
        
        return false;
    }
    protected function getCountriesData()
    {
        return $this->cache->get(
            $this->data,
            'get',
            array('countries'),
            $this->ttl
        );
    }
    protected function getOperatorData($country)
    {
        return $this->cache->get(
            $this->data,
            'get',
            array($country),
            $this->ttl
        );
    }
}
?>