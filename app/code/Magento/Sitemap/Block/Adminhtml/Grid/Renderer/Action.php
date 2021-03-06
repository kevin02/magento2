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
 * @category    Magento
 * @package     Magento_Adminhtml
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Sitemap\Block\Adminhtml\Grid\Renderer;

/**
 * Sitemap grid action column renderer
 */
class Action extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\Action
{
    /**
     * @param \Magento\Object $row
     * @return string
     */
    public function render(\Magento\Object $row)
    {
        $this->getColumn()->setActions(
            array(
                array(
                    'url' => $this->getUrl('adminhtml/sitemap/generate', array('sitemap_id' => $row->getSitemapId())),
                    'caption' => __('Generate')
                )
            )
        );
        return parent::render($row);
    }
}
