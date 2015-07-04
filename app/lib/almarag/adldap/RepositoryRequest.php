<?php
/**
 * Created by IntelliJ IDEA.
 * User: Alex
 * Date: 04/07/2015
 * Time: 03:24 PM
 */

namespace almarag\adldap;


class RepositoryRequest {
    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
} 