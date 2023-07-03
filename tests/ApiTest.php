<?php

use Iim\td3\Api;
use Iim\td3\Product;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testProductInstant()
    {
        $api = new Api();
        $products = $api->formatProduct('<li class="ListItem-sc-0-2 lfqzQA ProductCard-sc-0-1 jGSLqf" data-test="ProductCompactListCard"><a class="InternalLink-sc-0-1 jbCOgj ProductLink-sc-0-0 iFCKlM" data-test="InternalLink" href="/product.php?p=5683804"><div class="Media-sc-0-0 ixcXrb"><div class="ImageContainer-sc-0-2 ejUyID"><img src="https://pricespy-75b8.kxcdn.com/product/standard/140/5683804.jpg" alt="Apple iPhone 13 5G 4Go RAM 128Go" class="Image-sc-0-0 hcJnpW ListImage-sc-0-3 kKINnS"></div></div><div><span class="Text--12qn20f cEAvG titlesmalltext" title="Apple iPhone 13 5G 4Go RAM 128Go" data-test="ProductName">Apple iPhone 13 5G 4Go RAM 128Go</span><div class="Rating-sc-0-2 fFXpMv" aria-label="4 sur 5 étoiles" data-test="Rating"><div class="StarsWrapper-sc-0-3 dsHALE"><div class="StarIcons-sc-0-4 dPRTPl" style="width: 13px; line-height: 0;"><img src="https://pricespy-75b8.kxcdn.com/g/rfe/icons/stars/primary-full-new.svg" alt="Full Star 1" style="width: 12px; height: 12px; margin-right: 1px;"></div><span class="RateNumber-sc-0-6 brKLzW">4</span></div><div class="CounterWrapper-sc-0-0 IKORT">(<span class="Counter-sc-0-1 fWTJWU">17</span>)</div></div></div><div class="PriceContainer-sc-0-0 gCeCCh"><div class="StyledList--1047oxz cCaHUC"><div class="PriceTextWrapper-sc-0-1 jhvcNt"><div class="PriceText-sc-0-2 cRmrS"><div><span class="Text--12qn20f dgFgqt bodysmalltext" title="">à partir de</span> <span class="Text--12qn20f hVLKXu" title="">654,00&nbsp;€</span></div></div></div></div></div></a></li>');
        // products is an array of Product
        $this->assertIsArray($products);
        foreach ($products as $product) {
            $this->assertInstanceOf(Product::class, $product);
        }
    }
}
