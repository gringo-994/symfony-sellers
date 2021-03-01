<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Endpoint;

class EndpointSeller extends AbstractEndpoint
{
    /**
     * {@inheritDoc}
     */
    public function buildUri(): string
    {
        return '/sellers.json';
    }

    /**
     * {@inheritDoc}
     */
    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaders(): array
    {
        return ['Content-Type' => 'application/json'];
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): array
    {
        return ['allow_redirects' => true];
    }

    /**
     * {@inheritDoc}
     */
    public function getMock(): string
    {
        return <<<MOCK
{
 'contact_email': 'adops@advertisingsystem.com',
 'contact_address': 'Advertising System Inc., 101 Main Street, New York, NY 10101',
 'version': '1.0',
 'identifiers': [
 {
 'name': 'TAG-ID',
 'value': '28cb65e5bbc0bd5f'
 }
 ],
 'sellers': [
 {
 'seller_id': '1942009976',
 'name': 'Publisher1',
 'domain': 'publisher1.com',
 'seller_type': 'PUBLISHER”
 },
{
'seller_id': '1397382429',
'name': 'Exchange1',
'domain': 'exchange1.com',
'seller_type': 'INTERMEDIARY'
},
{
    'seller_id': '20000000',
 'name': 'Seller And Intermediary, Inc',
 'domain': 'sellerandintermediary.com',
 'seller_type': 'PUBLISHER',
 'comment': 'NorthAmerica O&O inventory'
 },
{
    'seller_id': '20000001',
 'name': 'Seller And Intermediary, Inc',
 'domain': 'sellerandintermediary.com',
 'seller_type': 'PUBLISHER',
 'comment': 'APAC O&O inventory'
 },
{
    'seller_id': '20000002',
 'name': 'Seller And Intermediary, Inc',
 'domain': 'sellerandintermediary.com',
 'seller_type': 'INTERMEDIARY',
 'comment': 'Non O&O inventory'
 },
{
    'seller_id': '101010101',
 'name': 'Hybrid Seller',
 'domain': 'hybridseller.com',
 'seller_type': 'BOTH',
 'comment': 'Sells both O&O and other sellers' inventory'
 },
{
    'seller_id': '00000001',
 'seller_type': 'INTERMEDIARY',
 'is_confidential': 1
 },
{
    'seller_id': 'EB_0001',
 'name': 'Passthrough Publisher',
 'domain': 'passthroughpublisher.com',
 'seller_type': 'PUBLISHER',
 'is_passthrough': 1,
 'comment': 'direct buyer/seller of this inventory must establish an account
relationship with Passthrough Publisher'
 }
]
}
MOCK;
    }
}
