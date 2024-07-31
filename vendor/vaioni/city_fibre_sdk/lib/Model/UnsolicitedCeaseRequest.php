<?php
/**
 * UnsolicitedCeaseRequest
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
 * UnsolicitedCeaseRequest Class Doc Comment
 *
 * @category Class
 * @package  Vaioni\CityFibreAPI
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UnsolicitedCeaseRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'unsolicitedCeaseRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'message' => '\Vaioni\CityFibreAPI\Model\Message',
        'buyer' => '\Vaioni\CityFibreAPI\Model\Buyer',
        'seller' => '\Vaioni\CityFibreAPI\Model\Seller',
        'order_references' => '\Vaioni\CityFibreAPI\Model\OrderReferences',
        'service_identifier' => 'mixed',
        'requested_date' => 'mixed',
        'cfhnew_order_type' => '\Vaioni\CityFibreAPI\Model\NewOrderType',
        'notes' => 'mixed'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'message' => null,
        'buyer' => null,
        'seller' => null,
        'order_references' => null,
        'service_identifier' => null,
        'requested_date' => 'date-time',
        'cfhnew_order_type' => null,
        'notes' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'message' => false,
		'buyer' => false,
		'seller' => false,
		'order_references' => false,
		'service_identifier' => true,
		'requested_date' => true,
		'cfhnew_order_type' => false,
		'notes' => true
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
        'message' => 'message',
        'buyer' => 'buyer',
        'seller' => 'seller',
        'order_references' => 'orderReferences',
        'service_identifier' => 'serviceIdentifier',
        'requested_date' => 'requestedDate',
        'cfhnew_order_type' => 'cfh:newOrderType',
        'notes' => 'notes'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'message' => 'setMessage',
        'buyer' => 'setBuyer',
        'seller' => 'setSeller',
        'order_references' => 'setOrderReferences',
        'service_identifier' => 'setServiceIdentifier',
        'requested_date' => 'setRequestedDate',
        'cfhnew_order_type' => 'setCfhnewOrderType',
        'notes' => 'setNotes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'message' => 'getMessage',
        'buyer' => 'getBuyer',
        'seller' => 'getSeller',
        'order_references' => 'getOrderReferences',
        'service_identifier' => 'getServiceIdentifier',
        'requested_date' => 'getRequestedDate',
        'cfhnew_order_type' => 'getCfhnewOrderType',
        'notes' => 'getNotes'
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
        $this->setIfExists('message', $data ?? [], null);
        $this->setIfExists('buyer', $data ?? [], null);
        $this->setIfExists('seller', $data ?? [], null);
        $this->setIfExists('order_references', $data ?? [], null);
        $this->setIfExists('service_identifier', $data ?? [], null);
        $this->setIfExists('requested_date', $data ?? [], null);
        $this->setIfExists('cfhnew_order_type', $data ?? [], null);
        $this->setIfExists('notes', $data ?? [], null);
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

        if ($this->container['message'] === null) {
            $invalidProperties[] = "'message' can't be null";
        }
        if ($this->container['buyer'] === null) {
            $invalidProperties[] = "'buyer' can't be null";
        }
        if ($this->container['seller'] === null) {
            $invalidProperties[] = "'seller' can't be null";
        }
        if ($this->container['order_references'] === null) {
            $invalidProperties[] = "'order_references' can't be null";
        }
        if ($this->container['service_identifier'] === null) {
            $invalidProperties[] = "'service_identifier' can't be null";
        }
        if ((mb_strlen($this->container['service_identifier']) > 36)) {
            $invalidProperties[] = "invalid value for 'service_identifier', the character length must be smaller than or equal to 36.";
        }

        if ($this->container['requested_date'] === null) {
            $invalidProperties[] = "'requested_date' can't be null";
        }
        if (!is_null($this->container['notes']) && (mb_strlen($this->container['notes']) > 2047)) {
            $invalidProperties[] = "invalid value for 'notes', the character length must be smaller than or equal to 2047.";
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
     * Gets message
     *
     * @return \Vaioni\CityFibreAPI\Model\Message
     */
    public function getMessage()
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     *
     * @param \Vaioni\CityFibreAPI\Model\Message $message message
     *
     * @return self
     */
    public function setMessage($message)
    {

        if (is_null($message)) {
            throw new \InvalidArgumentException('non-nullable message cannot be null');
        }

        $this->container['message'] = $message;

        return $this;
    }

    /**
     * Gets buyer
     *
     * @return \Vaioni\CityFibreAPI\Model\Buyer
     */
    public function getBuyer()
    {
        return $this->container['buyer'];
    }

    /**
     * Sets buyer
     *
     * @param \Vaioni\CityFibreAPI\Model\Buyer $buyer buyer
     *
     * @return self
     */
    public function setBuyer($buyer)
    {

        if (is_null($buyer)) {
            throw new \InvalidArgumentException('non-nullable buyer cannot be null');
        }

        $this->container['buyer'] = $buyer;

        return $this;
    }

    /**
     * Gets seller
     *
     * @return \Vaioni\CityFibreAPI\Model\Seller
     */
    public function getSeller()
    {
        return $this->container['seller'];
    }

    /**
     * Sets seller
     *
     * @param \Vaioni\CityFibreAPI\Model\Seller $seller seller
     *
     * @return self
     */
    public function setSeller($seller)
    {

        if (is_null($seller)) {
            throw new \InvalidArgumentException('non-nullable seller cannot be null');
        }

        $this->container['seller'] = $seller;

        return $this;
    }

    /**
     * Gets order_references
     *
     * @return \Vaioni\CityFibreAPI\Model\OrderReferences
     */
    public function getOrderReferences()
    {
        return $this->container['order_references'];
    }

    /**
     * Sets order_references
     *
     * @param \Vaioni\CityFibreAPI\Model\OrderReferences $order_references order_references
     *
     * @return self
     */
    public function setOrderReferences($order_references)
    {

        if (is_null($order_references)) {
            throw new \InvalidArgumentException('non-nullable order_references cannot be null');
        }

        $this->container['order_references'] = $order_references;

        return $this;
    }

    /**
     * Gets service_identifier
     *
     * @return mixed
     */
    public function getServiceIdentifier()
    {
        return $this->container['service_identifier'];
    }

    /**
     * Sets service_identifier
     *
     * @param mixed $service_identifier Unique Identifier for the service
     *
     * @return self
     */
    public function setServiceIdentifier($service_identifier)
    {
        if ((mb_strlen($service_identifier) > 36)) {
            throw new \InvalidArgumentException('invalid length for $service_identifier when calling UnsolicitedCeaseRequest., must be smaller than or equal to 36.');
        }


        if (is_null($service_identifier)) {
            array_push($this->openAPINullablesSetToNull, 'service_identifier');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('service_identifier', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['service_identifier'] = $service_identifier;

        return $this;
    }

    /**
     * Gets requested_date
     *
     * @return mixed
     */
    public function getRequestedDate()
    {
        return $this->container['requested_date'];
    }

    /**
     * Sets requested_date
     *
     * @param mixed $requested_date Point at which the change should be applied
     *
     * @return self
     */
    public function setRequestedDate($requested_date)
    {

        if (is_null($requested_date)) {
            array_push($this->openAPINullablesSetToNull, 'requested_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('requested_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['requested_date'] = $requested_date;

        return $this;
    }

    /**
     * Gets cfhnew_order_type
     *
     * @return \Vaioni\CityFibreAPI\Model\NewOrderType|null
     */
    public function getCfhnewOrderType()
    {
        return $this->container['cfhnew_order_type'];
    }

    /**
     * Sets cfhnew_order_type
     *
     * @param \Vaioni\CityFibreAPI\Model\NewOrderType|null $cfhnew_order_type cfhnew_order_type
     *
     * @return self
     */
    public function setCfhnewOrderType($cfhnew_order_type)
    {

        if (is_null($cfhnew_order_type)) {
            throw new \InvalidArgumentException('non-nullable cfhnew_order_type cannot be null');
        }

        $this->container['cfhnew_order_type'] = $cfhnew_order_type;

        return $this;
    }

    /**
     * Gets notes
     *
     * @return mixed|null
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     *
     * @param mixed|null $notes notes
     *
     * @return self
     */
    public function setNotes($notes)
    {
        if (!is_null($notes) && (mb_strlen($notes) > 2047)) {
            throw new \InvalidArgumentException('invalid length for $notes when calling UnsolicitedCeaseRequest., must be smaller than or equal to 2047.');
        }


        if (is_null($notes)) {
            array_push($this->openAPINullablesSetToNull, 'notes');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notes', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['notes'] = $notes;

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


