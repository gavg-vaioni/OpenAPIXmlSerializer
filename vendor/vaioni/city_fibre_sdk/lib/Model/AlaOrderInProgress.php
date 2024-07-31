<?php
/**
 * AlaOrderInProgress
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
 * AlaOrderInProgress Class Doc Comment
 *
 * @category Class
 * @package  Vaioni\CityFibreAPI
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AlaOrderInProgress implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'alaOrderInProgress';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cfhpre_order' => 'mixed',
        'location' => '\Vaioni\CityFibreAPI\Model\Location',
        'service_identifier' => 'mixed',
        'service_item' => '\Vaioni\CityFibreAPI\Model\ServiceItem',
        'cfhlive_date' => 'mixed',
        'appointment' => '\Vaioni\CityFibreAPI\Model\AppointmentWithFad',
        'requested_date' => 'mixed',
        'committed_date' => 'mixed',
        'amendment_accepted' => '\Vaioni\CityFibreAPI\Model\AmendmentAccepted',
        'amendment_rejected' => 'mixed',
        'warning' => '\Vaioni\CityFibreAPI\Model\Warning',
        'delayed' => 'mixed',
        'cfhnext_best_action' => 'mixed',
        'cancellation_rejected' => 'mixed',
        'cfhnew_order_type' => '\Vaioni\CityFibreAPI\Model\NewOrderType'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cfhpre_order' => null,
        'location' => null,
        'service_identifier' => null,
        'service_item' => null,
        'cfhlive_date' => 'date-time',
        'appointment' => null,
        'requested_date' => 'date-time',
        'committed_date' => 'date-time',
        'amendment_accepted' => null,
        'amendment_rejected' => null,
        'warning' => null,
        'delayed' => null,
        'cfhnext_best_action' => null,
        'cancellation_rejected' => null,
        'cfhnew_order_type' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'cfhpre_order' => true,
		'location' => false,
		'service_identifier' => true,
		'service_item' => false,
		'cfhlive_date' => true,
		'appointment' => false,
		'requested_date' => true,
		'committed_date' => true,
		'amendment_accepted' => false,
		'amendment_rejected' => true,
		'warning' => false,
		'delayed' => true,
		'cfhnext_best_action' => true,
		'cancellation_rejected' => true,
		'cfhnew_order_type' => false
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
        'cfhpre_order' => 'cfh:preOrder',
        'location' => 'location',
        'service_identifier' => 'serviceIdentifier',
        'service_item' => 'serviceItem',
        'cfhlive_date' => 'cfh:liveDate',
        'appointment' => 'appointment',
        'requested_date' => 'requestedDate',
        'committed_date' => 'committedDate',
        'amendment_accepted' => 'amendmentAccepted',
        'amendment_rejected' => 'amendmentRejected',
        'warning' => 'warning',
        'delayed' => 'delayed',
        'cfhnext_best_action' => 'cfh:nextBestAction',
        'cancellation_rejected' => 'cancellationRejected',
        'cfhnew_order_type' => 'cfh:newOrderType'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cfhpre_order' => 'setCfhpreOrder',
        'location' => 'setLocation',
        'service_identifier' => 'setServiceIdentifier',
        'service_item' => 'setServiceItem',
        'cfhlive_date' => 'setCfhliveDate',
        'appointment' => 'setAppointment',
        'requested_date' => 'setRequestedDate',
        'committed_date' => 'setCommittedDate',
        'amendment_accepted' => 'setAmendmentAccepted',
        'amendment_rejected' => 'setAmendmentRejected',
        'warning' => 'setWarning',
        'delayed' => 'setDelayed',
        'cfhnext_best_action' => 'setCfhnextBestAction',
        'cancellation_rejected' => 'setCancellationRejected',
        'cfhnew_order_type' => 'setCfhnewOrderType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cfhpre_order' => 'getCfhpreOrder',
        'location' => 'getLocation',
        'service_identifier' => 'getServiceIdentifier',
        'service_item' => 'getServiceItem',
        'cfhlive_date' => 'getCfhliveDate',
        'appointment' => 'getAppointment',
        'requested_date' => 'getRequestedDate',
        'committed_date' => 'getCommittedDate',
        'amendment_accepted' => 'getAmendmentAccepted',
        'amendment_rejected' => 'getAmendmentRejected',
        'warning' => 'getWarning',
        'delayed' => 'getDelayed',
        'cfhnext_best_action' => 'getCfhnextBestAction',
        'cancellation_rejected' => 'getCancellationRejected',
        'cfhnew_order_type' => 'getCfhnewOrderType'
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
        $this->setIfExists('cfhpre_order', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
        $this->setIfExists('service_identifier', $data ?? [], null);
        $this->setIfExists('service_item', $data ?? [], null);
        $this->setIfExists('cfhlive_date', $data ?? [], null);
        $this->setIfExists('appointment', $data ?? [], null);
        $this->setIfExists('requested_date', $data ?? [], null);
        $this->setIfExists('committed_date', $data ?? [], null);
        $this->setIfExists('amendment_accepted', $data ?? [], null);
        $this->setIfExists('amendment_rejected', $data ?? [], null);
        $this->setIfExists('warning', $data ?? [], null);
        $this->setIfExists('delayed', $data ?? [], null);
        $this->setIfExists('cfhnext_best_action', $data ?? [], null);
        $this->setIfExists('cancellation_rejected', $data ?? [], null);
        $this->setIfExists('cfhnew_order_type', $data ?? [], null);
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

        if (!is_null($this->container['service_identifier']) && (mb_strlen($this->container['service_identifier']) > 36)) {
            $invalidProperties[] = "invalid value for 'service_identifier', the character length must be smaller than or equal to 36.";
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
     * Gets cfhpre_order
     *
     * @return mixed|null
     */
    public function getCfhpreOrder()
    {
        return $this->container['cfhpre_order'];
    }

    /**
     * Sets cfhpre_order
     *
     * @param mixed|null $cfhpre_order cfhpre_order
     *
     * @return self
     */
    public function setCfhpreOrder($cfhpre_order)
    {

        if (is_null($cfhpre_order)) {
            array_push($this->openAPINullablesSetToNull, 'cfhpre_order');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cfhpre_order', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['cfhpre_order'] = $cfhpre_order;

        return $this;
    }

    /**
     * Gets location
     *
     * @return \Vaioni\CityFibreAPI\Model\Location|null
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param \Vaioni\CityFibreAPI\Model\Location|null $location location
     *
     * @return self
     */
    public function setLocation($location)
    {

        if (is_null($location)) {
            throw new \InvalidArgumentException('non-nullable location cannot be null');
        }

        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets service_identifier
     *
     * @return mixed|null
     */
    public function getServiceIdentifier()
    {
        return $this->container['service_identifier'];
    }

    /**
     * Sets service_identifier
     *
     * @param mixed|null $service_identifier Unique Identifier for the service
     *
     * @return self
     */
    public function setServiceIdentifier($service_identifier)
    {
        if (!is_null($service_identifier) && (mb_strlen($service_identifier) > 36)) {
            throw new \InvalidArgumentException('invalid length for $service_identifier when calling AlaOrderInProgress., must be smaller than or equal to 36.');
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
     * Gets service_item
     *
     * @return \Vaioni\CityFibreAPI\Model\ServiceItem|null
     */
    public function getServiceItem()
    {
        return $this->container['service_item'];
    }

    /**
     * Sets service_item
     *
     * @param \Vaioni\CityFibreAPI\Model\ServiceItem|null $service_item service_item
     *
     * @return self
     */
    public function setServiceItem($service_item)
    {

        if (is_null($service_item)) {
            throw new \InvalidArgumentException('non-nullable service_item cannot be null');
        }

        $this->container['service_item'] = $service_item;

        return $this;
    }

    /**
     * Gets cfhlive_date
     *
     * @return mixed|null
     */
    public function getCfhliveDate()
    {
        return $this->container['cfhlive_date'];
    }

    /**
     * Sets cfhlive_date
     *
     * @param mixed|null $cfhlive_date Date and time when the working line take over service is live
     *
     * @return self
     */
    public function setCfhliveDate($cfhlive_date)
    {

        if (is_null($cfhlive_date)) {
            array_push($this->openAPINullablesSetToNull, 'cfhlive_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cfhlive_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['cfhlive_date'] = $cfhlive_date;

        return $this;
    }

    /**
     * Gets appointment
     *
     * @return \Vaioni\CityFibreAPI\Model\AppointmentWithFad|null
     */
    public function getAppointment()
    {
        return $this->container['appointment'];
    }

    /**
     * Sets appointment
     *
     * @param \Vaioni\CityFibreAPI\Model\AppointmentWithFad|null $appointment appointment
     *
     * @return self
     */
    public function setAppointment($appointment)
    {

        if (is_null($appointment)) {
            throw new \InvalidArgumentException('non-nullable appointment cannot be null');
        }

        $this->container['appointment'] = $appointment;

        return $this;
    }

    /**
     * Gets requested_date
     *
     * @return mixed|null
     */
    public function getRequestedDate()
    {
        return $this->container['requested_date'];
    }

    /**
     * Sets requested_date
     *
     * @param mixed|null $requested_date Point at which the change should be applied
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
     * Gets committed_date
     *
     * @return mixed|null
     */
    public function getCommittedDate()
    {
        return $this->container['committed_date'];
    }

    /**
     * Sets committed_date
     *
     * @param mixed|null $committed_date committed_date
     *
     * @return self
     */
    public function setCommittedDate($committed_date)
    {

        if (is_null($committed_date)) {
            array_push($this->openAPINullablesSetToNull, 'committed_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('committed_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['committed_date'] = $committed_date;

        return $this;
    }

    /**
     * Gets amendment_accepted
     *
     * @return \Vaioni\CityFibreAPI\Model\AmendmentAccepted|null
     */
    public function getAmendmentAccepted()
    {
        return $this->container['amendment_accepted'];
    }

    /**
     * Sets amendment_accepted
     *
     * @param \Vaioni\CityFibreAPI\Model\AmendmentAccepted|null $amendment_accepted amendment_accepted
     *
     * @return self
     */
    public function setAmendmentAccepted($amendment_accepted)
    {

        if (is_null($amendment_accepted)) {
            throw new \InvalidArgumentException('non-nullable amendment_accepted cannot be null');
        }

        $this->container['amendment_accepted'] = $amendment_accepted;

        return $this;
    }

    /**
     * Gets amendment_rejected
     *
     * @return mixed|null
     */
    public function getAmendmentRejected()
    {
        return $this->container['amendment_rejected'];
    }

    /**
     * Sets amendment_rejected
     *
     * @param mixed|null $amendment_rejected amendment_rejected
     *
     * @return self
     */
    public function setAmendmentRejected($amendment_rejected)
    {

        if (is_null($amendment_rejected)) {
            array_push($this->openAPINullablesSetToNull, 'amendment_rejected');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('amendment_rejected', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['amendment_rejected'] = $amendment_rejected;

        return $this;
    }

    /**
     * Gets warning
     *
     * @return \Vaioni\CityFibreAPI\Model\Warning|null
     */
    public function getWarning()
    {
        return $this->container['warning'];
    }

    /**
     * Sets warning
     *
     * @param \Vaioni\CityFibreAPI\Model\Warning|null $warning warning
     *
     * @return self
     */
    public function setWarning($warning)
    {

        if (is_null($warning)) {
            throw new \InvalidArgumentException('non-nullable warning cannot be null');
        }

        $this->container['warning'] = $warning;

        return $this;
    }

    /**
     * Gets delayed
     *
     * @return mixed|null
     */
    public function getDelayed()
    {
        return $this->container['delayed'];
    }

    /**
     * Sets delayed
     *
     * @param mixed|null $delayed delayed
     *
     * @return self
     */
    public function setDelayed($delayed)
    {

        if (is_null($delayed)) {
            array_push($this->openAPINullablesSetToNull, 'delayed');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('delayed', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['delayed'] = $delayed;

        return $this;
    }

    /**
     * Gets cfhnext_best_action
     *
     * @return mixed|null
     */
    public function getCfhnextBestAction()
    {
        return $this->container['cfhnext_best_action'];
    }

    /**
     * Sets cfhnext_best_action
     *
     * @param mixed|null $cfhnext_best_action The next best action to take when an order is delayed
     *
     * @return self
     */
    public function setCfhnextBestAction($cfhnext_best_action)
    {

        if (is_null($cfhnext_best_action)) {
            array_push($this->openAPINullablesSetToNull, 'cfhnext_best_action');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cfhnext_best_action', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['cfhnext_best_action'] = $cfhnext_best_action;

        return $this;
    }

    /**
     * Gets cancellation_rejected
     *
     * @return mixed|null
     */
    public function getCancellationRejected()
    {
        return $this->container['cancellation_rejected'];
    }

    /**
     * Sets cancellation_rejected
     *
     * @param mixed|null $cancellation_rejected cancellation_rejected
     *
     * @return self
     */
    public function setCancellationRejected($cancellation_rejected)
    {

        if (is_null($cancellation_rejected)) {
            array_push($this->openAPINullablesSetToNull, 'cancellation_rejected');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cancellation_rejected', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        $this->container['cancellation_rejected'] = $cancellation_rejected;

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


