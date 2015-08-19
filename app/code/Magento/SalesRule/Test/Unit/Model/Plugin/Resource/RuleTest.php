<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\SalesRule\Test\Unit\Model\Plugin\Resource;

class RuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\SalesRule\Model\Plugin\Resource\Rule
     */
    protected $plugin;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $ruleResource;

    /**
     * @var \Closure
     */
    protected $genericClosure;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $abstractModel;

    public function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->ruleResource = $this->getMockBuilder('Magento\SalesRule\Model\Resource\Rule')
            ->disableOriginalConstructor()
            ->getMock();
        $this->genericClosure = function () {
            return;
        };
        $this->abstractModel = $this->getMockBuilder('Magento\Framework\Model\AbstractModel')
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->plugin = $objectManager->getObject('Magento\SalesRule\Model\Plugin\Resource\Rule');
    }

    public function testAroundLoadCustomerGroupIds()
    {
        $this->assertEquals(
            $this->ruleResource,
            $this->plugin->aroundLoadCustomerGroupIds($this->ruleResource, $this->genericClosure, $this->abstractModel)
        );
    }

    public function testAroundLoadWebsiteIds()
    {
        $this->assertEquals(
            $this->ruleResource,
            $this->plugin->aroundLoadWebsiteIds($this->ruleResource, $this->genericClosure, $this->abstractModel)
        );
    }
}
