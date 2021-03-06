<?php

/*
 * This file has been created by the developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusShippingExportPlugin\Entity;

use BitBag\SyliusShippingExportPlugin\Entity\ShippingExportInterface;
use BitBag\SyliusShippingExportPlugin\Entity\ShippingGateway;
use BitBag\SyliusShippingExportPlugin\Entity\ShippingGatewayInterface;
use Doctrine\Common\Collections\Collection;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\ShippingMethodInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

final class ShippingGatewaySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ShippingGateway::class);
    }

    function it_is_resource()
    {
        $this->shouldImplement(ResourceInterface::class);
    }

    function it_implements_shipping_gateway_interface()
    {
        $this->shouldImplement(ShippingGatewayInterface::class);
    }

    function it_returns_array_collection_when_initialized()
    {
        $this->getShippingMethods()->shouldHaveType(Collection::class);
    }

    function it_adds_shipping_method(ShippingMethodInterface $shippingMethod)
    {
        $this->addShippingMethod($shippingMethod);

        $this->getShippingMethods()->first()->shouldReturn($shippingMethod);
    }

    function it_initializes_a_shipping_export_collection_by_default()
    {
        $this->getShippingExports()->shouldHaveType(Collection::class);
    }

    function it_adds_a_shipping_export(ShippingExportInterface $shippingExport)
    {
        $this->addShippingExport($shippingExport);
        $this->hasShippingExport($shippingExport)->shouldReturn(true);
    }

    function it_removes_a_shipping_export(ShippingExportInterface $shippingExport)
    {
        $this->addShippingExport($shippingExport);
        $this->removeShippingExport($shippingExport);

        $this->hasShippingExport($shippingExport)->shouldReturn(false);
    }

    function it_returns_config_value()
    {
        $this->setConfig(['foo' => 'bar']);

        $this->getConfigValue('foo')->shouldReturn('bar');
    }

    function it_throws_error_while_trying_to_access_not_existing_config_value()
    {
        $this->setConfig(['foo' => 'bar']);

        $this->shouldThrow(\InvalidArgumentException::class)->during('getConfigValue', ['bar']);
    }
}
