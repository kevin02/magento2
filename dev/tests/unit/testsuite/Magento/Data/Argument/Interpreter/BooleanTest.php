<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Data\Argument\Interpreter;

class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Boolean
     */
    protected $_model;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_booleanUtils;

    protected function setUp()
    {
        $this->_booleanUtils = $this->getMock('\Magento\Stdlib\BooleanUtils');
        $this->_model = new Boolean($this->_booleanUtils);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Boolean value is missing
     */
    public function testEvaluateException()
    {
        $this->_model->evaluate(array());
    }

    public function testEvaluate()
    {
        $input = new \stdClass();
        $expected = new \stdClass();
        $this->_booleanUtils->expects(
            $this->once()
        )->method(
            'toBoolean'
        )->with(
            $this->identicalTo($input)
        )->will(
            $this->returnValue($expected)
        );
        $actual = $this->_model->evaluate(array('value' => $input));
        $this->assertSame($expected, $actual);
    }
}
