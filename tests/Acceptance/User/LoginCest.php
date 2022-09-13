<?php
namespace App\Tests\Acceptance\User;

use App\Tests\AcceptanceTester;
use Codeception\Util\HttpCode;


final class LoginCest
{

    /**
     * @var string
     */
    private const _ADMIN_LOGIN = '/admin/login';

    /**
     * @var string
     */
    private const FOO = 'foo';

    public function testLoginIsDeniedWithWrongCredentials(AcceptanceTester $acceptanceTester,): void
    {
        $acceptanceTester->amOnPage(self::_ADMIN_LOGIN);
        $acceptanceTester->fillField('_username', self::FOO);
        $acceptanceTester->fillField('_password', 'bar');
        $acceptanceTester->click('submit');
        $acceptanceTester->seeCurrentURLEquals(self::_ADMIN_LOGIN);
        $acceptanceTester->see('Invalid credentials.');
    }

    public function testIfIGetRederectetToLogin(AcceptanceTester $acceptanceTester,): void
    {
        $acceptanceTester->amOnPage('/admin/app/vehicle/list');
        $acceptanceTester->seeCurrentURLEquals(self::_ADMIN_LOGIN);
    }

    // tests
    public function testLoginWithValidUser(AcceptanceTester $acceptanceTester): void
    {
        $acceptanceTester->amOnPage(self::_ADMIN_LOGIN);
        $acceptanceTester->fillField('_username', self::FOO);
        $acceptanceTester->fillField('_password', self::FOO);
        $acceptanceTester->click('submit');
        $acceptanceTester->seeCurrentURLEquals('/admin/dashboard');
    }




}
