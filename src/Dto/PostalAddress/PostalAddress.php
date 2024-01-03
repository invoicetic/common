<?php

namespace Invoicetic\Common\Dto\PostalAddress;

use Invoicetic\Common\Serializer\Serializable;

class PostalAddress
{
    use Serializable;

    protected ?string $streetName = null;
    protected ?string $additionalStreetName = null;
    protected ?string $buildingNumber = null;
    protected ?string $cityName = null;
    protected ?string $postalZone = null;

    protected ?string $countrySubentity = null;
    protected $country;


    public function getBuildingNumber(): ?string
    {
        return $this->buildingNumber;
    }

    /**
     * Set Building Name
     */
    public function setBuildingNumber(?string $buildingNumber): PostalAddress
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    /**
     * Get street name
     */
    public function getStreetName(): ?string
    {
        return $this->streetName;
    }

    /**
     * Set street Name
     */
    public function setStreetName(?string $streetName): PostalAddress
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * Get Additional Street Name
     */
    public function getAdditionalStreetName(): ?string
    {
        return $this->additionalStreetName;
    }

    /**
     * Set addional street name
     */
    public function setAdditionalStreetName(?string $additionalStreetName): PostalAddress
    {
        $this->additionalStreetName = $additionalStreetName;
        return $this;
    }

    /**
     * get city name
     */
    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    /**
     * Set City Name
     */
    public function setCityName(?string $cityName): PostalAddress
    {
        $this->cityName = $cityName;
        return $this;
    }

    /**
     * Get postal zone
     */
    public function getPostalZone(): ?string
    {
        return $this->postalZone;
    }

    /**
     * Set postal zone
     */
    public function setPostalZone(?string $postalZone): PostalAddress
    {
        $this->postalZone = $postalZone;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountrySubentity(): ?string
    {
        return $this->countrySubentity;
    }

    /**
     * @param string|null $countrySubentity
     * @return self
     */
    public function setCountrySubentity(?string $countrySubentity): self
    {
        $this->countrySubentity = $countrySubentity;
        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * Set Country
     */
    public function setCountry(Country $country): PostalAddress
    {
        $this->country = $country;
        return $this;
    }
}
