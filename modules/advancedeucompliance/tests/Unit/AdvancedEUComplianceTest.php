<?php
/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

namespace PrestaShop\PrestaShop\Tests\Unit;

use Advancedeucompliance;
use Hook;
use PHPUnit_Framework_TestCase;
use PrestaShop\PrestaShop\Tests\Helper\Module;
use PrestaShop\PrestaShop\Tests\TestCase\UnitTestCase;
use RepositoryManager;

require_once(_PS_MODULE_DIR_.'advancedeucompliance/advancedeucompliance.php');
require_once(_PS_ROOT_DIR_.'/tests/TestCase/UnitTestCase.php');

class AdvancedEUComplianceTest extends UnitTestCase
{
	public function setup()
	{

		parent::setUpCommonStaticMocks();
	}

	public function teardown()
	{
		parent::tearDownCommonStaticMocks();
	}
}