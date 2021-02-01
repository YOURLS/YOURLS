# Changelog

All notable changes to `array-to-xml` will be documented in this file

## 2.15.0 - 2020-10-29

- add $xmlStandalone as a new parameter (#148)

## 2.14.0 - 2020-09-14

- add support for dropping XML declaration (#145)

## 2.13.0 - 2020-08-24

- add support for custom keys (#140)

## 2.12.1 - 2020-06-17

- add XML prettification (#136)

## 2.11.2 - 2019-08-21

- fix XML structure when using numeric keys

## 2.11.1 - 2019-07-25

- do not interpret "0" as a non-empty value

## 2.11.0 - 2019-09-26

- drop support for PHP 7.1

## 2.10.0 - 2019-09-26

- add `setDomProperties`

## 2.9.0 - 2019-05-06

- add support for numeric keys

## 2.8.1 - 2019-03-15

- fix tests
- drop support for PHP 7.0

## 2.8.0 - 2018-11-29

- added support for mixed content 

## 2.7.3 - 2018-10-30
- fix for `DomExeception`s being thrown

## 2.7.2 - 2018-09-17
- remove control characters

## 2.7.1 - 2018-02-02
- fix setting attributes

## 2.7.0 - 2017-09-07
- allow wrapping data in a CDATA section

## 2.6.1- 2017-08-29
- add fix for multiple empty/self-closing child elements

## 2.6.0 - 2017-08-25
- add support for naming a root element and adding properties to it

## 2.5.2 - 2017-08-03
- avoid pulling in the snapshot package on install

## 2.5.1 - 2017-05-30
- PHP 7 is now required

## 2.5.0 - 2017-05-22
- allow encoding and version to be set

## 2.4.0 - 2017-02-18
- attributes and value can be set in SimpleXMLElement style

## 2.3.0 - 2017-02-18
- attributes and value can be set in SimpleXMLElement style

## 2.2.1 - 2016-12-08
- fixed an error when there is a special character to the value set in _value

## 2.2.0 - 2016-06-04
- added `toDom` method

## 2.1.1 - 2016-02-23
- Fixed typo in the name of the `addSequentialNode`-function

## 2.1.0 - 2015-10-08
- Add ability to use attributes

## 2.0.0 - 2015-10-08
- Add support to collection arrays and dynamically XML convertion when keys are numeric

## 1.0.3 - 2015-10-03
- handle values with special characters

## 1.0.1 - 2015-03-18
- use DOMDocument for better validation
- added an option to opt out of the automatic space replacement

## 1.0.0 - 2015-03-17
- initial release
