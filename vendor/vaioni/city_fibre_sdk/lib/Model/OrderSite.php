<?php
/**
 * OrderSite
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
 * OrderSite Class Doc Comment
 *
 * @category Class
 * @description information about the place where the order will be done
 * @package  Vaioni\CityFibreAPI
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class OrderSite implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'orderSite';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'access_restrictions' => 'mixed',
        'hazards' => 'mixed',
        'on_site_contact_details' => '\Vaioni\CityFibreAPI\Model\OrderSiteOnSiteContactDetails'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'access_restrictions' => null,
        'hazards' => null,
        'on_site_contact_details' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'access_restrictions' => true,
		'hazards' => true,
		'on_site_contact_details' => false
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
        'access_restrictions' => 'accessRestrictions',
        'hazards' => 'hazards',
        'on_site_contact_details' => 'onSiteContactDetails'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'access_restrictions' => 'setAccessRestrictions',
        'hazards' => 'setHazards',
        'on_site_contact_details' => 'setOnSiteContactDetails'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'access_restrictions' => 'getAccessRestrictions',
        'hazards' => 'getHazards',
        'on_site_contact_details' => 'getOnSiteContactDetails'
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
        $this->setIfExists('access_restrictions', $data ?? [], null);
        $this->setIfExists('hazards', $data ?? [], null);
        $this->setIfExists('on_site_contact_details', $data ?? [], null);
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

        if (!is_null($this->container['access_restrictions']) && (mb_strlen($this->container['access_restrictions']) > 1024)) {
            $invalidProperties[] = "invalid value for 'access_restrictions', the character length must be smaller than or equal to 1024.";
        }

        if (!is_null($this->container['hazards']) && (mb_strlen($this->container['hazards']) > 1024)) {
            $invalidProperties[] = "invalid value for 'hazards', the character length must be smaller than or equal to 1024.";
        }

        if ($this->container['on_site_contact_details'] === null) {
            $invalidProperties[] = "'on_site_contact_details' can't be null";
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
     * Gets access_restrictions
     *
     * @return mixed|null
     */
    public function getAccessRestrictions()
    {
        return $this->container['access_restrictions'];
    }

    /**
     * Sets access_restrictions
     *
     * @param mixed|null $access_restrictions Access-related issue
     *
     * @return self
     */
    public function setAccessRestrictions($access_restrictions)
    {
        if (!is_null($access_restrictions) && (mb_strlen($access_restrictions) > 1024)) {
            throw new \InvalidArgumentException('invalid length for $access_restrictions when calling OrderSite., must be smaller than or equal to 1024.');
        }


        if (is_null($access_restrictions)) {
            array_push($this->openAPINullablesSetToNull, 'access_restrictions');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('access_restrictions', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['access_restrictions'] = $access_restrictions;

        return $this;
    }

    /**
     * Gets hazards
     *
     * @return mixed|null
     */
    public function getHazards()
    {
        return $this->container['hazards'];
    }

    /**
     * Sets hazards
     *
     * @param mixed|null $hazards Dog
     *
     * @return self
     */
    public function setHazards($hazards)
    {
        if (!is_null($hazards) && (mb_strlen($hazards) > 1024)) {
            throw new \InvalidArgumentException('invalid length for $hazards when calling OrderSite., must be smaller than or equal to 1024.');
        }


        if (is_null($hazards)) {
            array_push($this->openAPINullablesSetToNull, 'hazards');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('hazards', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['hazards'] = $hazards;

        return $this;
    }

    /**
     * Gets on_site_contact_details
     *
     * @return \Vaioni\CityFibreAPI\Model\OrderSiteOnSiteContactDetails
     */
    public function getOnSiteContactDetails()
    {
        return $this->container['on_site_contact_details'];
    }

    /**
     * Sets on_site_contact_details
     *
     * @param \Vaioni\CityFibreAPI\Model\OrderSiteOnSiteContactDetails $on_site_contact_details on_site_contact_details
     *
     * @return self
     */
    public function setOnSiteContactDetails($on_site_contact_details)
    {

        if (is_null($on_site_contact_details)) {
            throw new \InvalidArgumentException('non-nullable on_site_contact_details cannot be null');
        }

        $this->container['on_site_contact_details'] = $on_site_contact_details;

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

