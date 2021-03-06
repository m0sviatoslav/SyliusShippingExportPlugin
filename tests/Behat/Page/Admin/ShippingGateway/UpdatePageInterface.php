<?php

/*
 * This file has been created by the developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusShippingExportPlugin\Behat\Page\Admin\ShippingGateway;

use Sylius\Behat\Page\Admin\Crud\UpdatePageInterface as BaseUpdatePage;

interface UpdatePageInterface extends BaseUpdatePage
{
    /**
     * @param string $name
     */
    public function selectShippingMethod($name);

    /**
     * @param string $field
     * @param string $value
     */
    public function fillField($field, $value);

    public function submit();
}
