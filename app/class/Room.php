<?php

class Room
{

    private $_name;
    private $_location;
    private $_description;
    private $_doorsNorth;
    private $_doorsSouth;
    private $_doorsEast;
    private $_doorsWest;
    private $_info;

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setLocation($location)
    {
        $this->_location = $location;
    }

    public function getLocation()
    {
        return $this->_location;
    }

    public function setDescription($description)
    {
        $this->_description = $description;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function setDoorsNorth($doors)
    {
        $this->_doorsNorth = $doors;
    }

    public function getDoorsNorth()
    {
        return $this->_doorsNorth;
    }

    public function setDoorsSouth($doors)
    {
        $this->_doorsSouth = $doors;
    }

    public function getDoorsSouth()
    {
        return $this->_doorsSouth;
    }

    public function setDoorsEast($doors)
    {
        $this->_doorsEast = $doors;
    }

    public function getDoorsEast()
    {
        return $this->_doorsEast;
    }

    public function setDoorsWest($doors)
    {
        $this->_doorsWest = $doors;
    }

    public function getDoorsWest()
    {
        return $this->_doorsWest;
    }

    public function setInfo($info)
    {
        $this->_info = $info;
    }

    public function getInfo()
    {
        return $this->_info;
    }

}