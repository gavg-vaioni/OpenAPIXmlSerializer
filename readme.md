XmlSerializer
=============
Xml Serialization library for PHP >= 5.3. It allows to serialize object, arrays and scalars into xml, with only few LoC.

Author: Kacper "Vaioni" Donat, Some Rights Reserved.
License: [Creative Commons 4.0 BY-SA](http://creativecommons.org/licenses/by-sa/4.0/legalcode)

Features
--------

* Support for annotations, more in [wiki](https://github.com/vaioni1090/XmlSerializer/wiki/Annotations)
* Custom serialization and deserialization mechanisms by `XmlSerializable` interface, more in [wiki](https://github.com/vaioni1090/XmlSerializer/wiki/XmlSerializable).

Example
-------
```php
$serializer = new Vaioni\XmlSerializer\XmlSerializer();
echo $serializer->serialize((object)array(
    'foo'   => 'bar',
    'array' => array(1, 2, 3, 4, 'key' => 'value'),
    'obj'   => (object)array('bar' => 'foo')
), 'object');
```
Outputs:
```xml
<?xml version="1.0" encoding="utf-8"?>
<object xmlns:s="urn:vaioni:serializer">
  <foo>bar</foo>
  <array s:type="array">
    <element s:key="0">1</element>
    <element s:key="1">2</element>
    <element s:key="2">3</element>
    <element s:key="3">4</element>
    <element s:key="key">value</element>
  </array>
  <obj>
    <bar>foo</bar>
  </obj>
</object>
```