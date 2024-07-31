<?php
/**
 * BritishAddress
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Vaioni\CityFibreAPI
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * CityFibre Provisioning API - NICC ALA
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 2.30
 * Contact: customer-api-queries@cityfibre.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.3.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Vaioni\CityFibreAPI\Model;

use \ArrayAccess;
use \Vaioni\CityFibreAPI\ObjectSerializer;

/**
 * BritishAddress Class Doc Comment
 *
 * @category Class
 * @package  Vaioni\CityFibreAPI
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BritishAddress implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'britishAddress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'organisation_name' => 'mixed',
        'department_name' => 'mixed',
        'sub_building_name' => 'mixed',
        'building_name' => 'mixed',
        'building_number' => 'mixed',
        'dependent_thoroughfare_name' => 'mixed',
        'dependent_thoroughfare_descriptor' => 'mixed',
        'thoroughfare_name' => 'mixed',
        'thoroughfare_descriptor' => 'mixed',
        'double_dependent_locality' => 'mixed',
        'dependent_locality' => 'mixed',
        'post_town' => 'mixed',
        'postcode' => 'mixed',
        'po_box' => 'mixed'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'organisation_name' => null,
        'department_name' => null,
        'sub_building_name' => null,
        'building_name' => null,
        'building_number' => null,
        'dependent_thoroughfare_name' => null,
        'dependent_thoroughfare_descriptor' => null,
        'thoroughfare_name' => null,
        'thoroughfare_descriptor' => null,
        'double_dependent_locality' => null,
        'dependent_locality' => null,
        'post_town' => null,
        'postcode' => null,
        'po_box' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'organisation_name' => true,
		'department_name' => true,
		'sub_building_name' => true,
		'building_name' => true,
		'building_number' => true,
		'dependent_thoroughfare_name' => true,
		'dependent_thoroughfare_descriptor' => true,
		'thoroughfare_name' => true,
		'thoroughfare_descriptor' => true,
		'double_dependent_locality' => true,
		'dependent_locality' => true,
		'post_town' => true,
		'postcode' => true,
		'po_box' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'organisation_name' => 'organisationName',
        'department_name' => 'departmentName',
        'sub_building_name' => 'subBuildingName',
        'building_name' => 'buildingName',
        'building_number' => 'buildingNumber',
        'dependent_thoroughfare_name' => 'dependentThoroughfareName',
        'dependent_thoroughfare_descriptor' => 'dependentThoroughfareDescriptor',
        'thoroughfare_name' => 'thoroughfareName',
        'thoroughfare_descriptor' => 'thoroughfareDescriptor',
        'double_dependent_locality' => 'doubleDependentLocality',
        'dependent_locality' => 'dependentLocality',
        'post_town' => 'postTown',
        'postcode' => 'postcode',
        'po_box' => 'poBox'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'organisation_name' => 'setOrganisationName',
        'department_name' => 'setDepartmentName',
        'sub_building_name' => 'setSubBuildingName',
        'building_name' => 'setBuildingName',
        'building_number' => 'setBuildingNumber',
        'dependent_thoroughfare_name' => 'setDependentThoroughfareName',
        'dependent_thoroughfare_descriptor' => 'setDependentThoroughfareDescriptor',
        'thoroughfare_name' => 'setThoroughfareName',
        'thoroughfare_descriptor' => 'setThoroughfareDescriptor',
        'double_dependent_locality' => 'setDoubleDependentLocality',
        'dependent_locality' => 'setDependentLocality',
        'post_town' => 'setPostTown',
        'postcode' => 'setPostcode',
        'po_box' => 'setPoBox'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'organisation_name' => 'getOrganisationName',
        'department_name' => 'getDepartmentName',
        'sub_building_name' => 'getSubBuildingName',
        'building_name' => 'getBuildingName',
        'building_number' => 'getBuildingNumber',
        'dependent_thoroughfare_name' => 'getDependentThoroughfareName',
        'dependent_thoroughfare_descriptor' => 'getDependentThoroughfareDescriptor',
        'thoroughfare_name' => 'getThoroughfareName',
        'thoroughfare_descriptor' => 'getThoroughfareDescriptor',
        'double_dependent_locality' => 'getDoubleDependentLocality',
        'dependent_locality' => 'getDependentLocality',
        'post_town' => 'getPostTown',
        'postcode' => 'getPostcode',
        'po_box' => 'getPoBox'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('organisation_name', $data ?? [], null);
        $this->setIfExists('department_name', $data ?? [], null);
        $this->setIfExists('sub_building_name', $data ?? [], null);
        $this->setIfExists('building_name', $data ?? [], null);
        $this->setIfExists('building_number', $data ?? [], null);
        $this->setIfExists('dependent_thoroughfare_name', $data ?? [], null);
        $this->setIfExists('dependent_thoroughfare_descriptor', $data ?? [], null);
        $this->setIfExists('thoroughfare_name', $data ?? [], null);
        $this->setIfExists('thoroughfare_descriptor', $data ?? [], null);
        $this->setIfExists('double_dependent_locality', $data ?? [], null);
        $this->setIfExists('dependent_locality', $data ?? [], null);
        $this->setIfExists('post_town', $data ?? [], null);
        $this->setIfExists('postcode', $data ?? [], null);
        $this->setIfExists('po_box', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['organisation_name']) && (mb_strlen($this->container['organisation_name']) > 63)) {
            $invalidProperties[] = "invalid value for 'organisation_name', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['department_name']) && (mb_strlen($this->container['department_name']) > 63)) {
            $invalidProperties[] = "invalid value for 'department_name', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['sub_building_name']) && (mb_strlen($this->container['sub_building_name']) > 63)) {
            $invalidProperties[] = "invalid value for 'sub_building_name', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['building_name']) && (mb_strlen($this->container['building_name']) > 63)) {
            $invalidProperties[] = "invalid value for 'building_name', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['building_number']) && (mb_strlen($this->container['building_number']) > 63)) {
            $invalidProperties[] = "invalid value for 'building_number', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['dependent_thoroughfare_name']) && (mb_strlen($this->container['dependent_thoroughfare_name']) > 63)) {
            $invalidProperties[] = "invalid value for 'dependent_thoroughfare_name', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['dependent_thoroughfare_descriptor']) && (mb_strlen($this->container['dependent_thoroughfare_descriptor']) > 63)) {
            $invalidProperties[] = "invalid value for 'dependent_thoroughfare_descriptor', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['thoroughfare_name']) && (mb_strlen($this->container['thoroughfare_name']) > 63)) {
            $invalidProperties[] = "invalid value for 'thoroughfare_name', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['thoroughfare_descriptor']) && (mb_strlen($this->container['thoroughfare_descriptor']) > 63)) {
            $invalidProperties[] = "invalid value for 'thoroughfare_descriptor', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['double_dependent_locality']) && (mb_strlen($this->container['double_dependent_locality']) > 63)) {
            $invalidProperties[] = "invalid value for 'double_dependent_locality', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['dependent_locality']) && (mb_strlen($this->container['dependent_locality']) > 63)) {
            $invalidProperties[] = "invalid value for 'dependent_locality', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['post_town']) && (mb_strlen($this->container['post_town']) > 63)) {
            $invalidProperties[] = "invalid value for 'post_town', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['postcode']) && (mb_strlen($this->container['postcode']) > 63)) {
            $invalidProperties[] = "invalid value for 'postcode', the character length must be smaller than or equal to 63.";
        }

        if (!is_null($this->container['po_box']) && (mb_strlen($this->container['po_box']) > 63)) {
            $invalidProperties[] = "invalid value for 'po_box', the character length must be smaller than or equal to 63.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets organisation_name
     *
     * @return mixed|null
     */
    public function getOrganisationName()
    {
        return $this->container['organisation_name'];
    }

    /**
     * Sets organisation_name
     *
     * @param mixed|null $organisation_name Organisation Name as registered with the tax authorities
     *
     * @return self
     */
    public function setOrganisationName($organisation_name)
    {
        if (!is_null($organisation_name) && (mb_strlen($organisation_name) > 63)) {
            throw new \InvalidArgumentException('invalid length for $organisation_name when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($organisation_name)) {
            array_push($this->openAPINullablesSetToNull, 'organisation_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('organisation_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['organisation_name'] = $organisation_name;

        return $this;
    }

    /**
     * Gets department_name
     *
     * @return mixed|null
     */
    public function getDepartmentName()
    {
        return $this->container['department_name'];
    }

    /**
     * Sets department_name
     *
     * @param mixed|null $department_name Department name
     *
     * @return self
     */
    public function setDepartmentName($department_name)
    {
        if (!is_null($department_name) && (mb_strlen($department_name) > 63)) {
            throw new \InvalidArgumentException('invalid length for $department_name when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($department_name)) {
            array_push($this->openAPINullablesSetToNull, 'department_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('department_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['department_name'] = $department_name;

        return $this;
    }

    /**
     * Gets sub_building_name
     *
     * @return mixed|null
     */
    public function getSubBuildingName()
    {
        return $this->container['sub_building_name'];
    }

    /**
     * Sets sub_building_name
     *
     * @param mixed|null $sub_building_name Sub building name
     *
     * @return self
     */
    public function setSubBuildingName($sub_building_name)
    {
        if (!is_null($sub_building_name) && (mb_strlen($sub_building_name) > 63)) {
            throw new \InvalidArgumentException('invalid length for $sub_building_name when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($sub_building_name)) {
            array_push($this->openAPINullablesSetToNull, 'sub_building_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('sub_building_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['sub_building_name'] = $sub_building_name;

        return $this;
    }

    /**
     * Gets building_name
     *
     * @return mixed|null
     */
    public function getBuildingName()
    {
        return $this->container['building_name'];
    }

    /**
     * Sets building_name
     *
     * @param mixed|null $building_name Sub building name
     *
     * @return self
     */
    public function setBuildingName($building_name)
    {
        if (!is_null($building_name) && (mb_strlen($building_name) > 63)) {
            throw new \InvalidArgumentException('invalid length for $building_name when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($building_name)) {
            array_push($this->openAPINullablesSetToNull, 'building_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('building_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['building_name'] = $building_name;

        return $this;
    }

    /**
     * Gets building_number
     *
     * @return mixed|null
     */
    public function getBuildingNumber()
    {
        return $this->container['building_number'];
    }

    /**
     * Sets building_number
     *
     * @param mixed|null $building_number Building number
     *
     * @return self
     */
    public function setBuildingNumber($building_number)
    {
        if (!is_null($building_number) && (mb_strlen($building_number) > 63)) {
            throw new \InvalidArgumentException('invalid length for $building_number when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($building_number)) {
            array_push($this->openAPINullablesSetToNull, 'building_number');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('building_number', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['building_number'] = $building_number;

        return $this;
    }

    /**
     * Gets dependent_thoroughfare_name
     *
     * @return mixed|null
     */
    public function getDependentThoroughfareName()
    {
        return $this->container['dependent_thoroughfare_name'];
    }

    /**
     * Sets dependent_thoroughfare_name
     *
     * @param mixed|null $dependent_thoroughfare_name 
     *
     * @return self
     */
    public function setDependentThoroughfareName($dependent_thoroughfare_name)
    {
        if (!is_null($dependent_thoroughfare_name) && (mb_strlen($dependent_thoroughfare_name) > 63)) {
            throw new \InvalidArgumentException('invalid length for $dependent_thoroughfare_name when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($dependent_thoroughfare_name)) {
            array_push($this->openAPINullablesSetToNull, 'dependent_thoroughfare_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dependent_thoroughfare_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['dependent_thoroughfare_name'] = $dependent_thoroughfare_name;

        return $this;
    }

    /**
     * Gets dependent_thoroughfare_descriptor
     *
     * @return mixed|null
     */
    public function getDependentThoroughfareDescriptor()
    {
        return $this->container['dependent_thoroughfare_descriptor'];
    }

    /**
     * Sets dependent_thoroughfare_descriptor
     *
     * @param mixed|null $dependent_thoroughfare_descriptor 
     *
     * @return self
     */
    public function setDependentThoroughfareDescriptor($dependent_thoroughfare_descriptor)
    {
        if (!is_null($dependent_thoroughfare_descriptor) && (mb_strlen($dependent_thoroughfare_descriptor) > 63)) {
            throw new \InvalidArgumentException('invalid length for $dependent_thoroughfare_descriptor when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($dependent_thoroughfare_descriptor)) {
            array_push($this->openAPINullablesSetToNull, 'dependent_thoroughfare_descriptor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dependent_thoroughfare_descriptor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['dependent_thoroughfare_descriptor'] = $dependent_thoroughfare_descriptor;

        return $this;
    }

    /**
     * Gets thoroughfare_name
     *
     * @return mixed|null
     */
    public function getThoroughfareName()
    {
        return $this->container['thoroughfare_name'];
    }

    /**
     * Sets thoroughfare_name
     *
     * @param mixed|null $thoroughfare_name 
     *
     * @return self
     */
    public function setThoroughfareName($thoroughfare_name)
    {
        if (!is_null($thoroughfare_name) && (mb_strlen($thoroughfare_name) > 63)) {
            throw new \InvalidArgumentException('invalid length for $thoroughfare_name when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($thoroughfare_name)) {
            array_push($this->openAPINullablesSetToNull, 'thoroughfare_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('thoroughfare_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['thoroughfare_name'] = $thoroughfare_name;

        return $this;
    }

    /**
     * Gets thoroughfare_descriptor
     *
     * @return mixed|null
     */
    public function getThoroughfareDescriptor()
    {
        return $this->container['thoroughfare_descriptor'];
    }

    /**
     * Sets thoroughfare_descriptor
     *
     * @param mixed|null $thoroughfare_descriptor 
     *
     * @return self
     */
    public function setThoroughfareDescriptor($thoroughfare_descriptor)
    {
        if (!is_null($thoroughfare_descriptor) && (mb_strlen($thoroughfare_descriptor) > 63)) {
            throw new \InvalidArgumentException('invalid length for $thoroughfare_descriptor when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($thoroughfare_descriptor)) {
            array_push($this->openAPINullablesSetToNull, 'thoroughfare_descriptor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('thoroughfare_descriptor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['thoroughfare_descriptor'] = $thoroughfare_descriptor;

        return $this;
    }

    /**
     * Gets double_dependent_locality
     *
     * @return mixed|null
     */
    public function getDoubleDependentLocality()
    {
        return $this->container['double_dependent_locality'];
    }

    /**
     * Sets double_dependent_locality
     *
     * @param mixed|null $double_dependent_locality 
     *
     * @return self
     */
    public function setDoubleDependentLocality($double_dependent_locality)
    {
        if (!is_null($double_dependent_locality) && (mb_strlen($double_dependent_locality) > 63)) {
            throw new \InvalidArgumentException('invalid length for $double_dependent_locality when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($double_dependent_locality)) {
            array_push($this->openAPINullablesSetToNull, 'double_dependent_locality');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('double_dependent_locality', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['double_dependent_locality'] = $double_dependent_locality;

        return $this;
    }

    /**
     * Gets dependent_locality
     *
     * @return mixed|null
     */
    public function getDependentLocality()
    {
        return $this->container['dependent_locality'];
    }

    /**
     * Sets dependent_locality
     *
     * @param mixed|null $dependent_locality 
     *
     * @return self
     */
    public function setDependentLocality($dependent_locality)
    {
        if (!is_null($dependent_locality) && (mb_strlen($dependent_locality) > 63)) {
            throw new \InvalidArgumentException('invalid length for $dependent_locality when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($dependent_locality)) {
            array_push($this->openAPINullablesSetToNull, 'dependent_locality');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dependent_locality', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['dependent_locality'] = $dependent_locality;

        return $this;
    }

    /**
     * Gets post_town
     *
     * @return mixed|null
     */
    public function getPostTown()
    {
        return $this->container['post_town'];
    }

    /**
     * Sets post_town
     *
     * @param mixed|null $post_town 
     *
     * @return self
     */
    public function setPostTown($post_town)
    {
        if (!is_null($post_town) && (mb_strlen($post_town) > 63)) {
            throw new \InvalidArgumentException('invalid length for $post_town when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($post_town)) {
            array_push($this->openAPINullablesSetToNull, 'post_town');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('post_town', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['post_town'] = $post_town;

        return $this;
    }

    /**
     * Gets postcode
     *
     * @return mixed|null
     */
    public function getPostcode()
    {
        return $this->container['postcode'];
    }

    /**
     * Sets postcode
     *
     * @param mixed|null $postcode Location postcode / zipcode
     *
     * @return self
     */
    public function setPostcode($postcode)
    {
        if (!is_null($postcode) && (mb_strlen($postcode) > 63)) {
            throw new \InvalidArgumentException('invalid length for $postcode when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($postcode)) {
            array_push($this->openAPINullablesSetToNull, 'postcode');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('postcode', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['postcode'] = $postcode;

        return $this;
    }

    /**
     * Gets po_box
     *
     * @return mixed|null
     */
    public function getPoBox()
    {
        return $this->container['po_box'];
    }

    /**
     * Sets po_box
     *
     * @param mixed|null $po_box PO BOX
     *
     * @return self
     */
    public function setPoBox($po_box)
    {
        if (!is_null($po_box) && (mb_strlen($po_box) > 63)) {
            throw new \InvalidArgumentException('invalid length for $po_box when calling BritishAddress., must be smaller than or equal to 63.');
        }


        if (is_null($po_box)) {
            array_push($this->openAPINullablesSetToNull, 'po_box');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('po_box', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['po_box'] = $po_box;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


