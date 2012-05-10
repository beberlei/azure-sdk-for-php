<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Services\ServiceManagement\Models;
use WindowsAzure\Services\ServiceManagement\Models\Service;
use WindowsAzure\Core\Serialization\XmlSerializer;
use WindowsAzure\Resources;


/**
 * Unit tests for class Service
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Services\ServiceManagement\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::setName
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::getName
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::__construct
     */
    public function testSetName()
    {
        // Setup
        $service = new Service();
        $expected = 'Name';
        
        // Test
        $service->setName($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getName());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::setLabel
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::getLabel
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::__construct
     */
    public function testSetLabel()
    {
        // Setup
        $service = new Service();
        $expected = 'Label';
        
        // Test
        $service->setLabel($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getLabel());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::setDescription
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::getDescription
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::__construct
     */
    public function testSetDescription()
    {
        // Setup
        $service = new Service();
        $expected = 'Description';
        
        // Test
        $service->setDescription($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getDescription());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::setLocation
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::getLocation
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::__construct
     */
    public function testSetLocation()
    {
        // Setup
        $service = new Service();
        $expected = 'Location';
        
        // Test
        $service->setLocation($expected);
        
        // Assert
        $this->assertEquals($expected, $service->getLocation());
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::addSerializationProperty
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::getSerializationPropertyValue
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::__construct
     */
    public function testAddSerializationProperty()
    {
        // Setup
        $service = new Service();
        $expectedKey = 'Key';
        $expectedValue = 'Value';
        
        // Test
        $service->addSerializationProperty($expectedKey, $expectedValue);
        
        // Assert
        $this->assertEquals($expectedValue, $service->getSerializationPropertyValue($expectedKey));
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::serialize
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::__construct
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::toArray
     */
    public function testSerialize()
    {
        // Setup
        $serializer = new XmlSerializer();
        $expected = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $expected .= '<CreateService xmlns="http://schemas.microsoft.com/windowsazure">' . "\n";
        $expected .= ' <Label>Label</Label>' . "\n";
        $expected .= ' <Description>Description</Description>' . "\n";
        $expected .= ' <Location>Location</Location>' . "\n";
        $expected .= '</CreateService>' . "\n";
        $service = new Service();
        $service->setName('Name');
        $service->setLabel('Label');
        $service->setLocation('Location');
        $service->setDescription('Description');
        $service->addSerializationProperty(
            XmlSerializer::ROOT_NAME,
            'CreateService'
        );
        
        // Test
        $actual = $service->serialize($serializer);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers WindowsAzure\Services\ServiceManagement\Models\Service::serialize
     */
    public function testSerializeWithInvalidSerializer()
    {
        // Setup
        $this->setExpectedException('\InvalidArgumentException', Resources::UNKNOWN_SRILZER_MSG);
        $service = new Service();
        
        // Test
        $service->serialize(new Service());        
    }
}

?>